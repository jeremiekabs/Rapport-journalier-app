<nav class="navbar navbar-expand-xl navbar-detached bg-navbar-theme shadow-none border-0 px-0" id="layout-navbar">
    <!-- Container full width avec padding sur les côtés -->
    <div class="container-fluid px-4 px-xxl-5">
        <!-- Menu toggle (mobile) -->
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="icon-base ri ri-menu-2-line icon-md"></i>
            </a>
        </div>

        <!-- Brand/Logo -->
        <div class="navbar-brand-wrapper d-none d-xl-flex align-items-center me-4">
            <span class="logo-text fw-bolder fs-4 text-gradient-primary">
                <span class="text-primary">Admin</span><span class="text-dark">Pro</span>
                <sup class="badge bg-primary bg-opacity-10 text-primary fs-xs ms-1">PREMIUM</sup>
            </span>
        </div>

        <!-- Right side content -->
        <div class="navbar-nav-right d-flex align-items-center justify-content-end w-100" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-md-auto gap-2">
                <!-- Workspace Button -->
                <li class="nav-item lh-1 me-2">
                    <a class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center" href="#">
                        <i class="ri-share-box-line me-1"></i> 
                        <span class="d-none d-lg-inline">Espace de travail</span>
                    </a>
                </li>

                <!-- Notification Bell -->
                <li class="nav-item dropdown notification-dropdown">
                    <a class="nav-link position-relative p-2 rounded-circle bg-light bg-opacity-50 hover-bg-opacity-100" 
                       href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="icon-base ri-notification-3-line icon-md"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-0 overflow-hidden border-0 shadow-lg">
                        <div class="dropdown-menu-header border-bottom bg-primary bg-opacity-10">
                            <div class="d-flex align-items-center justify-content-between py-2 px-3">
                                <h6 class="mb-0 fw-semibold">Notifications</h6>
                                <span class="badge bg-primary rounded-pill">3 Nouveaux</span>
                            </div>
                        </div>
                        <div class="notification-list bg-light">
                            <a href="#" class="dropdown-item py-3 border-bottom d-flex hover-bg-primary hover-bg-opacity-10">
                                <div class="flex-shrink-0">
                                    <i class="ri-checkbox-circle-fill text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Nouvelle vente enregistrée</h6>
                                    <small class="text-muted">Il y a 5 min</small>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item py-3 border-bottom d-flex hover-bg-primary hover-bg-opacity-10">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-follow-fill text-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Nouveau visiteur</h6>
                                    <small class="text-muted">Il y a 1 heure</small>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer bg-light">
                            <a href="#" class="text-primary d-block text-center py-2 fw-semibold">Voir toutes</a>
                        </div>
                    </div>
                </li>

                <!-- User Profile -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0 ms-2" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online position-relative">
                            <img src="{{ asset('../assets/img/avatars/2.png') }}" alt="alt" 
                                 class="rounded-circle border border-3 border-primary shadow-sm" />
                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1 border border-2 border-white"></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg py-0 border-0">
                        <li class="px-4 py-3 bg-primary bg-gradient text-white rounded-top">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('../assets/img/avatars/2.png') }}" alt="alt"
                                            class="w-px-40 h-auto rounded-circle border border-3 border-white shadow" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 text-white">{{ Auth::user()->name . ' ' . Auth::user()->firstname }}</h6>
                                    <small class="text-white-50">{{ Auth::user()->email }}</small>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider my-0"></div>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 px-3 d-flex align-items-center hover-bg-primary hover-bg-opacity-10" href="#">
                                <i class="ri-user-line me-2"></i> Mon profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 px-3 d-flex align-items-center hover-bg-primary hover-bg-opacity-10" href="#">
                                <i class="ri-settings-3-line me-2"></i> Paramètres
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 px-3 d-flex align-items-center hover-bg-primary hover-bg-opacity-10" href="{{ route('visite.index')}}">
                                <span class="d-flex align-items-center w-100">
                                    <i class="ri-line-chart-line me-2"></i>
                                    <span>Visites aujourd'hui</span>
                                    <span class="badge rounded-pill bg-primary ms-auto" id="visitCount">...</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li class="px-3 py-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger w-100 d-flex justify-content-center align-items-center py-2">
                                    <i class="ri-logout-box-r-line me-2"></i>
                                    <span>Déconnexion</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Secondary navigation full width -->
    <div class="container-fluid px-0 mt-3 mb-4">
        <div class="nav-align-top">
            <ul class="nav nav-pills flex-column flex-md-row justify-content-center gap-2 gap-lg-3 px-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} d-flex align-items-center"
                        href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-line me-2"></i>
                        <span>STATS. VISITES</span>
                    </a>
                </li>
                
                @if (Auth::check() && Auth::user()->statut == 3)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('visite.create') ? 'active' : '' }} d-flex align-items-center"
                            href="{{ route('visite.create') }}">
                            <i class="ri-user-add-line me-2"></i>
                            <span>ENR. VISITES</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center">
                            <i class="ri-user-add-line me-3" style="opacity: 0.3"></i>
                            <span style="opacity: 0.2">ENR. VISITE</span>
                        </a>
                    </li>
                @endif
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('visite.index') ? 'active' : '' }} d-flex align-items-center"
                        href="{{ route('visite.index') }}">
                        <i class="ri-list-check-2 me-2"></i>
                        <span>VOIR VISITES</span>
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center {{ request()->routeIs('categories.index', 'produits.index') ? 'active' : '' }}"
                        href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="ri-folder-2-line me-2"></i>
                        <span>CATALOGUE</span>
                    </a>
                    <div class="dropdown-menu shadow border-0">
                        <a class="dropdown-item {{ request()->routeIs('categories.index') ? 'active' : '' }} py-2 px-3 d-flex align-items-center hover-bg-primary hover-bg-opacity-10" 
                           href="{{ route('categories.index') }}">
                            <i class="ri-folders-line me-2"></i> Catégories
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('produits.index') ? 'active' : '' }} py-2 px-3 d-flex align-items-center hover-bg-primary hover-bg-opacity-10" 
                           href="{{ route('produits.index') }}">
                            <i class="ri-box-2-line me-2"></i> Produits
                        </a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('vente.vendre') ? 'active' : '' }} d-flex align-items-center"
                        href="{{ route('vente.vendre') }}">
                        <i class="ri-shopping-cart-2-line me-2"></i>
                        <span>VENTE</span>
                        
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboardProduit') ? 'active' : '' }} d-flex align-items-center"
                        href="{{ route('dashboardProduit') }}">
                        <i class="ri-bar-chart-2-line me-2"></i>
                        <span>STATS DE VENTES</span>
                    </a>
                </li>
                
                @if (Auth::check() && Auth::user()->statut == 2)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }} d-flex align-items-center"
                            href="{{ route('user.index') }}">
                            <i class="ri-shield-user-line me-2"></i>
                            <span>ADMIN</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Main content container with bottom margin -->
