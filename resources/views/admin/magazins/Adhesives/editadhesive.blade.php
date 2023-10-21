@extends('admin.layouts.template')

@section('title', 'Edit Adhesive - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

        @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
        @endforeach
            
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Edit Adhesive</h3>
        </div>
        <form method="POST" action="{{route('updateadhesive', $adhesive->id)}}"
            enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="card-body">
                {{-- Usine --}}
                <div class="form-group">
                    <label for="usine">Usine</label>
                    <select class="form-control select2" style="width: 100%;" name="usine">
                        <option value="{{$adhesive->usine}}" selected="selected">{{$adhesive->usine}}</option>
                        <option value="Usine1">Usine 1</option>
                        <option value="Usine2">Usine 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">Type d'Adhesive</label>
                    <select class="form-control select2" style="width: 100%;" name="type">
                        <option selected="selected" value="{{$adhesive->type}}">{{$adhesive->type}}</option>
                        <option value="Colle Pistolet">Colle Pistolet</option>
                        <option value="Grin de Colle">Grin de Colle</option>
                        <option value="Scotch">Scotch</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nom d'Adhesive</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="enter name" name="nom" value="{{$adhesive->nom}}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Quantité en Stock</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Add Quantity" name="inQty" value="{{$adhesive->inQty}}">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Quantité Consommée</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Qty" name="outQty" value="{{$adhesive->outQty}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="JJ/MM/AAAA" name="date" value="{{$adhesive->date}}">
                    </div>
                </div>

                <div class="d-flex justify-content-end p-2">
                    <button type="submit" class="btn btn-secondary font-weight-bold">Update</button>
                </div>
                
            </div>
        </form>
        
    </div>
</div>
@endsection
