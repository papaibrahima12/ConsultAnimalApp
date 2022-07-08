@extends('layouts.template')

@section('content')
<div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-3">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Liste des animaux</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table table-bordered table-responsive-md">
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Age</th>
                    <th>Race</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                @foreach($animaux as $animal)
                    <tr>
                        <td>{{ $animal->id }}</td>
                        <td>{{ $animal->nom }}</td>
                        <td>{{ $animal->categorie }}</td>
                        <td>{{ $animal->age }}</td>
                        <td>{{ $animal->race }}</td>
                        <td><a href="{{ route('animalshow',['id' => $animal->id]) }}">Editer</a></td>
                        <td><a href="{{ route('animaldelete',['id' => $animal->id]) }}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
