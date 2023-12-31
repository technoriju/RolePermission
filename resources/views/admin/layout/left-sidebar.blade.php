<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('manage.dashboard')}}">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <div class="badge badge-danger">new</div>
        </a>
      </li>
      {{-- Role Permission --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-role" aria-expanded="false" aria-controls="ui-role">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">Role Permission</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-role">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('role.index')}}">Role</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Permission</a></li>
          </ul>
        </div>
      </li>
      {{-- End Role Permission --}}

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">User Section</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{route('user.index')}}">User Data</a></li>
          </ul>
        </div>
      </li>

      {{-- Template UI --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">Template UI</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/default')}}">Dashboard</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/charts')}}">Charts</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/documentation')}}">Documentation</a></li> --}}
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/form')}}">Form</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/icon')}}">Icon</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/table')}}">Table</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/button')}}">Button</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/dropdown')}}">Dropdown</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/typography')}}">Typography</a></li>
          </ul>
        </div>
      </li>
      {{-- End Template UI --}}

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="typcn typcn-chart-pie-outline menu-icon"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/charts/chartjs.html">ChartJs</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="typcn typcn-th-small-outline menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/tables/basic-table.html">Basic table</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="typcn typcn-compass menu-icon"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/icons/mdi.html">Mdi icons</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-user-add-outline menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/manage/template/dashbord')}}"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://bootstrapdash.com/demo/polluxui-free/docs/documentation.html">
          <i class="typcn typcn-mortar-board menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
