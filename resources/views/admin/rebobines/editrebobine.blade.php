@extends('admin.layouts.template')

@section('title', 'Edit Rebobine - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

        @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
        @endforeach
            
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Edit Rebobine</h3>
        </div>
        <form method="POST" action="{{route('updaterebobine', $rebobine->id)}}"
            enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="card-body">
                {{-- Referance --}}
                <div class="form-group">
                    <label for="references">Référance</label>
                    <input type="text" class="form-control" id="references" name="references"
                        placeholder="Enter référance referance" value="{{$rebobine->references}}">
                </div>
                {{-- Color --}}
                <div class="form-group">
                    <label>Couleur</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Gold / Rouge / noir ..." name="color" value="{{$rebobine->color}}">
                    </div>
                </div>
                {{-- Type --}}
                <div class="form-group">
                    <label>Type de fil</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Margoum / Cotton ..." name="type" value="{{$rebobine->type}}">
                    </div>
                </div>
                {{-- qty initial --}}
                
                <div class="form-group">
                    <label>Quantité en Stock</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Add Quantity" name="inQty" value="{{$rebobine->inQty}}">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Quantité Consommée</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Qty" name="outQty" value="{{$rebobine->outQty}}">
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
                        <input type="text" class="form-control" placeholder="JJ/MM/AAAA" name="date" value="{{$rebobine->date}}">
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
