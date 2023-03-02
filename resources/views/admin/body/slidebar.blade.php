 <!-- Sidebar -->
 <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="" class="" alt="User Image">
    </div>
    <div class="info">
        <span class="role">{{ Auth::user()->name }}</span>
        <span class="role">{{ Auth::user()->roles }}</span>
    </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
        </button>
        </div>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item ">
        <a href="{{route('tiket')}}" class="nav-link active">
            <i class="nav-icon fas fa-copy"></i>
            <p>
            Tiket
            {{-- <i class="right fas fa-angle-left"></i> --}}
            </p>
        </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('pesanan')}}" class="nav-link active">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                Orders
                {{-- <i class="right fas fa-angle-left"></i> --}}
                </p>
            </a>
            </li>
        
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->