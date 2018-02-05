@extends('main')

@section('title', 'Rôles')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
        
                <h3 class="my-5">Gestion des rôles</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="font-size: 1rem">
                        <thead>
                            <th>#</th>
                            <th>Rôle</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <th>{{ $role->id }}</th>
                                <td>{{ $role->name }}</td> 
                                <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                        {{ csrf_field() }}

                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                        <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">

                                        {{ method_field('DELETE') }}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('roles.create') }}" class="btn btn-primary">Ajouter un rôle</a>

            </div>
        </div>
    </div>

@endsection