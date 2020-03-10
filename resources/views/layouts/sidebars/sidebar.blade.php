 <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li {{ request()->is('admin/dashboard') ? 'class=active' : '' }}>
          <a href="{{url('admin/dashboard')}}"><i class="fa fa-link"></i> 
            <span>Dashboard</span>
          </a>
        </li>
        <li {{ request()->is('admin/customers') ? 'class=active' : '' }}>
          <a href="{{ route('customers.index') }}"><i class="fa fa-link"></i> 
            <span>Clientes</span>
          </a>
        </li>
        <li class="treeview {{ request()->is('admin/products') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Almacen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li {{ request()->is('admin/products') ? 'class=active' : '' }}>
              <a href="{{route('products.index')}}">Productos</a>
            </li>
            <li {{ request()->is('admin/categories') ? 'class=active' : '' }}>
              <a href="{{ route('categories.index') }}">Categorias</a>
            </li>
            <li {{ request()->is('brands') ? 'class=active' : '' }}>
              <a href="{{url('/admin/brands')}}">Marcas</a>
            </li>
            <li>
              <a href="{{ route('attributes.index') }}">Atributos</a>
            </li>
            <li>
              <a href="{{ route('terms.index') }}">Terminos</a>
            </li>
          </ul>
        </li>
        <li {{ request()->is('admin/orders') ? 'class=active' : '' }}>
          <a href="{{route('orders.index')}}"><i class="fa fa-link"></i> 
            <span>Pedidos</span>
          </a>
        </li>
        <li {{ request()->is('admin/reports') ? 'class=active' : '' }}>
          <a href="{{url('admin/reports')}}"><i class="fa fa-link"></i> 
            <span>Reportes</span>
          </a>
        </li>
        <li {{ request()->is('admin/users') ? 'class=active' : '' }}>
          <a href="{{route('users.index')}}"><i class="fa fa-link"></i> 
            <span>Usuarios</span>
          </a>
        </li>

      </ul>
      <!-- /.sidebar-menu -->