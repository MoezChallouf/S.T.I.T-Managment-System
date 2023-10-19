@extends('admin.layouts.template')

@section('title', 'piece Details - STIT Management')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container" style="padding: 150px">
    <div class="team-single d-flex">
       
        <div class="row  >
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img src="{{asset('dist/img/piece.jpg')}}" alt="logo" style="width: 480px; height:350px; padding-right:50px;" >
                </div>
            </div>
        
            <div class="col-lg-8 col-md-7 ">
                <div class="team-single-text padding-50px-left sm-no-padding-left ">
                    <h1 class="font-size38 sm-font-size32 xs-font-size30" style="margin-bottom:30px;">Référance piece: {{$piece->references}}</h1>
                    
                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 ">
                            <li>
                                <div class="row " >
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-building text-orange"></i>
                                        <strong class="margin-10px-left text-orange">Usine</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$piece->usine}}</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-palette text-green"></i>
                                        <strong class="margin-10px-left text-green">Nom Piéce:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$piece->nom}}</p>
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
                                        <p>{{$piece->inQty}}</p>
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
                                        <p>{{$piece->outQty}}</p>
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
                                        <p>{{$piece->date}}</p>
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
                                        <p style="color: {{ $piece->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{$piece->status}} </p>
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