@extends('admin.layouts.template')

@section('title', 'Rebobine Details - STIT Management')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container" style="padding: 200px">
    <div class="team-single d-flex">
    
        <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
            <div class="team-single-img">
                <img src="{{asset('dist/img/rebobine.jpg')}}" alt="logo" style="width: 480px; height:320px; padding-right:120px;" >
            </div>
        </div>
        
            <div class="col-lg-8 col-md-7 ">
                <div class="team-single-text padding-50px-left sm-no-padding-left ">
                    <h1 class="font-size38 sm-font-size32 xs-font-size30" style="margin-bottom:30px;">Référance Rebobine: {{$rebobine->references}}</h1>
                    
                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 ">
                            
                            <li>
                                <div class="row ">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-text-width text-yellow"></i>
                                        <strong class="margin-10px-left text-yellow">Type Rebobine:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$rebobine->type}}</p>
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
                                        <p>{{$rebobine->color}}</p>
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
                                        <p>{{$rebobine->inQty}}</p>
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
                                        <p>{{$rebobine->outQty}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-cubes text-indigo"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-indigo">Reste En Stock:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$rebobine->total}}</p>
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
                                        <p>{{$rebobine->date}}</p>
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
                                        <p style="color: {{ $rebobine->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{$rebobine->status}} </p>
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