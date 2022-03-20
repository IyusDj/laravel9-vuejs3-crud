<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    {{-- <img src="{{ asset('') }}" alt="CRUD" class="brand-image img-circle elevation-3"
        style="opacity: .8"> --}}
    <i class="fa-solid fa-globe ml-3"></i>
    <span class="brand-text font-weight-light">CRUD</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('img/Yuz_profile_2.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Yuz Dj</a>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
             <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Main Menu
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>Product</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <p>Logout</p>
            </a>
            </li>
        </ul>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
            </p>
        </a>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>