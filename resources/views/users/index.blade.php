@extends('main')

@section('title', 'Utilisateurs')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Gestion des utilisateurs
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-11 mx-auto my-4 p-4">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th>Rôle</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($user->created_at)) }}</td>
                            <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                {{-- <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    {{ csrf_field() }}
                                    <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">
                                    {{ method_field('DELETE') }}
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <br>

            <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>

        </div>
    </div>
</div>

@endsection