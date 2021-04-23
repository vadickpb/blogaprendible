<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item" >
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'menu-open' : '' }}">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                    Inicio
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Blog
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link">
                        <i class="far fa-eye nav-icon"></i>
                        <p>Ver todos los blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.posts.create') }}" class="nav-link">
                        <i class="fas fa-pen nav-icon"></i>
                        <p>Crear un post</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
