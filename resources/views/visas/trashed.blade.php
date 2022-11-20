@extends('layouts.app')

@section('content')
<div class="container" style="background-color: rgb(187, 47, 47)">


    <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Trashed Visas </h1>
            <a class="btn btn-primary btn-lg" href="{{route('visa.issue')}}" role="button">issue Visas</a>

          </div>
      </div>




  <div class="row">
    @if($visas->count()>0)

    <div class="col">

        <table class="table">



            <thead class="thead-dark">


              <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Country TO</th>
                <th scope="col">Visa type</th>
                <th scope="col">Issue_Date</th>
                <th scope="col">Departure Time</th>
                <th scope="col">Account Manager</th>
                <th scope="col">Visa Photo Copy</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @php
                    $i=1;
                @endphp


@foreach($visas as $visa)


<tr>
    <th scope="row">{{$i++}}</th>
    <td>{{$visa->Cutomer_name}}</td>
    <td>{{$visa->Country_TO}}</td>
    <td>{{$visa->Visa_type}}</td>
    <td>{{$visa->Issue_Date}}</td>
    <td>{{$visa->Departure_at}}</td>
    <td>{{$visa->user->name}}</td>

    <td>

    <img src="{{$visa->photo}}" alt="{{$visa->photo}}"  class="img-tumbnall" width="100" height="100">
</td>
<td>
    <a class="btn btn-success btn-lg" href="{{route('visa.restore',['id'=> $visa->id])}}">Restore</a>
    <a class="btn btn-danger btn-lg mt-2" href="{{route('visa.hdelete',['id'=> $visa->id])}}">Hared Delete</a>

    </td>


  </tr>

@endforeach


            </tbody>
          </table>



    </div>



    @else
    <div  class="col">

        <div class="alert alert-danger" role="alert">
            No Visa Issued yet
          </div>
    </div>

    @endif

  </div>
</div>
@endsection
