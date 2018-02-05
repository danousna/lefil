@extends('main')

@section('title', 'Permissions')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                
                <h3 class="my-5">Gestion des permissions</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="font-size: 1rem">
                        <thead>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <th>{{ $permission->id }}</th>
                                <td>{{ $permission->name }}</td> 
                                <td>
                                    <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}">
                                        {{ csrf_field() }}
                                        
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                        <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">

                                        {{ method_field('DELETE') }}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('permissions.create') }}" class="btn btn-primary">Ajouter une permission</a>

            </div>
        </div>
    </div>

@endsection