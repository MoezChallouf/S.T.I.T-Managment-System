@extends('admin.layouts.template')
@section('title')
    All Electriciens -STIT Management
@endsection
@section('content')

<div style="padding:10px 150px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Electriciens</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-success">
                    <a href="{{route('addelectricien')}}" style="text-decoration: none;color: white;">Add Electricien</a>
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
        <h3 class="card-title text-center p-2">Electriciens Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="electricien" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nom electricien</th>
            <th class="text-center">N° Telephone</th>
            <th class="text-center">Date</th>
            <th class="text-center">Prix Facture</th>
            <th class="text-center">Action</th>
          </tr>
          </thead>
          <tbody>
              @foreach($electriciens as $electricien)
          <tr>
            <td class="text-center">{{$electricien->id}}</td>
            <td class="text-center">{{$electricien->nom}}</td>
            <td class="text-center">{{$electricien->phone_number}}</td>
            <td class="text-center">{{$electricien->date}}</td>
            <td class="text-center">{{{$electricien->prix}}}</td>
            <td class="text-center">
              <span class="dtr-data">
                <a class="mr-1" href="{{route('showelectricien',$electricien->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
                <a class="mr-1" href="{{route('editelectricien',$electricien->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
                <a href="{{route('deleteelectricien',$electricien->id)}}"
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