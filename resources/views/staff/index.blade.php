
@extends('layouts.navigation')

@section('content')

<style>
    .txtlabel{
color:#000;
    }

    .error{
    color:red;
    font-style:italic;
}
</style>
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
     <h5>Staff members</h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Staff</i></button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Staff</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body" style="background: #9f9fa2;">

                  <form action="{{ route('staff.store')}}" method='post' id="registration" enctype='multipart/form-data'>
                    <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group">
                        <label class="txtlabel">Staff Name</label>
                        <span class="text-danger">*</span>
                        <div>
                            <input type="text" class="form-control" name="staff_name">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="txtlabel">Contact</label>
                        <span class="text-danger">*</span>
                        <div>
                            <input type="text" class="form-control" id="val-digits" name="staff_contact">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="txtlabel">Email</label>
                        <span class="text-danger">*</span>
                        <div>
                            <input type="email" class="form-control"  name="staff_email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="txtlabel" for="val-date">Date</label>
                        <span class="text-danger">*</span>
                        <div>
                            <input type="date" class="form-control" name="staff_dob">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="txtlabel">Gender</label>
                        <span class="text-danger">*</span>
                        <select class="form-control" name="gender">
                            <option selected disabled value=''>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="prefer not to say">Prefer not to say</option>
                            </select>
                    </div>


            <div class="form-group">
                <label class="txtlabel">Home Address</label>
                <span class="text-danger">*</span>
                <div>
                    <input type="text" class="form-control"  name="staff_address">
                </div>
            </div>

            <div class="form-group">
                <label class="txtlabel">Avatar</label>
                <span class="text-danger">*</span>
                <div>
                    <input type="file" class="form-control" name="staff_avatar">
                </div>
            </div>

                    <div class="modal-footer">
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                  <button type="submit" class="btn btn-primary" id="btn">Add Staff</button>
                </div>
                  </form>
                </div>

              </div>
            </div>
          </div>


    </div>

</div>
<!-- row -->


<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="{{route('search')}}" method="post">
                    @csrf
                <div class="row">
                    <label>From</label>
                <div class='col-md-4'>

                   <div class="form-group">

                         <input type='date' class="form-control" name="fromDate" required />

                         {{-- <span class="glyphicon glyphicon-calendar"></span> --}}


                   </div>
                </div>
                <div class='col-md-4'>
                   <div class="form-group">
                      <div class='input-group date'>
                         <input type='date' class="form-control" name="toDate" required />To
                         <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                      </div>
                   </div>
                </div>


                <div class='col-md-4'>
                    <div class="form-group">
                       <div class='input-group date' >

                          <button type="submit" class="btn btn-primary" name="search" title="search"><i class="fa fa-filter" aria-hidden="true">Filter</i></button>

                       </div>
                    </div>
                 </div>
            </div>

        </form>

                <a href="{{ route('exportstaff')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Staff Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Avatar</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                            <tr>
                                <td>{{$staff->staff_name}}</td>
                                <td>{{$staff->staff_contact}}</td>
                                <td>{{$staff->staff_email}}</td>
                                <td>{{$staff->staff_dob}}</td>
                                <td>{{$staff->gender}}</td>
                                <td>{{$staff->staff_address}}</td>

                                <td>

                                    @if($staff->staff_avatar)
                                    <img width="60" height="60" src="{{ asset('uploads/'.$staff->staff_avatar)}}" alt="" class="rounded-circle" alt="#">
                                    @else
                                    <img width="60" height="60" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('staff/'.$staff->id )}}"> <button class="btn btn-success" style="margin-right: 0px;"><i class="fa fa-eye"></i></button></a>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{ $staff->id }}"
                                        class="mt-3"
                                     style="float: right;margin-right:0px;"><i class='fas fa-eye'>
                                    </i>
                                    </button>

                                    <div class="modal fade" id="exampleModal{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit {{ $staff->staff_name }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('staff.update', [$staff->id])}}" method='post' enctype='multipart/form-data'>

                                                @method('PUT')
                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Staff Name</label>
                                                  <input type="text" class="form-control" id="service" name="staff_name" required value="{{$staff->staff_name}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Contact</label>
                                                    <input type="text" class="form-control" id="service" name="staff_contact" required value="{{$staff->staff_contact}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Email</label>
                                                    <input type="email" class="form-control" id="service" name="staff_email" required value="{{$staff->staff_email}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" id="service" name="staff_dob" required value="{{$staff->staff_dob}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="txtlabel">Gender</label>

                                                    <select class="form-control" name="gender" required>
                                                        <option selected disabled value='' >Select...</option>
                                                        <option value="male" @if ($staff->gender == "male")
                                                            selected
                                                            @endif>Male</option>
                                                        <option @if ($staff->gender == "female")
                                                            selected
                                                            @endif value="female">Female</option>
                                                            <option @if ($staff->gender == "prefer_not_to_say")
                                                                selected
                                                                @endif value="prefer_not_to_say">Prefer not to say</option>
                                                        <div id="editor-container" class="mb-1"></div>

                                                        </select>
                                                </div>


                                                  <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Address</label>
                                                    <input type="text" class="form-control" id="service" name="staff_address" required value="{{$staff->staff_address}}">
                                                  </div>

                                                  <div class="form-group">
                                                    <label class="txtlabel">Avatar</label>

                                                    <div>
                                                        @if($staff->staff_avatar)
                                                        <img width="60" height="60" src="{{ asset('uploads/'.$staff->staff_avatar)}}" alt="" class="rounded-circle" alt="#">
                                                        @else
                                                        <img width="60" height="60" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">
                                                        @endif
                                                        <input type="file" class="form-control" name="staff_avatar" value="{{$staff->staff_avatar}}">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Update Staff</button>
                                            </div>
                                              </form>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection
