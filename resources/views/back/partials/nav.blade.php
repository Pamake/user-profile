<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home')}}" class="nav-link">Accueil</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">

                    <p>
                        {{  Auth::user()->userDetail->first_name.' '.Auth::user()->last_name }}
                        <small>{{ Auth::user()->userDetail->job_title }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('password.request') }}" class="btn btn-default btn-flat">Changement mot de passe</a>
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right"><i class='fas fa-sign-out-alt' style='font-size:26px'></i></a>
                </li>
            </ul>
        </li>

        <li class="nav-item"><a  class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class='fas fa-sign-out-alt' style='font-size:20px'></i> <b>Déconnexion</b></a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
