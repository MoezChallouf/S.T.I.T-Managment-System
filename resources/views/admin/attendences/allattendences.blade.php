@extends('admin.layouts.template')
@section('title')
    Add bobine -STIT Management
@endsection
@section('content')

<div style="padding: 10px 150px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All bobines</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-primary">
                    <a href="{{route('addbobine')}}" style="text-decoration: none;color: white;">Add Bobine</a>
                </button>
            </ol>
          </div>
        </div>
      </div>
    </section>

    @if(session()->has('message'))
    <div class="alert alert-success" role="alert" id="success-alert">
      {{ session()->get('message') }}
    </div>
    @endif
  
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title text-center p-2">Bobines Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="bobine" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Usine</th>
          <th>Référence</th>
          <th>Couleur</th>
          <th>Type</th>
          <th>Quantité Disponible En KG</th>
          <th>Quantité Consommée En KG</th>
          <th>Status</th>
          <th class="text-center">Date</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($bobines as $bobine)
        <tr>
          <td>{{$bobine->id}}</td>
          <td>{{$bobine->usine}}</td>
          <td>{{$bobine->references}}</td>
          <td>{{$bobine->color}}</td>
          <td class="text-center">{{$bobine->type}}</td>
          <td class="text-center">{{$bobine->inQty}} KG</td>
          <td class="text-center">{{$bobine->outQty}} KG</td>
          <td style="color: {{ $bobine->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{ $bobine->status }}</td>
          <td class="text-center">{{{$bobine->date}}}</td>
          <td>
            <span class="dtr-data md:flex max-sm:flex xs:flex">
                
           <a class="border border-success rounded p-2 text-center mr-1"
              href="{{route('editbobine',$bobine->id)}}"
           >
               <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                   <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                   <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                      stroke-linejoin="round"></g>
                   <g id="SVGRepo_iconCarrier">
                       <path
                           d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                           stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                           stroke-linejoin="round"></path>
                       <path
                           d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                           stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                           stroke-linejoin="round"></path>
                   </g>
               </svg>
           </a
           >
           <a 
    class="border border-danger rounded p-2 text-center"
    href="{{ route('deletebobine', $bobine->id) }}"
    onclick="return confirm('Are you sure you want to delete this item?');"
>
               <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                   <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                   <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                      stroke-linejoin="round"></g>
                   <g id="SVGRepo_iconCarrier">
                       <path
                           d="M10 12L14 16M14 12L10 16M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                           stroke="#000000" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round"></path>
                   </g>
               </svg>
           </a
           >
           

           </span>
          </td>    
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    </div>
   
</div>
  @endsection