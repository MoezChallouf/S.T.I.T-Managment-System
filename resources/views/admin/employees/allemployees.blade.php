@extends('admin.layouts.template')
@section('title')
    All employee -STIT Management
@endsection
@section('content')

<div style="padding: 10px 150px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Employees</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-success">
                    <a href="{{route('addemployee')}}" style="text-decoration: none;color: white;">Add Employee</a>
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
        <h3 class="card-title text-center p-2">Employees Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="employee" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Ville</th>
          
          
          <th>Cin</th>
          
          <th class="text-center">Diplome</th>
          <th>Date d'embauche </th>
          
          <th class="text-center">Post de Travail</th>
          <th class="text-center" >Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
        <tr>
          <td>{{$employee->id}}</td>
          <td>{{$employee->first_name}}</td>
          <td>{{$employee->last_name}}</td>
          <td>{{$employee->city}}</td>
         
          
          <td class="text-center">{{$employee->cin}}</td>
          
          <td class="text-center">{{$employee->diplome}}</td>
          <td class="text-center">{{$employee->hire_date}}</td>
          
          <td class="text-center">{{{$employee->post}}}</td>
          <td class="text-center">
            <span class="dtr-data">
              <a class="mr-1" href="{{route('showemployee',$employee->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
              <a class="mr-1" href="{{route('editemployee',$employee->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
              <a href="{{route('deleteemployee',$employee->id)}}"
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