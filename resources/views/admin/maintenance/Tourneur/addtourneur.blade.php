@extends('admin.layouts.template')

@section('title', 'Add Tourneur - STIT Management')

@section('content')
<div class="col-6" style="margin: auto; padding: 40px;">

         @foreach($errors->all() as $error)
            <li class="text-white alert alert-danger">{{ $error }}</li>
        @endforeach

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title text-white font-weight-bold">Add New Tourneur</h3>
        </div>
        <form method="POST" action="{{ route('storetourneur') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Nom Tourneur</label>
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
                  <div class="form-group">
                    <label>Machine</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                      </div>
                      <input type="text" class="form-control" name="machine" placeholder="nom de la machine" >
                    </div>
                  </div>
                {{-- nom_piece --}}
                <div class="form-group">
                  <label>piéce</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-wrench"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nom_piece" placeholder="nom de la piece">
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
                    <label>Description</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-file-prescription"></i></span>
                      <div class="input-group">
                        <textarea type="text" class="form-control" name="description" placeholder="description ou bien remarque" ></textarea>
                      </div>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label>Quantité en Stock</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Quantité Entrée" name="qty_in">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Quantité Consommée</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Quantité Consommée " name="qty_out">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
                        </div>
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
                    <button type="submit" class="btn btn-warning font-weight-bold text-white">Ajouter</button>
                </div>
                
            </div>
          
        </form>
        
    </div>
</div>
@endsection
