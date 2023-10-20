@extends('admin.layouts.template')
@section('title')
    S.T.I.T film Management
@endsection
@section('content')

<div style="padding: 10px 150px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All films</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-primary">
                    <a href="{{route('addfilm')}}" style="text-decoration: none;color: white;">Add film</a>
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
        <h3 class="card-title text-center p-2">films Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="film" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Usine</th>
          <th>Nom</th>
          <th>Quantité Disponible</th>
          <th>Quantité Consommée</th>
          <th>Status</th>
          <th class="text-center">Date</th>
          <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
        <tr>
          <td>{{$film->id}}</td>
          <td>{{$film->usine}}</td>
          <td>{{$film->nom}}</td>
          <td class="text-center">{{$film->inQty}}</td>
          <td class="text-center">{{$film->outQty}}</td>
          <td style="color: {{ $film->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{ $film->status }}</td>
          <td class="text-center">{{{$film->date}}}</td>
          <td class="text-center">
            <span class="dtr-data">
              <a class="mr-1" href="{{route('showfilm',$film->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
              <a class="mr-1" href="{{route('editfilm',$film->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
              <a href="{{route('deletefilm',$film->id)}}"
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