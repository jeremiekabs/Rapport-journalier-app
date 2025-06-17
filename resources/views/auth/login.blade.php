<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion | AdminPro</title>
    
    <!-- Bootstrap + Font Awesome + Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #f86150;
            --primary-light: rgba(115, 103, 240, 0.1);
            --secondary-color: #A66FFE;
            --dark-color: #2F2B3D;
            --light-color: #F8F7FA;
        }
        
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
        }
        
        .brand-section {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .brand-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url("{{ asset('../assets/img/avatars/business.jpg') }}") no-repeat;
            background-position: left center;
            background-size: contain;
            opacity: 0.08;
            z-index: 0;
        }
        
        .brand-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 600px;
        }
        
        .brand-logo {
            width: 120px;
            margin-bottom: 2rem;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.1));
        }
        
        .brand-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .brand-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        
        .login-section {
            width: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-color: white;
            box-shadow: -8px 0 32px rgba(0, 0, 0, 0.05);
        }
        
        .login-card {
            width: 100%;
            max-width: 400px;
        }
        
        .login-logo {
            width: 80px;
            margin-bottom: 1.5rem;
        }
        
        .login-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: #6c757d;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }
        
        .form-control {
            height: 48px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 0 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-light);
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            height: 48px;
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(115, 103, 240, 0.3);
        }
        
        .form-floating label {
            color: #6c757d;
            padding: 0.5rem 1rem;
        }
        
        .alert {
            border-radius: 8px;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #6c757d;
        }
        
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .divider::before {
            margin-right: 1rem;
        }
        
        .divider::after {
            margin-left: 1rem;
        }
        
        .footer-link {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s;
            font-size: 0.9rem;
        }
        
        .footer-link:hover {
            color: var(--primary-color);
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Section de marque à gauche -->
        <div class="brand-section">
            <div class="brand-content">
                <img src="{{ asset('../assets/img/avatars/bpcfu.png') }}" alt="Logo" class="brand-logo animate-in">
                <h1 class="brand-title animate-in delay-1">Business Preparedness and Customer Follow Up</h1>
                <p class="brand-subtitle animate-in delay-2">Solution complète de gestion commerciale</p>
                <div class="animate-in delay-3">
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="#" class="text-white" style="text-decoration: none"><i class="ri-facebook-fill fs-5"></i></a>
                        <a href="#" class="text-white" style="text-decoration: none"><i class="ri-twitter-fill fs-5"></i></a>
                        <a href="#" class="text-white" style="text-decoration: none"><i class="ri-linkedin-fill fs-5"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section de connexion à droite -->
        <div class="login-section">
            <div class="login-card">
                <div class="text-center mb-4">
                    <img src="{{ asset('../assets/img/avatars/bpcfu.png') }}" alt="Logo" class="login-logo">
                    <h2 class="login-title">Connexion</h2>
                    <p class="login-subtitle">Entrez vos identifiants pour accéder à votre espace</p>
                </div>
                
                @if (session('fail'))
                    <div class="alert alert-danger animate-in">
                        <i class="ri-alert-fill me-2"></i> {{ session('fail') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('handleLogin') }}" class="animate-in delay-1">
                    @csrf
                    @method('POST')
                    
                    @if (Session::get('error_msg'))
                        <div class="alert alert-danger mb-3">
                            <i class="ri-close-circle-fill me-2"></i> {{ Session::get('error_msg') }}
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="email" name="email" value="{{ old('email') }}" 
                                   class="form-control" id="emailInput" placeholder="Adresse email" required>
                            <label for="emailInput"><i class="ri-mail-line me-2"></i>Adresse email</label>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="form-floating">
                            <input type="password" name="password" 
                                   class="form-control" id="passwordInput" placeholder="Mot de passe" required>
                            <label for="passwordInput"><i class="ri-lock-2-line me-2"></i>Mot de passe</label>
                        </div>
                        <div class="text-end mt-2">
                            <a href="#" class="text-decoration-none text-muted small">Mot de passe oublié ?</a>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-login w-100 mb-3">
                        <i class="ri-login-box-line me-2"></i> Se connecter
                    </button>
                    
                    <div class="divider">OU</div>
                    
                    <div class="text-center">
                        <p class="text-muted mb-3">Vous n'avez pas de compte ?</p>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">
                            <i class="ri-user-add-line me-2"></i> Créer un compte
                        </a>
                    </div>
                </form>
                
                <div class="text-center mt-4 pt-3 border-top">
                    <a href="#" class="footer-link me-3">Conditions d'utilisation</a>
                    <a href="#" class="footer-link">Politique de confidentialité</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-in');
            elements.forEach(el => {
                el.style.opacity = '0';
            });
            
            setTimeout(() => {
                elements.forEach(el => {
                    el.style.opacity = '1';
                });
            }, 100);
        });
    </script>
</body>
</html>