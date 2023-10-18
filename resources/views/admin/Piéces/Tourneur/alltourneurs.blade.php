@extends('admin.layouts.template')
@section('title')
All Turner -STIT Management
@endsection
@section('content')

<div style="padding:10px 150px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Turner </h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-success">
                    <a href="{{route('addtourneur')}}" style="text-decoration: none;color: white;">Add Turner</a>
                </button>
            </ol>
          </div>
        </div>
      </div>
    </section>

    @if(session()->has('message'))
    <div class="alert alert-success" role="alert" id="success-alert">
      {{ session()->get('message') }}
    </div>
    @endif
  
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title text-center p-2">Turner Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="tourneur" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nom Tourneur</th>
          <th>Telephone</th>
          <th>Nom piéce</th>
          <th>machine</th>
          <th class="text-center">Date</th>
          <th  class="text-center">status</th>
          <th class="text-center">Prix Facture</th>
          <th class="text-center" >Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($tourneurs as $tourneur)
        <tr>
          <td>{{$tourneur->id}}</td>
          <td>{{$tourneur->nom}}</td>
          <td>{{$tourneur->phone_number}}</td>
          <td>{{$tourneur->nom_piece}}</td>
          
          <td class="text-center">{{$tourneur->machine}}</td>
          
          <td class="text-center">{{$tourneur->date}}</td>
          <td style="color: {{ $tourneur->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold text-center ">{{ $tourneur->status }}</td>
          <td class="text-center">{{{$tourneur->prix}}}</td>
          <td class="text-center">
            <span class="dtr-data">
              <a class="mr-1" href="{{route('showtourneur',$tourneur->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
              <a class="mr-1" href="{{route('edittourneur',$tourneur->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
              <a href="{{route('deletetourneur',$tourneur->id)}}"
                onclick="return confirm('Are you sure you want to delete this item?');">
                <i class="far fa-trash-alt fa-lg text-red"></i>
              </a>
            </span>
          </td>    
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>
  @endsection