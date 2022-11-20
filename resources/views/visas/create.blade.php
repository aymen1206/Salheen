@extends('layouts.app')

@section('content')

<div class="container " style="background-color: rgb(8, 158, 83)">


    <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Issue New Visas </h1>
              <a class="btn btn-primary btn-lg" href="{{route('visas')}}" role="button"> Visas List</a>

          </div>
      </div>




  <div class="row">
    <div class="col">

        <form class="mt-5" method="POST" action="{{route('visa.store')}}" enctype="multipart/form-data">
            @csrf


            <div class="form-group" >

                @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                {{$error}}
                </div>

                @endforeach
                @endif
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Customer Name</label>
              <input type="text" class="form-control" name=" Cutomer_name"  >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Country TO</label>
                <input type="text" class="form-control" name="Country_TO"  >
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Visa type</label>
                <input type="text" class="form-control" name="Visa_type"  >
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Issue_Date</label>
                <input type="text" class="form-control" name="Issue_Date"  value="<?php echo date('d/m/y'); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Departure Time</label>
                <input type="date" class="form-control" name="Departure_at"  >
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Visa Photo Copy</label>
                <input type="file" class="form-control" name="photo"  >
              </div>
              <button type="submit" class="btn btn-primary mt-5">Issues Vissa</button>
          </form>


    </div>
  </div>
</div>
@endsection
