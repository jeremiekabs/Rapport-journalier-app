<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: url("{{ asset('../assets/img/avatars/arriere.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Place le formulaire à gauche */
        }
        .login-card {
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.9); /* Effet de transparence */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Effet d'ombre */
        }
        .login-card img {
            width: 100px;
            margin-bottom: 15px;
        }
    </style>

</head>
<body>
    <div class="container login-container">
        <div class="card login-card">
            <div class="text-center">
                <img src="{{ asset('../assets/img/avatars/smart.png') }}" alt="Logo">
                <h1 class="text-center text-primary">ESPACE DE CONNEXION</h1>
            </div>

            @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif

            <form method="POST" action="{{ route('handleLogin') }}">
                @csrf
                @method('POST')

                <div class="form-group">
                    @if (Session::get('error_msg'))
                        <div class="alert alert-danger">
                            {{ Session::get('error_msg') }}
                        </div>
                    @endif

                    <input type="text" name="email" value="{{ old('email') }}" class="form-control mb-3" placeholder="Entrez votre email"/>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Entrez votre mot de passe"/>
                    
                    <button class="btn btn-primary btn-block">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>
                    
                    <div class="mt-3 text-center">
                        <a href="{{ route('register') }}" class="text-secondary">Je n'ai pas de compte</a>
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
