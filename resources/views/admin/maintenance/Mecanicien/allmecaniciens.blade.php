@extends('admin.layouts.template')
@section('title')
    All Mecaniciens -STIT Management
@endsection
@section('content')

<div style="padding:10px 150px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Mecaniciens</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-success">
                    <a href="{{route('addmecanicien')}}" style="text-decoration: none;color: white;">Add Mecanicien</a>
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
        <h3 class="card-title text-center p-2">Mecaniciens Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="mecanicien" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom Mecanicien</th>
            <th>N° Telephone</th>
            <th>Piéces de rechange</th>
            <th class="text-center">Voiture</th>
            <th class="text-center">Date</th>
            <th class="text-center">Prix Facture</th>
            <th class="text-center" >Action</th>
          </tr>
          </thead>
          <tbody>
              @foreach($mecaniciens as $mecanicien)
          <tr>
            <td>{{$mecanicien->id}}</td>
            <td>{{$mecanicien->nom}}</td>
            <td>{{$mecanicien->phone_number}}</td>
            <td>{{$mecanicien->nom_piece}}</td>
           
            
            <td class="text-center">{{$mecanicien->car}}</td>
            
            <td class="text-center">{{$mecanicien->date}}</td>

            <td class="text-center">{{{$mecanicien->prix}}}</td>
            <td class="text-center">
              <span class="dtr-data">
                <a class="mr-1" href="{{route('showmecanicien',$mecanicien->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
                <a class="mr-1" href="{{route('editmecanicien',$mecanicien->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
                <a href="{{route('deletemecanicien',$mecanicien->id)}}"
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