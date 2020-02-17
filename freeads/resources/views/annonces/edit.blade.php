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
                    <div class="card-header">edition d'annonces : </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('annonces.update',$annonce->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="titre" class="col-md-4 col-form-label text-md-right">Titre de l'annonce</label>

                                <div class="col-md-6">
                                    <input id="titre" type="text" class="form-control" value="{{ $annonce->titre }}" name="titre" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description de l'annonce</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" value="{{ $annonce->description }}" style="width:270px; " class="form-control" name="description" required autocomplete="description" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prix" class="col-md-4 col-form-label text-md-right">Prix de l'annonce</label>

                                <div class="col-md-6">
                                    <input id="prix" type="number" value="{{ $annonce->prix }}" class="form-control" name="prix" required autocomplete="prix" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('update') }}
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