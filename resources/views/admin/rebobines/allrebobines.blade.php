@extends('admin.layouts.template')
@section('title')
    S.T.I.T Rebobine Management
@endsection
@section('content')

<div style="padding: 10px 180px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>All Rebobines</h1>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-primary">
                    <a href="{{route('addrebobine')}}" style="text-decoration: none;color: white;">Add Rebobine</a>
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
<div class="card " style="padding: 10px">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title text-center p-2">Rebobines Managment</h3>
    </div>
    
    
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="references">References:</label>
                <select id="references" class="form-control">
                    <option value="">Tous</option>
                    <!-- Ajoutez ici les options de references dynamiquement -->
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="color">Couleur:</label>
                <select id="color" class="form-control">
                    <option value="">Tous</option>
                    <!-- Ajoutez ici les options de color dynamiquement -->
                </select>
            </div>
        </div>
    </div>
    </div>
    <table id="rebobine" class="table table-bordered table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Référence</th>
        <th>Couleur</th>
        <th>Type</th>
        <th>Quantité Disponible En KG</th>
        <th>Quantité Consommée En KG</th>
        <th class="text-center">Reste en Stock</th>
        <th>Status</th>
        <th class="text-center">Date</th>
        <th class="text-center">Action</th>
        </tr>
    </thead>
        <tbody>
            @foreach($rebobines as $rebobine)
        <tr>
        <td>{{$rebobine->id}}</td>
        <td>{{$rebobine->references}}</td>
        <td>{{$rebobine->color}}</td>
        <td class="text-center">{{$rebobine->type}}</td>
        <td class="text-center">{{$rebobine->inQty}} KG</td>
        <td class="text-center">{{$rebobine->outQty}} KG</td>
        <td class="text-center">{{$rebobine->total}} KG</td>
        <td style="color: {{ $rebobine->status === 'Epuisé' ? 'red' : 'green' }};" class="font-weight-bold ">{{ $rebobine->status }}</td>
        <td class="text-center">{{{$rebobine->date}}}</td>
        <td class="text-center">
        <span class="dtr-data">
            <a class="mr-1" href="{{route('showrebobine',$rebobine->id)}}"> <i class="nav icon far fa-eye fa-lg text-black"></i></a>   
            <a class="mr-1" href="{{route('editrebobine',$rebobine->id)}}"> <i class="nav-icon fas fa-edit fa-lg text-green"></i></a>
            <a href="{{route('deleterebobine',$rebobine->id)}}"
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
    var table = $('#rebobine').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": [
        {
            extend: 'copy',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7]
            }
        },
        {
            extend: 'csv',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7]
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7]
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7]
            }
        },
        {
            extend: 'colvis'
        }
    ]
});

    table.buttons().container().appendTo($('#rebobine_wrapper .col-md-6:eq(0)'));

      // Remplissage des options de references, couleur et usine
    let referencesOptions = [];
    let colorOptions = [];


      // Parcourez les produits pour extraire les options de references, color et usine
    @foreach($rebobines as $rebobine)
        var references = "{{$rebobine->references}}";
        var color = "{{$rebobine->color}}";


        if (!referencesOptions.includes(references) && references !== "") {
            referencesOptions.push(references);
        }

        if (!colorOptions.includes(color) && color !== "") {
            colorOptions.push(color);
        }

    @endforeach

      // Remplissez les options dans les sélecteurs
    var referencesSelector = $('#references');
    referencesOptions.forEach(function (option) {
        referencesSelector.append($('<option>', {
            value: option,
            text: option
        }));
    });

    var colorSelector = $('#color');
    colorOptions.forEach(function (option) {
        colorSelector.append($('<option>', {
            value: option,
            text: option
        }));
    });

      // Écoutez les changements dans les sélecteurs de references, color et usine
    referencesSelector.on('change', function () {
        var referencesValue = this.value;
        table.columns(1).search(referencesValue).draw();
    });

    colorSelector.on('change', function () {
        var colorValue = this.value;
        table.columns(2).search(colorValue).draw();
    });

})
</script>
@endsection