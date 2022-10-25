<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;


class DashboardController extends Controller
{

    public function index()
    {
            return view('dashboard');

    }

    public function dashboard()
    {
       $staff = Staff::where("status",1)->count();
        $user = User::count();

        return view('dashboard',['staff'=>$staff,'user'=>$user]);
    }
}
