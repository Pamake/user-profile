<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('adminlte/img/panekv5360x83.png')}}" alt="Panek Logo" class="img"
             style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <small><small>&nbsp;  &nbsp; <a href="/logout"><i class='fas fa-sign-out-alt' style='font-size:26px'></i></a></small></small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if( Auth::user()->role =='admin')
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('home')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.verifyUsers')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            Manage Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.mailbox')}}" class="nav-link">
                      <i class="nav-icon far fa-envelope"></i>
                      <p>
                        Mailbox
                      </p>
                    </a>
                </li>
                @endif
                @auth
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tableau utilisateur
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.birthdays.calendar')}}"  class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendrier
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile')}}"  class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contact')}}"  class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Listes des Membres
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.user')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/customsearch')}}"  class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Recherche
                        </p>
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
