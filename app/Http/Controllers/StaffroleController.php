<?php

namespace App\Http\Controllers;

use App\Models\Staffrole;
use Illuminate\Http\Request;
use App\Exports\StaffrolesExport;
use Maatwebsite\Excel\Facades\Excel;


class StaffroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffroles = Staffrole::where('status',1)->get();
        return view('staffroles.index')->with('staffroles',$staffroles);
    }

    public function export()
    {
        return Excel::download(new StaffrolesExport, 'staffrole.xlsx');
    }


    public function validatestaff(Request $request){
        $Staff = Staffrole::where('staff_role','=',$request->name)->where('status',1)->first();
     if($Staff){
       return 'exists';
        }else{
         return 'doesnot';
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_position = Staffrole::create([
            'role_id' => ucfirst(strtolower($request->role_id)),

          ]);
          return redirect('/staffrole')->with('message', "$post_position->role_id saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staffrole  $staffrole
     * @return \Illuminate\Http\Response
     */
    public function show(Staffrole $staffrole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staffrole  $staffrole
     * @return \Illuminate\Http\Response
     */
    public function edit(Staffrole $staffrole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staffrole  $staffrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staffrole $staffrole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staffrole  $staffrole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staffrole $staffrole)
    {
        //
    }
}
