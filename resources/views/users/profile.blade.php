@extends('layouts.app')

@section('content')

@php
$genders=['male','female'];


@endphp
<div class="container  mt-5">
<form method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('PUT')
    <div class="form-group">

        @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
        {{$error}}
        </div>

        @endforeach
        @endif
    </div>
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" class="form-control"  name="name" value="{{$user->name}}">
        <label for="exampleFormControlInput1">Country</label>
        <input type="text" class="form-control"  name="country" value="{{$user->profil->Country}}">

    <div class="form-group">
      <label for="exampleFormControlSelect1">Gender </label>
      <select class="form-control" name="gender" >


        @foreach ($genders as $gender)
        <option value="{{$gender}}"   {{$user->profil->gender == $gender ? 'selected' : ''}}   >{{$gender}}</option>

        @endforeach

      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Job</label>
      <textarea class="form-control" name="job" rows="3" >{{$user->profil->job}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
