<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création de compte</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: url("{{ asset('../assets/img/avatars/arriere.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Place le formulaire à gauche */
            padding-left: 50px;
        }
        .register-card {
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.9); /* Effet de transparence */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Ombre douce */
        }
        .register-card img {
            width: 100px;
            margin-bottom: 15px;
        }
    </style>

</head>
<body>
    <div class="container register-container">
        <div class="card register-card">
            <div class="text-center">
                <img src="{{ asset('../assets/img/avatars/smart.png') }}" alt="Logo">
                <h1 class="text-center text-primary">CREATION DE COMPTE</h1>
            </div>

            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('handleRegister') }}">
                @csrf
                @method('POST')

                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control mb-3" placeholder="Entrez votre nom"/>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control mb-3" placeholder="Entrez votre prénom"/>
                    @error('firstname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="text" name="email" value="{{ old('email') }}" class="form-control mb-3" placeholder="Entrez votre email"/>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="password" name="password" class="form-control mb-3" placeholder="Entrez votre mot de passe"/>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <button class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i> S'enregistrer
                    </button>
                    
                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}" class="text-secondary">J'ai déjà un compte</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
