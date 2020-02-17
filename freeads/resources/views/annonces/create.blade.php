@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-header">creation d'annonces : </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('annonces.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="titre" class="col-md-4 col-form-label text-md-right">Titre de l'annonce</label>

                                <div class="col-md-6">
                                    <input id="titre" type="text" class="form-control" name="titre" required autocomplete="titre" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description de l'annonce</label>

                                <div class="col-md-6">
                                    <textarea id="description" rows="10" cols="30" class="form-control" name="description" required autocomplete="description" autofocus></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prix" class="col-md-4 col-form-label text-md-right">Prix de l'annonce</label>

                                <div class="col-md-6">
                                    <input id="prix" type="number" class="form-control" name="prix" required autocomplete="prix" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">upload de photo</label>

                                <div class="col-md-8">
                                    <input id="photo" type="file" class="form-control" name="photo">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('create') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection