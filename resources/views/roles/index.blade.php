@extends('main')

@section('title', 'Rôles')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">

            <h3 class="mb-4">Gestion des rôles</h3>
            <div class="table-responsive">
                <table class="table table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>Rôle</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td> 
                            <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                            <td>
                                @if ($role->name != "admin")
                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                        {{ csrf_field() }}

                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-block btn-secondary btn-sm mb-1 mr-1">Modifier</a>

                                            <input type="submit" value="Supprimer" class="btn btn-block btn-danger btn-sm mb-1 mr-1">

                                        {{ method_field('DELETE') }}
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>

            <a href="{{ route('roles.create') }}" class="btn btn-primary">Ajouter un rôle</a>

        </div>
    </div>
</div>

@endsection