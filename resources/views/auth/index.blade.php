@extends('layouts.template')

@section('content')
    <main id="main" class="container">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des admins</h5>

                            <!-- Dark Table -->
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Accès</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Modifier</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                            <!-- End Dark Table -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
