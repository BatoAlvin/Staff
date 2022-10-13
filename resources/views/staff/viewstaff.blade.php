
@extends('layouts.navigation')

@section('content')
<div class="row">
    @foreach($staffs as $staff)

<div class="card p-3" style="width: 18rem;">
    {{-- <img width="60" height="60" src="" class="rounded-circle" alt="#"> --}}
    <img class="card-img-top" src="{{ asset('uploads/'.$staff->staff_avatar)}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$staff->staff_name}}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

@endforeach
</div>
 @endsection
