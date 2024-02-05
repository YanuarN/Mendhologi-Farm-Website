  <!-- Main Sidebar Container -->
  <!-- resources/views/layouts/sidebar.blade.php -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <span class="brand-text font-weight-light">Admin Mendhologi Farm</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
  
                <!-- kategori Hewan -->
                <li class="nav-item">
                  <a href="/admin" class="nav-link">
                      <i class="nav-icon fas fa-list"></i>
                      <p>Kategori Hewan</p>
                  </a>
              </li>
  
                <!-- Hewan -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>Hewan</p>
                    </a>
                </li>
  
                <!-- User -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
  
                <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fas fa-shopping-cart"></i>
                      <p>Pesanan</p>
                  </a>
              </li>
  
                <!-- Pendapatan -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Pendapatan</p>
                    </a>
                </li>
  
                <!-- Pengeluaran -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>