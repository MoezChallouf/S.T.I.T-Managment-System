@extends('admin.layouts.template')

@section('title', 'Edit Employee - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

         @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
        @endforeach

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Edit Employee</h3>
        </div>
        <form method="POST" action="{{route('updateemployee', $employee->id)}}"
            enctype="multipart/form-data">
          @method('PUT')
            @csrf
            <div class="card-body">
                {{-- first_name --}}
                <div class="form-group">
                    <label>Prénom</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="first_name" placeholder="Prénom" value="{{$employee->first_name}}">
                    </div>
                  </div>
                {{-- last_name --}}
                <div class="form-group">
                    <label>Nom</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="last_name" placeholder="Nom" value="{{$employee->last_name}}">
                    </div>
                  </div>
                {{-- city --}}
                <div class="form-group">
                    <label>Ville</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="city" placeholder="Ville" value="{{$employee->city}}">
                    </div>
                    
                  </div>
                {{-- email --}}
                <div class="form-group">
                    <label>Email</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                      </div>
                      <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                    </div>
                    <!-- /.input group -->
                  </div>
                {{-- phone_number --}}
                
                <div class="form-group">
                    <label>N° Telephone</label>
  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="(999) 99 999 999" name="phone_number" value=" {{$employee->phone_number}}">
                    </div>
                    <!-- /.input group -->
                  </div>
                  {{-- Cin --}}
                  <div class="form-group">
                    <label>Cin</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="cin" placeholder="N° Carte d'identité" value="{{$employee->cin}}">
                    </div>
                  </div>
                   {{-- Cnss --}}
                   <div class="form-group">
                    <label>Cnss</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="cnss" placeholder="N° Cnss" value="{{$employee->cnss}}">
                    </div>
                  </div>
                   {{-- diplome --}}
                   <div class="form-group">
                    <label>Diplome / Niveau</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="diplome" placeholder="Diplome/Niveau" value="{{$employee->diplome}}">
                    </div>
                  </div>
                {{-- post --}}
                <div class="form-group">
                    <label>Post de Travail</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Post de travail" name="post" value="{{$employee->post}}">
                    </div>
                </div>
                {{-- hire_date --}}
                <div class="form-group">
                    <label>Date d'embauche  </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="JJ/MM/AAAA" name="hire_date" value="{{$employee->hire_date}}">
                    </div>
                    {{-- calendrier --}}
                <div class="form-group">
                    <label for="calendrier">Heures de travail</label>
                    <select class="form-control select2" style="width: 100%;" name="calendrier">
                        <option selected="selected" value="{{$employee->calendrier}}" >{{$employee->calendrier}}</option>
                        <option value="Time 1">7am -- > 4pm</option>
                        <option value="Time 2">7am -- > 7pm</option>
                        <option value="Time 3">7:45am -- > 1:45pm</option>
                        <option value="Time 4">7:45am -- > 4:45pm</option>
                        <option value="Time 5">7pm -- > 5am</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label>Prix par heure</label>
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Prix En TND" name="hourly_rate" value="{{$employee->hourly_rate}}">
                  </div>
              </div>
                <div class="d-flex justify-content-end p-2">
                    <button type="submit" class="btn btn-success font-weight-bold">Update</button>
                </div>
                
            </div>
          
        </form>
        
    </div>
</div>
@endsection
