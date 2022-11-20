@extends('layouts.app')

@section('content')
<div class="container">


    <div class="col">
        <div class="jumbotron">
            <h1 class="display-4"> Visas List</h1>
              <a class="btn btn-primary btn-lg" href="{{route('visas')}}" role="button">issue Visas</a>

          </div>
      </div>




      <div class="row">
        <div class="col">

            <form class="mt-5" method="POST" action="{{route('visa.update',['id'=>$visa ->id] )}} " enctype="multipart/form-data">
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
                  <input type="text" class="form-control" name=" Cutomer_name"  value="{{$visa->Cutomer_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Country TO</label>
                    <input type="text" class="form-control" name="Country_TO"  value="{{$visa->Country_TO}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Visa type</label>
                    <input type="text" class="form-control" name="Visa_type"  value="{{$visa->Visa_type}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Issue Date</label>
                    <input type="text" class="form-control" name="Issue_Date"  value="{{$visa->Issue_Date}}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Departure Time</label>
                    <input type="date" class="form-control" name="Departure_at"  value="{{$visa->Departure_at}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Visa Photo Copy</label>
                    <input type="file" class="form-control" name="photo"   >
                  </div>
                  <button type="submit" class="btn btn-primary mt-5">Edite Vissa Details</button>
              </form>


        </div>
      </div>
    </div>
    @endsection
