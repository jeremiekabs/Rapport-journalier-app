<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="icon-base ri ri-menu-line icon-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
            <!-- Place this tag where you want the button to render. -->
            <li class="nav-item lh-1 me-4">
                <a class="github-button" href="#" data-icon="octicon-star" data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/materio-html-admin-template-free on GitHub">Espace de travail</a>
            </li>

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('../assets/img/avatars/2.png') }}" alt="alt" class="rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('../assets/img/avatars/2.png') }}" alt="alt"
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name . ' ' . Auth::user()->firstname }}</h6>

                                </div>

                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 icon-base ri ri-bank-card-line icon-md me-3"></i>
                                <span class="flex-grow-1 align-middle ms-1">Visite | Aujourd'hui</span>
                                <span class="flex-shrink-0 badge rounded-pill bg-danger" id="visitCount">...</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <div class="d-grid px-4 pt-2 pb-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger d-flex" href="javascript:void(0);">
                                    <small class="align-middle">Se deconnecter</small>
                                    <i class="ri ri-logout-box-r-line ms-2 ri-xs"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

<div class="container">
    <div class="nav-align-top">
        <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="icon-base ri ri-home-4-line icon-lg"></i>
                    STATS. VISITES
                </a>
            </li>
            @if (Auth::check() && Auth::user()->statut == 3)
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('visite.create') ? 'active' : '' }}"
                        href="{{ route('visite.create') }}">
                        <i class="icon-base ri ri-group-line icon-sm me-1_5"></i>
                        ENR. VISITES
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('visite.index') ? 'active' : '' }}"
                    href="{{ route('visite.index') }}">
                    <i class="icon-base ri ri-eye-line icon-lg"></i>
                    VOIR VISITE
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                    href="{{ route('categories.index') }}">
                    <i class="icon-base ri ri-eye-line icon-lg"></i>
                    VOIR CATEGORIE
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('produits.index') ? 'active' : '' }}"
                    href="{{ route('produits.index') }}">
                    <i class="icon-base ri ri-eye-line icon-lg"></i>
                    VOIR PRODUIT
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('vente.vendre') ? 'active' : '' }}"
                    href="{{ route('vente.vendre') }}">
                    <i class="icon-base ri ri-shopping-cart-2-line icon-lg"></i>
                    VENDRE
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboardProduit') ? 'active' : '' }}"
                    href="{{ route('dashboardProduit') }}">
                    <i class="icon-base ri ri-eye-line icon-lg"></i>
                    STAT. VENTE
                </a>
            </li>
            @if (Auth::check() && Auth::user()->statut == 2)
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="{{ route('user.index') }}">
                        <i class="ri-key-fill icon-base icon-lg"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("{{ route('count.today.visits') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById("visitCount").innerText = data.count;
            })
            .catch(error => console.error("Erreur chargement visites :", error));
    });
</script>
