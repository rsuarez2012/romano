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
        <li {{ request()->is('/admin/dashboard') ? 'class=active' : '' }}><a href="{{url('/admin/dashboard')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li {{ request()->is('complexes') ? 'class=active' : '' }}><a href="{{url('complexes')}}"><i class="fa fa-link"></i> <span>Complejos Residenciales</span></a></li>
        <li {{ request()->is('/') ? 'active' : '' }}>
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>

        <li {{ request()->is('usuarios') ? 'class=active' : '' }}><a href="{{url('admin/usuarios')}}"><i class="fa fa-link"></i> <span>Ususarios</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->