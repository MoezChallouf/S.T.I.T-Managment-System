@extends('admin.layouts.template')

@section('title', 'Add Mecanicien - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

         @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
        @endforeach

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Add New Mecanicien</h3>
        </div>
        <form method="POST" action="{{ route('storemecanicien') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nom Mecanicien</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter name" name="nom">
                </div>
              </div>
                  <div class="form-group">
                    <label>N° Telephone</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="(+216) 99 999 999" name="phone_number">
                    </div>
                  </div>
             
                {{-- nom_piece --}}
                <div class="form-group">
                  <label>Piéces de rechange</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-wrench"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nom_piece" placeholder="nom des pieces changer">
                  </div>
                </div>
                <div class="form-group">
                    <label>intervention</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                      <div class="input-group">
                        <textarea type="text" class="form-control" name="intervention" placeholder="intervention" ></textarea>
                      </div>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label>Description & Remarque</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-prescription"></i></span>
                      <div class="input-group">
                        <textarea type="text" class="form-control" name="remarque" placeholder="description ou bien remarque" ></textarea>
                      </div>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label>Nom Voiture & Matricule</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                      </div>
                      <input type="text" class="form-control" name="car" placeholder="nom voiture">
                    </div>
                  </div>
                <div class="form-group">
                  <label>Date</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="JJ/MM/AAAA" name="date">
                  </div>
              </div>
              <div class="form-group">
                <label>Prix Facture</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="prix" placeholder="Prix En TND">
                </div>
              </div>
              <div class="d-flex justify-content-end p-2">
                <button type="submit" class="btn btn-success font-weight-bold text-white">Ajouter</button>
            </div>
            </div>
            
        </form>
        
    </div>
</div>
@endsection
