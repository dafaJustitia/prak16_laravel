@php
    $currentRouteName = Route::currentRouteName();
    $userName = Auth::user()->name; // Fetch the logged-in user's name
@endphp

<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <!-- Brand/Logo -->
        <a href="{{ route('home') }}" class="navbar-brand mb-0 h1">
            <i class="bi-hexagon-fill me-2"></i> Data Master
        </a>

        <!-- Toggler for Mobile View -->
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navigation Links -->
            <ul class="navbar-nav flex-row flex-wrap">
                <li class="nav-item col-2 col-md-auto">
                    <a href="{{ route('home') }}" class="nav-link @if($currentRouteName == 'home') active @endif">
                        Home
                    </a>
                </li>
                <li class="nav-item col-2 col-md-auto">
                    <a href="{{ route('employees.index') }}" class="nav-link @if($currentRouteName == 'employees.index') active @endif">
                        Employee
                    </a>
                </li>
            </ul>

            <!-- Divider for Mobile View -->
            <hr class="d-md-none text-white-50">

            <!-- Profile Dropdown -->
            <div class="dropdown ms-auto">
                <a href="#" class="btn btn-outline-light dropdown-toggle d-flex align-items-center" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-person-circle me-2"></i> {{ $userName }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">View Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
