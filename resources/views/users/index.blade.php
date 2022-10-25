
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
     <h5>Users</h5>
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

                {{-- <a href="{{ route('exportstaff')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a> --}}

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Avatar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ Illuminate\Support\Str::of($user->name)->words(6)}}</td>
                                <td>{{ Illuminate\Support\Str::of($user->email)->words(6)}}</td>
                                <td>{{ Illuminate\Support\Str::of($user->role?$user->role->role_name:'')->words(6)}}</td>
                                <td>{{ Illuminate\Support\Str::of($user->phone)->words(6)}}</td>

                                <td>

                                    @if($user->staff->staff_avatar)
                                    <img width="60" height="60" src="{{ asset('uploads/'.$user->staff->staff_avatar)}}" alt="" class="rounded-circle" alt="#">
                                    @else
                                    <img width="60" height="60" src="{{ asset('uploads/mn.png')}}" alt="" class="rounded-circle" alt="#">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('users/'.$user->id )}}"> <button class="btn btn-success" style="margin-right: 0px;"><i class="fa fa-eye"></i></button></a>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{ $user->id }}"
                                        class="mt-3"
                                     style="float: right;margin-right:0px;"><i class='fas fa-eye'>
                                    </i>
                                    </button>


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
