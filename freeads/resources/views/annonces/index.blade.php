@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="card-header">Toutes les annonces</div>
                    <a class="btn btn-success" href="{{ route('annonces.create') }}">Create New annonce</a>
                    @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                    @endif
                    <table class="table table-bordered">

                        <tr>

                            <th>Numero</th>

                            <th>Titre</th>

                            <th>Description</th>

                            <th>Prix</th>

                            

                            <th width="280px">Action</th>

                        </tr>

                        @foreach ($annonces as $annonce)

                        <tr>

                            <td>{{ $annonce->id }}</td>

                            <td>{{ $annonce->titre }}</td>

                            <td>{{ $annonce->description }}</td>

                            <td>{{ $annonce->prix }}</td>
                            
                            
                            
                            <td>

                                <form action="{{ route('annonces.destroy',$annonce->id) }}" method="POST">



                                    <a class="btn btn-info" href="{{ route('annonces.show',$annonce->id) }}">Show</a>



                                    <a class="btn btn-primary" href="{{ route('annonces.edit',$annonce->id) }}">Edit</a>



                                    @csrf

                                    @method('DELETE')



                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection