<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Userpermission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function index()
    {

            $users = User::with('role','staff')->get();
            $userpermissions = Userpermission::all();
            return view('users.index')->with(['users'=>$users,'userpermissions'=>$userpermissions]);




    }
}
