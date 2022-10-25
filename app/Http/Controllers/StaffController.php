<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Staffrole;
use App\Exports\StaffsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



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
        return view('staff.index')->with('staffs',$staffs);
    }

    public function search(Request $request){
        // $honorable = Honorable::where('status',1)->get();
     $staffs = Staff::where('status',1)->whereBetween('created_at', [$request->fromDate,$request->toDate])->get();
     return view('staff.index',['staffs'=>$staffs]);
    }

    public function export()
    {
        return Excel::download(new StaffsExport, 'staff.xlsx');
    }


    public function enroll(Request $request, $id)
    {

     $staff = Staff::find($id);
    $user = User::create([
        'name' => $staff->staff_name,
        'email' => $staff->staff_email,
        'phone' => $staff->staff_contact,
        'role_id' => $request->role,
        'staff_id' => $staff->id,
        'password' => bcrypt($request->password),
    ]);

    $staff->enroll=1;
    $staff->save();

          return redirect('/staff')->with('message', "Staff $user->name enrolled successfully");
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       if($request->hasfile('staff_avatar')){
            $file = $request->file('staff_avatar');
            $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
        }

        $post = Staff::create([
            'staff_name' => $request->staff_name,
            'staff_contact' => $request->staff_contact,
            'staff_email' => $request->staff_email,
            'staff_dob' => $request->staff_dob,
            'gender' => $request->gender,
            'staff_address' => $request->staff_address,
            'staff_avatar'=>$filename??'',
          ]);

          return redirect('/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::with('staffrole')->find($id);
        $position = Staffrole::all();

        // $positions = Staffrole::with('staffrole')->find($id);
        return view('staff.staff')->with(['staffs'=>$staff,'position'=>$position]);

        // return view('staff.staff')->with('staffs', $staff);
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
    public function update(Request $request, $id)
    {
        if($request->hasfile('staff_avatar')){
            $file = $request->file('staff_avatar');
            $extension = $file->getClientOriginalExtension();
             $filename = time().'.'.$extension;
            $file->move('uploads/',$filename);
        }


        $check = Staff::where('id',$id)->first();
        if ($check) {
            $staff = Staff::where('id',$id)->update([
                'staff_name' => $request->staff_name,
                'staff_contact' => $request->staff_contact,
                'staff_email' => $request->staff_email,
                'staff_dob' => $request->staff_dob,
                'gender' => $request->gender,
                'staff_address' => $request->staff_address,
                'staff_avatar'=>$filename??'',

            ]);

        return redirect('/staff')->with('message', "Staff updated successfully");
        }
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
