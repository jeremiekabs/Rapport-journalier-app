@extends('layouts.template')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title text-center text-primary">Modifier le statut</h5>

                            <form action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="statut" class="form-label fw-bold">Statut :</label>
                                    <input type="text" id="statut" value="{{ $user->statut }}" name="statut" class="form-control" placeholder="Saisissez votre statut" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line"></i> Mettre à jour
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
