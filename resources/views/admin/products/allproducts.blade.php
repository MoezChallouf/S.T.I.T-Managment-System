@extends('admin.layouts.template')
@section('title')
    All Product -STIT Management
@endsection
@section('content')

<div style="padding: 10px 80px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Products</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-warning">
                    <a href="{{route('addproduct')}}" style="text-decoration: none;color: white;">Add Product</a>
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
        <h3 class="card-title text-center p-2">Products Table</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="taille">Taille:</label>
                <select id="taille" class="form-control">
                    <option value="">Tous</option>
                    <!-- Ajoutez ici les options de taille dynamiquement -->
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="couleur">Couleur:</label>
                <select id="couleur" class="form-control">
                    <option value="">Tous</option>
                    <!-- Ajoutez ici les options de couleur dynamiquement -->
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="usine">Usine:</label>
                <select id="usine" class="form-control">
                    <option value="">Tous</option>
                    <!-- Ajoutez ici les options d'usine dynamiquement -->
                </select>
            </div>
        </div>
      </div>
      <table id="product" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Usine</th>
          <th>Référance</th>
          <th>Article</th>
          <th>Taille</th>
          <th>Couleur</th>
          <th>Quantité Disponible</th>
          <th>Quantité Vendu</th>
          <th>Status</th>
          <th>Date de fabrication</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->usine}}</td>
          <td>{{$product->references}}</td>
          <td>{{$product->design}}</td>
          <td>{{$product->size}}</td>
          <td class="text-center">{{$product->color}}</td>
          <td class="text-center">{{$product->inQty}}</td>
          <td class="text-center">{{$product->outQty}}</td>
          <td style="color: {{ $product->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{ $product->status }}</td>
          <td class="text-center">{{{$product->date}}}</td>
          <td>
            <span class="dtr-data">
              <a class="mr-1" href="{{route('showproduct',$product->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
              <a class="mr-1" href="{{route('editproduct',$product->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
              <a href="{{route('deleteproduct',$product->id)}}"
                onclick="return confirm('Are you sure you want to delete this item?');">
                <i class="far fa-trash-alt fa-lg text-red"></i>
              </a>
            </span>
          </td>    
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>

<script>
  $(document).ready(function () {
      // Initialisation de la DataTable
      var table = $('#product').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": [
        {
            extend: 'copy',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 9]
            }
        },
        {
            extend: 'csv',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 9]
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 9]
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 9]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 9]
            }
        },
        {
            extend: 'colvis'
        }
    ]
});

      table.buttons().container().appendTo($('#product_wrapper .col-md-6:eq(0)'));

      // Remplissage des options de taille, couleur et usine
      var tailleOptions = [];
      var couleurOptions = [];
      var usineOptions = [];

      // Parcourez les produits pour extraire les options de taille, couleur et usine
      @foreach($products as $product)
          var taille = "{{$product->size}}";
          var couleur = "{{$product->color}}";
          var usine = "{{$product->usine}}";

          if (!tailleOptions.includes(taille) && taille !== "") {
              tailleOptions.push(taille);
          }

          if (!couleurOptions.includes(couleur) && couleur !== "") {
              couleurOptions.push(couleur);
          }

          if (!usineOptions.includes(usine) && usine !== "") {
              usineOptions.push(usine);
          }
      @endforeach

      // Remplissez les options dans les sélecteurs
      var tailleSelector = $('#taille');
      tailleOptions.forEach(function (option) {
          tailleSelector.append($('<option>', {
              value: option,
              text: option
          }));
      });

      var couleurSelector = $('#couleur');
      couleurOptions.forEach(function (option) {
          couleurSelector.append($('<option>', {
              value: option,
              text: option
          }));
      });

      var usineSelector = $('#usine');
      usineOptions.forEach(function (option) {
          usineSelector.append($('<option>', {
              value: option,
              text: option
          }));
      });
      

      // Écoutez les changements dans les sélecteurs de taille, couleur et usine
      tailleSelector.on('change', function () {
          var tailleValue = this.value;
          table.columns(4).search(tailleValue).draw();
      });

      couleurSelector.on('change', function () {
          var couleurValue = this.value;
          table.columns(5).search(couleurValue).draw();
      });

      usineSelector.on('change', function () {
          var usineValue = this.value;
          table.columns(1).search(usineValue).draw();
      });
  })
  
</script>


  @endsection
  