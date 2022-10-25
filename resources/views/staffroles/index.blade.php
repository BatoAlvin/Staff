
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



<script>

    function clearText()
    {
        document.getElementById('staffrole').value = "";


    }


    $(document).ready(function() {
   const staffValidation = document.querySelector('#staffrole');
   staffValidation.addEventListener('keyup', e => {
    var token = document.getElementById('token').value

    // Let the backend do all the validation magic on blur
    $.ajax({
      type: 'post',
      url: '/validatestaffrole',
      _token: token,
      data: {
        "_token": "{{ csrf_token() }}",
        'name': staffValidation.value,
      },
      success: function(data) {
        console.log(data);
      if(data == 'exists'){

      document.getElementById('staff_res_message').style.display = 'block'
      document.getElementById('btn').disabled = true
      }else{
        document.getElementById('staff_res_message').style.display = 'none'
        document.getElementById('btn').disabled = false
      }
      },
      error: function(error) {
        console.log(error);
      }
      });
      }
      );
      }

          );


    </script>


<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
     <h5>Staff Roles</h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Staff Role</i></button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Staff Role</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body" style="background: #9f9fa2;">

                  <form action="{{ route('staffrole.store')}}" method='post'>
                    <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group">
                        <label class="txtlabel">Staff Role</label>
                        <span class="text-danger">*</span>
                        <div>
                            <input type="text" class="form-control" id="staffrole" name="role_name" required>
                            <div id='staff_res_message' class="text-danger" style="display: none;">This staff role already exists</div>

                        </div>
                    </div>






                    <div class="modal-footer">
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal"  value="Reset" onclick="clearText()">Close</button>
                  <button type="submit" class="btn btn-primary" id="btn">Add Staff Role</button>
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

                <a href="{{ route('exportstaffrole')}}" class="btn btn-success" style="float: right;margin-right:10px;"><i class="fa fa-download">Excel</i></a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Staff Roles</th>

                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffroles as $staffrole)
                            <tr>
                                <td>{{$staffrole->staff_role}}</td>



                                <td>
                                    <a href="{{url('staff/'.$staffrole->id )}}"> <button class="btn btn-success" style="margin-right: 5px;"><i class="fa fa-eye"></i></button></a>

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
