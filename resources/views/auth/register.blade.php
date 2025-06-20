<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription | AdminPro</title>

    <!-- Bootstrap + Font Awesome + Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        /* Ajoutez ceci dans votre section style */
        .password-strength {
            margin-top: 0.5rem;
        }

        .progress {
            border-radius: 4px;
            background-color: #f0f0f0;
        }

        .progress-bar {
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .requirement {
            display: inline-flex;
            align-items: center;
            font-size: 0.75rem;
        }

        .requirement i {
            font-size: 0.6rem;
            margin-right: 0.25rem;
        }

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

        .register-container {
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
            width: 300px;
            margin-bottom: 2rem;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.1));
        }

        .brand-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .brand-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .register-section {
            width: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-color: white;
            box-shadow: -8px 0 32px rgba(0, 0, 0, 0.05);
        }

        .register-card {
            width: 100%;
            max-width: 400px;
        }

        .register-logo {
            width: 80px;
            margin-bottom: 1.5rem;
        }

        .register-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .register-subtitle {
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

        .btn-register {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            height: 48px;
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .btn-register:hover {
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

        .input-group-text {
            background-color: var(--light-color);
            border-color: #e0e0e0;
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .delay-1 {
            animation-delay: 0.2s;
        }

        .delay-2 {
            animation-delay: 0.4s;
        }

        .delay-3 {
            animation-delay: 0.6s;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <!-- Section de marque à gauche -->
        <div class="brand-section">
            <div class="brand-content">
                <img src="{{ asset('../assets/img/avatars/bpcfu.png') }}" alt="Logo" class="brand-logo animate-in">
                <h1 class="brand-title animate-in delay-1">Business Preparedness and Customer Follow Up</h1>
                <p class="brand-subtitle animate-in delay-2">Solution complète de gestion commerciale</p>
                <div class="animate-in delay-3">
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="#" style="text-decoration: none" class="text-white"><i
                                class="ri-facebook-fill fs-5"></i></a>
                        <a href="#" style="text-decoration: none" class="text-white"><i
                                class="ri-twitter-fill fs-5"></i></a>
                        <a href="#" style="text-decoration: none" class="text-white"><i
                                class="ri-linkedin-fill fs-5"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section d'inscription à droite -->
        <div class="register-section">
            <div class="register-card">
                <div class="text-center mb-4">
                    <img src="{{ asset('../assets/img/avatars/bpcfu.png') }}" alt="Logo" class="register-logo">
                    <h2 class="register-title">Création de compte</h2>
                    <p class="register-subtitle">Remplissez le formulaire pour créer votre compte</p>
                </div>

                @if (session('success_message'))
                    <div class="alert alert-success animate-in">
                        <i class="ri-checkbox-circle-fill me-2"></i> {{ session('success_message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('handleRegister') }}" class="animate-in delay-1">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" name="name" id="nameInput"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Nom" required>
                            <label for="nameInput"><i class="ri-user-line me-2"></i>Nom</label>
                        </div>
                        @error('name')
                            <div class="error-message animate-in">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" name="firstname" id="firstnameInput"
                                class="form-control @error('firstname') is-invalid @enderror"
                                value="{{ old('firstname') }}" placeholder="Prénom" required>
                            <label for="firstnameInput"><i class="ri-user-line me-2"></i>Prénom</label>
                        </div>
                        @error('firstname')
                            <div class="error-message animate-in">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="email" name="email" id="emailInput"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="Email" required>
                            <label for="emailInput"><i class="ri-mail-line me-2"></i>Adresse email</label>
                        </div>
                        @error('email')
                            <div class="error-message animate-in">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remplacez le bloc password actuel par ceci -->
                    <div class="mb-4">
                        <div class="form-floating">
                            <div class="input-group">
                                <input type="password" name="password" id="passwordInput"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Mot de passe" required onkeyup="checkPasswordStrength(this.value)">
                                <span class="input-group-text password-toggle" id="togglePassword">
                                    <i class="ri-eye-line" id="passwordIcon"></i>
                                </span>
                                <label for="passwordInput"><i class="ri-lock-2-line me-2"></i>Mot de passe</label>
                            </div>
                        </div>
                        @error('password')
                            <div class="error-message animate-in">{{ $message }}</div>
                        @enderror

                        <div class="password-strength mt-2">
                            <div class="progress mb-2" style="height: 5px;">
                                <div id="password-strength-bar" class="progress-bar" role="progressbar"
                                    style="width: 0%"></div>
                            </div>
                            <div id="password-requirements" class="small text-muted">
                                <span id="length" class="requirement"><i
                                        class="ri-checkbox-blank-circle-fill text-secondary"></i> 8 caractères
                                    minimum</span>
                                <span id="uppercase" class="requirement ms-3"><i
                                        class="ri-checkbox-blank-circle-fill text-secondary"></i> Majuscule</span>
                                <span id="lowercase" class="requirement ms-3"><i
                                        class="ri-checkbox-blank-circle-fill text-secondary"></i> Minuscule</span>
                                <span id="number" class="requirement ms-3"><i
                                        class="ri-checkbox-blank-circle-fill text-secondary"></i> Chiffre</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-register w-100 mb-3">
                        <i class="ri-user-add-line me-2"></i> Créer mon compte
                    </button>

                    <div class="text-center">
                        <p class="text-muted mb-0">Vous avez déjà un compte ?</p>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary w-100 mt-2">
                            <i class="ri-login-box-line me-2"></i> Se connecter
                        </a>
                    </div>
                </form>

                <div class="text-center mt-4 pt-3 border-top">
                    <a href="#" class="text-decoration-none text-muted me-3">Conditions d'utilisation</a>
                    <a href="#" class="text-decoration-none text-muted">Politique de confidentialité</a>
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

            // Toggle password visibility
            const togglePassword = document.querySelector('#togglePassword');
            const passwordInput = document.querySelector('#passwordInput');
            const passwordIcon = document.querySelector('#passwordIcon');

            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    passwordIcon.className = type === 'password' ? 'ri-eye-line' : 'ri-eye-off-line';
                });
            }
        });
    </script>
    <script>
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('password-strength-bar');
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /\d/.test(password)
            };

            // Mettre à jour les icônes des exigences
            document.getElementById('length').innerHTML = getRequirementIcon(requirements.length) + ' 8 caractères minimum';
            document.getElementById('uppercase').innerHTML = getRequirementIcon(requirements.uppercase) + ' Majuscule';
            document.getElementById('lowercase').innerHTML = getRequirementIcon(requirements.lowercase) + ' Minuscule';
            document.getElementById('number').innerHTML = getRequirementIcon(requirements.number) + ' Chiffre';

            // Calculer la force
            const metRequirements = Object.values(requirements).filter(Boolean).length;
            const totalRequirements = Object.keys(requirements).length;
            const strength = (metRequirements / totalRequirements) * 100;

            // Mettre à jour la barre de progression
            strengthBar.style.width = strength + '%';

            // Changer la couleur en fonction de la force
            if (strength < 40) {
                strengthBar.className = 'progress-bar bg-danger';
            } else if (strength < 80) {
                strengthBar.className = 'progress-bar bg-warning';
            } else {
                strengthBar.className = 'progress-bar bg-success';
            }
        }

        function getRequirementIcon(met) {
            return met ?
                '<i class="ri-checkbox-circle-fill text-success"></i>' :
                '<i class="ri-checkbox-blank-circle-fill text-secondary"></i>';
        }
    </script>
</body>

</html>
