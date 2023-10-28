<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-danger"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <img src="{{ URL::asset('/res/images/appimages/lod1.gif') }}" alt="profile Pic" height="40" width="40" id="spinShowHide" />
        </li>

        <li class="nav-item">
            <a class="nav-link" data-slide="true" href="#" role="button">
                <i class="fa fa-user text-danger" aria-hidden="true"></i>
                {{ Auth::user()->name }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-in-alt text-danger"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</nav>
