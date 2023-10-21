@extends('admin.layouts.template')

@section('title', 'Franges Details - STIT Management')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container" style="padding: 150px">
    <div class="team-single d-flex">
       
        <div class="row  >
            <div style="width:100px; heigth:100px">
                @if (Storage::exists("public/".$frange->image))
                    <div>
                        
                        <div class="rounded ">
                            <div
                                class=" justify-center flex px-5 border-dashed border-2 border-gray-400 rounded-lg">
                                <div class="-m-1 flex w-64 py-4 flex-wrap md:-m-2">
                                    <div class="w-1/3 p-1 md:p-2">
                                        <img
                                            class="block w-100 rounded-lg object-cover object-center"
                                            src="{{ asset('storage/' . $frange->image) }}"
                                            alt="frange Logo"/> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        
            <div class="col-lg-8 col-md-7 ">
                <div class="team-single-text padding-50px-left sm-no-padding-left ">
                    <h1 class="font-size38 sm-font-size32 xs-font-size30" style="margin-bottom:30px;">Référance frange: {{$frange->references}}</h1>
                    
                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 ">
                            <li>
                                <div class="row " >
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-building text-orange"></i>
                                        <strong class="margin-10px-left text-orange">Usine</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$frange->usine}}</p>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="row ">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-text-width text-yellow"></i>
                                        <strong class="margin-10px-left text-yellow">Type frange:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$frange->frange}}</p>
                                    </div>
                                </div>
                            </li>
                        
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-palette text-green"></i>
                                        <strong class="margin-10px-left text-green">Couleur:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$frange->color}}</p>
                                    </div>
                                </div>
                            </li>
                        
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-check text-pink"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-pink">Quantité en Stock:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$frange->inQty}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row ">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-ambulance text-blue"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-blue">Quantité Consommée:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$frange->outQty}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-cubes text-indigo"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-indigo">Reste en Stock:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$frange->total}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row ">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-clock text-gray" ></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-gray">Date: </strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$frange->date}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row ul">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-battery-three-quarters text-cyan"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-cyan">Status: </strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p style="color: {{ $frange->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{$frange->status}} </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection