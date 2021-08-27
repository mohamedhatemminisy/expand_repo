<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-dark navbar-without-dd-arrow navbar-shadow hide" id="nav_expanded_nav" 
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="{{route('updateOrganization')}}">
            <span>{{trans('admin.setting')}}</span>
          </a>

        </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.dep_emp')}}</span></a>
          <ul class="dropdown-menu">
          
          <li data-menu="">
              <a class="dropdown-item" href="{{route('employee')}}" data-toggle="dropdown">{{trans('admin.emp')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('department')}}" data-toggle="dropdown">{{trans('admin.dep')}}</a>
            </li>
          </ul>
        </li>


        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.underway')}}</span></a>
          <ul class="dropdown-menu">

            <li data-menu="">
              <a class="dropdown-item" href="{{route('projects')}}" data-toggle="dropdown">{{trans('admin.projects')}}</a>
            </li>
          </ul>
        </li>


        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.offices_orginzatos')}}</span></a>
          <ul class="dropdown-menu">

            <li data-menu="">
              <a class="dropdown-item" href="{{route('enginering')}}" data-toggle="dropdown">{{trans('admin.enginering_offices')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('space')}}" data-toggle="dropdown">{{trans('admin.office_space')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('banks')}}" data-toggle="dropdown">{{trans('admin.banks')}}</a>
            </li>            <li data-menu="">
              <a class="dropdown-item" href="{{route('suppliers')}}" data-toggle="dropdown">{{trans('admin.suppliers')}}</a>
            </li>
            </li>           
           <li data-menu="">
              <a class="dropdown-item" href="{{route('orginzations')}}" data-toggle="dropdown">{{trans('admin.orginzations')}}</a>
            </li>
          </ul>
        </li>



        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.assets')}}</span></a>
          <ul class="dropdown-menu">

            <li data-menu="">
              <a class="dropdown-item" href="{{route('dev_equp')}}" data-toggle="dropdown">{{trans('admin.dev_equp')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('vehicles')}}" data-toggle="dropdown">{{trans('admin.vehicles')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('buildings')}}" data-toggle="dropdown">{{trans('admin.buildings')}}</a>
            </li>            <li data-menu="">
              <a class="dropdown-item" href="{{route('Gardens_lands')}}" data-toggle="dropdown">{{trans('admin.Gardens_lands')}}</a>
            </li>
            </li>           
           <li data-menu="">
              <a class="dropdown-item" href="{{route('warehouses')}}" data-toggle="dropdown">{{trans('admin.warehouses')}}</a>
            </li>
          </ul>
        </li>


        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="{{route('subscribers')}}">
            <span>{{trans('admin.subscribers')}}</span>
          </a>

        </li>

        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.archieve')}}</span></a>
          <ul class="dropdown-menu">

            <li data-menu="">
              <a class="dropdown-item" href="{{route('out_archieve')}}" data-toggle="dropdown">{{trans('archive.export_to')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('in_archieve')}}" data-toggle="dropdown">{{trans('archive.import_from')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('title_archieve')}}" data-toggle="dropdown">{{trans('archive.title')}}</a>
            </li>
          </ul>
        </li>


      </ul>
    </div>
  </div>
  