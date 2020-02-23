
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
  <img src="{{asset('img/jlz.jpg')}}"  class="brand align-center" height="60">
      <span class="brand-text font-weight-light">
      &nbsp;  JLZ Development
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('plugin-img/user-rounded.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                          <a href="{{url('admin/home')}}"  class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                          </a>
                        </li>
        <li class="nav-item">
                              <a href="{{url('/profile')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                  Profile
                                </p>
                              </a>
                            </li>

                            <li class="nav-item">
                              <a href="{{url('/request')}}" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                  Requests
                                </p>
                              </a>
                            </li>
        </ul>
      </nav>
      <div class="text-center" style="margin-top: 3%;">
                           <button class="btn btn-outline-primary btn-sm ml-0" align="center" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</button>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                        </div>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
