@extends('admin.layouts.template')

@section('title', 'Employee Details - STIT Management')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container" style="padding: 150px">
    <div class="team-single">
        <div class="row ">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                </div>
              
            </div>

            <div class="col-lg-8 col-md-7 ">
                <div class="team-single-text padding-50px-left sm-no-padding-left ">
                    <h1 class="font-size38 sm-font-size32 xs-font-size30" style="margin-bottom:30px;">{{$employee->first_name}} {{$employee->last_name}}</h1>
                    
                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 no-margin">
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-graduation-cap text-orange"></i>
                                        <strong class="margin-10px-left text-orange">Diplome</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->diplome}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-id-card text-yellow"></i>
                                        <strong class="margin-10px-left text-yellow">Cin:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->cin}}</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-hospital text-lightred"></i>
                                        <strong class="margin-10px-left text-lightred">Cnss:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->cnss}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-map-marker-alt text-green"></i>
                                        <strong class="margin-10px-left text-green">Address:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->city}}</p>
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
                                        <p>{{$employee->phone_number}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-pink"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><a href="javascript:void(0)">{{$employee->email}}</a></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-file-powerpoint text-blue"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-blue">Post de travail:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->post}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-clock text-gray" ></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-gray">Date d'embauche </strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->hire_date}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-calendar-day text-indigo"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-indigo">Calendrier:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->calendrier}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-calendar-day text-cyan"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-cyan">Prix par heure: </strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$employee->hourly_rate}} TND</p>
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