@extends('admin.layouts.template')

@section('title', 'Add Frange - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

         @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
        @endforeach

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Add New Frange</h3>
        </div>
        <form method="POST" action="{{ route('storefrange') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- Usine --}}
                <div class="form-group">
                    <label for="usine">Usine</label>
                    <select class="form-control select2" style="width: 100%;" name="usine">
                        <option selected="selected" disabled>Select Usine</option>
                        <option value="Usine1">Usine 1</option>
                        <option value="Usine2">Usine 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Frange">Type De Frange</label>
                    <select class="form-control select2" style="width: 100%;" name="frange">
                        <option selected="selected" disabled>Select Frange Type </option>
                        <option value="Produit Importé">Frange Importé</option>
                        <option value="Produit Fabriqué">Frange Fabriqué</option>
                    </select>
                </div>
                {{-- Referance --}}
                <div class="form-group">
                    <label for="references">Référance</label>
                    <input type="text" class="form-control" id="references" name="references"
                        placeholder="Enter référance referance">
                </div>

                {{-- Color --}}
            
                <div class="form-group">
                    <label>Couleur</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Gold / Rouge / noir ..." name="color">
                    </div>
                </div>
                {{-- Type --}}
           
                
                {{-- qty initial --}}
                
                <div class="form-group">
                    <label>Quantité en Stock</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Quantity En KILOGRAMME" name="inQty">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Quantité Consommée</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Qty En KILOGRAMME" name="outQty">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Date </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="JJ/MM/AAAA" name="date">
                    </div>
                </div>
                <div class="form-group">
                    <label>Image </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-images"></i></span>
                        </div>
                        <input type="file" class="form-control" name="image">
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
