@extends('main')

@section('title', 'Utilisateurs')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h3 class="mb-4">Gestion des utilisateurs</h3>

            <div class="table-responsive">
                <table class="table table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Inscription</th>
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
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-block btn-secondary btn-sm">Modifier</a>
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