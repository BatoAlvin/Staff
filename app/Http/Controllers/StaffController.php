<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.viewstaff')->with('staffs',$staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data= new Postimage();

        // if($request->file('staff_avatar')){
        //     $file= $request->file('staff_avatar');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file-> move(public_path('public/Image'), $filename);
        //     $data['staff_avatar']= $filename;
        // }
        // $data->save();
        // return redirect()->route('images.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $requestData = $request->all();
        // $fileName = time().$request->file('staff_avatar')->getClientOriginalExtension();
        // $path = $request->file('staff_avatar')->storeAs('images',$fileName,'public');
        // $requestData['staff_avatar'] = '/storage/'.$path;

       if($request->hasfile('staff_avatar')){
            $file = $request->file('staff_avatar');
            $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
            $post = Staff::create([
                'staff_name' => $request->staff_name,
                'staff_contact' => $request->staff_contact,
                'staff_email' => $request->staff_email,
                'staff_dob' => $request->staff_dob,
                'gender' => $request->gender,
                'staff_address' => $request->staff_address,
                'staff_avatar'=>$filename,
              ]);
        }


          return redirect('/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
