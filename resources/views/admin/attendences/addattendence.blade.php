@extends('admin.layouts.template')

@section('title', 'Add Attendence - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

         @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
        @endforeach

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Add New Attendence</h3>
        </div>
        <form method="POST" action="{{ route('storeattendence') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                
                {{-- Usine --}}
                <div class="form-group">
                    <label for="usine">Employee Name</label>
                    <select class="form-control select2" style="width: 100%;" name="usine">
                        <option selected="selected" disabled>Select Employee</option>
                        @foreach ($employees as $employee)
                            <option value="{{$employee->first_name}} {{$employee->last_name}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Referance --}}
               
            
                <div class="form-group">
                  <label>Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="calendrier">Status</label>
                    <select class="form-control select2" style="width: 100%;" name="status">
                        <option selected="selected" disabled>Select Status
                        </option>
                        <option value="Absent">Absent</option>
                        <option value="Present">Present</option>
                        <option value="Late">Late</option>
                        <option value="HalfDay">HalfDay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Heure Entree</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Heure Entree" name="time_in">
                    </div>
                </div>
                <div class="form-group">
                    <label>Heure Sortie</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Heure Sortie" name="time_out">
                    </div>
                </div>
                <div class="form-group">
                    <label>Contenaire</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Montant Cadre" name="cadre">
                    </div>
                </div>
                <div class="form-group">
                    <label>Prime</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Montant Prime" name="prime">
                    </div>
                </div>
                <div class="form-group">
                    <label>Avance</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Montant de Avance" name="avance">
                    </div>
                </div>
                   
                <div class="d-flex justify-content-end p-2">
                    <button type="submit" class="btn btn-primary font-weight-bold">Ajouter</button>
                </div>
                
            </div>
          
        </form>
        
    </div>
</div>
@endsection
