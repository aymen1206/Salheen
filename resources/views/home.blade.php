@extends('layouts.app')

@section('content')

<div class="container " style="background-color: rgb(8, 158, 83)">


    <div class="col">
        <div class="jumbotron">


            <a class="btn btn-primary btn-lg" href="{{route('visa.issue')}}" role="button">issue Visas</a>
            <a class="btn btn-danger btn-lg" href="{{route('visas.trashed')}}" role="button">Trashed Visas</a>
              <a class="btn btn-primary btn-lg" href="{{route('visas')}}" role="button"> Visas List</a>

          </div>
      </div>


      @endsection