<div class="container-fluid px-4 px-xxl-5 mb-5">
    <!-- Your page content here -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Visites aujourd'hui
        fetch("{{ route('count.today.visits') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById("visitCount").innerText = data.count;
            })
            .catch(error => console.error("Erreur chargement visites :", error));
        
        // Animation des menus
        const navItems = document.querySelectorAll('.nav-link:not(.dropdown-toggle)');
        navItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                item.classList.add('transition', 'transform', 'duration-300', 'hover:-translate-y-0.5');
            });
            item.addEventListener('mouseleave', () => {
                item.classList.remove('transition', 'transform', 'duration-300', 'hover:-translate-y-0.5');
            });
        });
    });
</script>

<style>
    /* Custom styles for premium look */
    .bg-navbar-theme {
        background-color: #fff;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    }
    
    .text-gradient-primary {
        background: linear-gradient(135deg, #7367F0 0%, #A66FFE 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .nav-pills .nav-link {
        border-radius: 0.75rem;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid transparent;
        font-weight: 500;
    }
    
    .nav-pills .nav-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(115, 103, 240, 0.15);
        border-color: rgba(115, 103, 240, 0.2);
    }
    
    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #7367F0 0%, #A66FFE 100%);
        color: white !important;
        box-shadow: 0 4px 20px rgba(115, 103, 240, 0.3);
        border-color: rgba(255, 255, 255, 0.2);
    }
    
    .dropdown-menu {
        border: none;
        animation: fadeIn 0.2s ease-in-out;
        border-radius: 0.75rem;
    }
    
    .hover-bg-primary:hover {
        background-color: rgba(115, 103, 240, 0.1) !important;
    }
    
    .hover-bg-opacity-100:hover {
        background-opacity: 1 !important;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .avatar-online::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 12px;
        height: 12px;
        background-color: #28C76F;
        border-radius: 50%;
        border: 2px solid white;
    }
    
    .notification-dropdown .dropdown-menu {
        min-width: 320px;
    }
    
    .shadow-lg {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
    }
</style>