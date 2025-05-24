@if (Route::has('login'))
@auth
{{-- ========= Profile ========= --}}
<div class="header-btn d-flex align-items-center">
    <div class="me-3">
        <a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle">
            <i class="isax isax-moon"></i>
        </a>
        <a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle">
            <i class="isax isax-sun-1"></i>
        </a>
    </div>
    <div class="dropdown profile-dropdown">
        <a href="javascript:void(0);" class="d-flex align-items-center" data-bs-toggle="dropdown">
            <span class="avatar avatar-md">
                <img src="{{ Storage::url('profile_images/' . basename(auth()->user()->image)) }}"
                    alt="image" class="img-fluid rounded-circle border border-white border-4">
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end p-3">
            <li>
                <a href="{{route('users.profile.dashboard.index')}}" class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2" href="dashboard.html">Dashboard</a>
            </li>
            <li>
                <a href="{{route('users.profile.reservations.index')}}" class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2" href="customer-hotel-booking.html">Mes reservations</a>
            </li>
            <li>
                <a href="{{ route('users.profile.monprofile.index') }}" class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2" href="my-profile.html">Mon profil</a>
            </li>
            <li>
                <hr class="dropdown-divider my-2">
            </li>
            <li>
                <a href="{{ route('users.profile.parametres.index') }}" class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2" href="profile-settings.html">Paramètres</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item d-inline-flex align-items-center rounded fw-medium p-2" href="login.html">Déconnexion</button>
                </form>
            </li>
        </ul>
    </div>
</div>
@else
<div class="header-btn d-flex align-items-center">
    <div class="me-3">
        <a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle">
            <i class="isax isax-moon"></i>
        </a>
        <a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle">
            <i class="isax isax-sun-1"></i>
        </a>
    </div>
    <div class="fav-dropdown me-3">
        <a href="wishlist.html" class="position-relative">
            <i class="isax isax-heart"></i><span class="count-icon bg-secondary text-gray-9">0</span>
        </a>
    </div>
    <a href="{{ route('login') }}" class="btn btn-dark d-inline-flex align-items-center me-3"><i class="isax isax-lock me-2"></i>Log in</a>
    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="btn btn-dark d-inline-flex align-items-center me-0"><i class="isax isax-lock me-2"></i>Register</a>
    @endif
    @endauth
    <div class="header__hamburger d-xl-none my-auto">
        <div class="sidebar-menu">
            <i class="isax isax-menu5"></i>
        </div>
    </div>
</div>
@endif