@extends('admin.layouts.template')
@section('title')
    Add Piece -STIT Management
@endsection
@section('content')

<div style="padding: 10px 150px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Pieces</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-primary">
                    <a href="{{route('addpiece')}}" style="text-decoration: none;color: white;">Add Piece</a>
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
        <h3 class="card-title text-center p-2">Pieces Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="piece" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Usine</th>
          <th>Référence</th>
          <th>Nom</th>
          <th>Quantité Disponible</th>
          <th>Quantité Consommée</th>
          <th>Status</th>
          <th class="text-center">Date</th>
          <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($pieces as $piece)
        <tr>
          <td>{{$piece->id}}</td>
          <td>{{$piece->usine}}</td>
          <td>{{$piece->references}}</td>
          <td>{{$piece->nom}}</td>
          <td class="text-center">{{$piece->inQty}} KG</td>
          <td class="text-center">{{$piece->outQty}} KG</td>
          <td style="color: {{ $piece->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{ $piece->status }}</td>
          <td class="text-center">{{{$piece->date}}}</td>
          <td class="text-center">
            <span class="dtr-data">
              <a class="mr-1" href="{{route('showpiece',$piece->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
              <a class="mr-1" href="{{route('editpiece',$piece->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
              <a href="{{route('deletepiece',$piece->id)}}"
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