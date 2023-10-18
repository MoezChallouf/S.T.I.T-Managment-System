@extends('admin.layouts.template')

@section('title', 'Edit Bobine - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

           @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
           @endforeach
            
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Edit Bobine</h3>
        </div>
        <form method="POST" action="{{route('updatebobine', $bobine->id)}}"
            enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="card-body">
                {{-- Usine --}}
                <div class="form-group">
                    <label for="usine">Usine</label>
                    <select class="form-control select2" style="width: 100%;" name="usine">
                        <option value="{{$bobine->usine}}" selected="selected">{{$bobine->usine}}</option>
                        <option value="Usine1">Usine 1</option>
                        <option value="Usine2">Usine 2</option>
                    </select>
                </div>
                {{-- Referance --}}
                <div class="form-group">
                    <label for="references">Référance</label>
                    <input type="text" class="form-control" id="references" name="references"
                        placeholder="Enter référance referance" value="{{$bobine->references}}">
                </div>
                {{-- Color --}}
                <div class="form-group">
                    <label>Couleur</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Gold / Rouge / noir ..." name="color" value="{{$bobine->color}}">
                    </div>
                </div>
                {{-- Type --}}
           
                <div class="form-group">
                    <label>Type de fil</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Margoum / Cotton ..." name="type" value="{{$bobine->type}}">
                    </div>
                </div>
                {{-- qty initial --}}
                
                <div class="form-group">
                    <label>Quantité en Stock</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Add Quantity" name="inQty" value="{{$bobine->inQty}}">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Quantité Consommée</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Qty" name="outQty" value="{{$bobine->outQty}}">
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
                        <input type="text" class="form-control" placeholder="JJ/MM/AAAA" name="date" value="{{$bobine->date}}">
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
                <div class="md:flex sm:block w-100">

                                    @if (Storage::exists("public/".$bobine->image))
                                        <div>
                                            <label class="block mt-3 mb-2 text-md font-medium text-gray-900">Image
                                                Bobine :</label>
                                            <div class="rounded ">
                                                <div
                                                    class=" justify-center flex px-5 border-dashed border-2 border-gray-400 rounded-lg">
                                                    <div class="-m-1 flex w-64 py-4 flex-wrap md:-m-2">

                                                        <div class="w-1/3 p-1 md:p-2">
                                                            <img
                                                                class="block w-100 rounded-lg object-cover object-center"
                                                                src="{{ asset('storage/' . $bobine->image) }}"
                                                                alt="Bobine Logo"/>
                                                            <div class="flex items-center mr-4">
                                                                <input id="red-checkbox" type="checkbox"
                                                                       name="delete_images"
                                                                       value="{{ $bobine->image }}"
                                                                       class="w-4 h-4 mt-2 text-red-600 bg-gray-100 border-gray-200 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                                                <label for="red-checkbox"
                                                                       class="ml-2 mt-2 text-sm font-medium text-gray-100 dark:text-gray-700">Delete</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                
                
                </div>
                <div class="d-flex justify-content-end p-2">
                    <button type="submit" class="btn btn-secondary font-weight-bold">Update</button>
                </div>
                
            </div>
          
        </form>
        
    </div>
</div>
@endsection
