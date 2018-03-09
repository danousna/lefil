@extends('main')

@section('title', 'Permissions')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble"> 
            <h3 class="mb-4">Gestion des permissions</h3>
            <div class="table-responsive">
                <table class="table table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>Nom</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td> 
                            <td>
                                @if ($permission->name != "administer roles & permissions")
                                    <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}">
                                        {{ csrf_field() }}
                                        
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-secondary btn-sm mb-1 mr-1">Modifier</a>
                                        <input type="submit" value="Supprimer" class="btn btn-danger btn-sm mb-1 mr-1">

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

            <a href="{{ route('permissions.create') }}" class="btn btn-primary">Ajouter une permission</a>

        </div>
    </div>
</div>

@endsection