@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier compte</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editUser') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="newEmail" class="col-md-4 col-form-label text-md-right">nouvelle adresse
                                email</label>

                            <div class="col-md-6">
                                <input id="newEmail" type="email"
                                    class="form-control" name="newEmail"
                                    autocomplete="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newPassword" class="col-md-4 col-form-label text-md-right">nouveau
                                password</label>

                            <div class="col-md-6">
                                <input id="newPassword" type="password" class="form-control" name="newPassword"
                                    autocomplete="new-password">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newPassword-confirm" class="col-md-4 col-form-label text-md-right">confirmer
                                nouveau password</label>

                            <div class="col-md-6">
                                <input id="newPassword-confirm" type="password" class="form-control"
                                    name="newPassword_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Changer') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
