@extends('admin.layouts.template')

@section('title', 'electricien Details - STIT Management')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container" style="padding: 150px">
    <div class="team-single">
        <div class="row ">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img src="{{asset('dist/img/electricien.jpg')}}" alt="logo" style="width: 480px; height:480px; padding-right:50px;" >
                </div>
            </div>

            <div class="col-lg-8 col-md-7 ">
                <div class="team-single-text padding-50px-left sm-no-padding-left ">
                    <h1 class="font-size38 sm-font-size32 xs-font-size30" style="margin-bottom:30px;">Electricien ID : {{$electricien->id}}</h1>
                    
                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 ">
                            <li>
                                <div class="row " >
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-users-cog text-orange"></i>
                                        <strong class="margin-10px-left text-orange">Nom Electricien</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$electricien->nom}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-mobile-alt text-purple"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-purple">Phone:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$electricien->phone_number}}</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="row ">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-file-signature text-lightred"></i>
                                        <strong class="margin-10px-left text-lightred">intervention:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$electricien->intervention}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-file-prescription text-green"></i>
                                        <strong class="margin-10px-left text-green">Description/Remarque:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$electricien->remarque}}</p>
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
                                        <p>{{$electricien->date}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row ul">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-calendar-day text-cyan"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-cyan">Prix Facture: </strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$electricien->prix}} TND</p>
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