<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-dark navbar-without-dd-arrow navbar-shadow hide" id="nav_expanded_nav"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        @can('updateOrganization')
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="{{route('updateOrganization')}}">
            <span>{{trans('admin.setting')}}</span>
          </a>
        </li>
        @endcan

        <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="{{route('volunteer')}}">
              <span>{{trans('admin.volunteer')}}</span>
            </a>
          </li>

        @can('employeeDepartment')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.dep_emp')}}</span></a>
          <ul class="dropdown-menu">
          @can('employee')
          <li data-menu="">
              <a class="dropdown-item" href="{{route('employee')}}" data-toggle="dropdown">{{trans('admin.emp')}}</a>
            </li>
            @endcan
            @can('department')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('department')}}" data-toggle="dropdown">{{trans('admin.dep')}}</a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('projects')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
          {{trans('admin.projects')}}</span></a>
          <ul class="dropdown-menu">

            <li data-menu="">
              <a class="dropdown-item" href="{{route('projects')}}" data-toggle="dropdown">{{trans('admin.projects')}}</a>
            </li>
          </ul>
        </li>
        @endcan

        @can('offices_orginzatos')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.offices_orginzatos')}}</span></a>
          <ul class="dropdown-menu">
          @can('enginering')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('enginering')}}" data-toggle="dropdown">{{trans('admin.enginering_offices')}}</a>
            </li>
          @endcan
          @can('space')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('space')}}" data-toggle="dropdown">{{trans('admin.office_space')}}</a>
            </li>
            @endcan
          @can('banks')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('banks')}}" data-toggle="dropdown">{{trans('admin.banks')}}</a>
            </li>
            @endcan
          @can('suppliers')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('suppliers')}}" data-toggle="dropdown">{{trans('admin.suppliers')}}</a>
            </li>
            @endcan
          @can('orginzation')
            </li>
           <li data-menu="">
              <a class="dropdown-item" href="{{route('orginzation')}}" data-toggle="dropdown">{{trans('admin.orginzations')}}</a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan
        @can('subscribers')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
          {{trans('admin.subscribers')}}</span></a>
          <ul class="dropdown-menu">

            <li data-menu="">
              <a class="dropdown-item" href="{{route('subscribers')}}" data-toggle="dropdown">{{trans('admin.subscribers')}}</a>
            </li>
            <li data-menu="">
              <a class="dropdown-item" href="{{route('license')}}" data-toggle="dropdown">اضافة رخص بناء</a>
            </li>
          </ul>
        </li>
        @endcan
        @can('assets')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.assets')}}</span></a>
          <ul class="dropdown-menu">
          @can('dev_equp')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('dev_equp')}}" data-toggle="dropdown">{{trans('admin.dev_equp')}}</a>
            </li>
          @endcan
          @can('vehicles')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('vehicles')}}" data-toggle="dropdown">{{trans('admin.vehicles')}}</a>
            </li>
            @endcan
          @can('buildings')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('buildings')}}" data-toggle="dropdown">{{trans('admin.buildings')}}</a>
            </li>
            @endcan
          @can('Gardens_lands')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('Gardens_lands')}}" data-toggle="dropdown">{{trans('admin.Gardens_lands')}}</a>
            </li>
            @endcan
          @can('warehouses')
             <li data-menu="">
              <a class="dropdown-item" href="{{route('warehouses')}}" data-toggle="dropdown">{{trans('admin.warehouses')}}</a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan
        
        @can('archieve')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
        {{trans('admin.archieve')}}</span></a>
          <ul class="dropdown-menu">
          @can('out_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('out_archieve')}}" data-toggle="dropdown">{{trans('archive.out_archive')}}</a>
            </li>
          @endcan
          @can('in_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('in_archieve')}}" data-toggle="dropdown">{{trans('archive.in_archive')}}</a>
            </li>
            @endcan
          @can('mun_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('mun_archieve')}}" data-toggle="dropdown">{{trans('archive.mun_archive')}}</a>
            </li>
            @endcan
          @can('proj_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('proj_archieve')}}" data-toggle="dropdown">{{trans('archive.proj_archive')}}</a>
            </li>
            @endcan
            <li data-menu="">
                <a class="dropdown-item" href="{{route('assets_archieve')}}" data-toggle="dropdown">{{trans('archive.assets_archive')}}</a>
              </li>
          @can('emp_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('emp_archieve')}}" data-toggle="dropdown">{{trans('archive.emp_archive')}}</a>
            </li>
            @endcan
          @can('dep_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('dep_archieve')}}" data-toggle="dropdown">{{trans('archive.dep_archive')}}</a>
            </li>
            @endcan
          @can('cit_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('cit_archieve')}}" data-toggle="dropdown">{{trans('archive.cit_archive')}}</a>
            </li>
            @endcan
          @can('lic_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('lic_archieve')}}" data-toggle="dropdown">{{trans('archive.lic_archive')}}</a>
            </li>
            @endcan
          @can('licFile_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('licFile_archieve')}}" data-toggle="dropdown">{{trans('archive.licFile_archive')}}</a>
            </li>
            @endcan
          @can('jobLic_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('jobLic_archieve')}}" data-toggle="dropdown">{{trans('archive.jobLic_archive')}}</a>
            </li>
            @endcan
          @can('agenda_archieve')
            <li data-menu="">
              <a class="dropdown-item" href="{{route('agenda_archieve')}}" data-toggle="dropdown">{{trans('archive.agenda_archieve')}}</a>
            </li>
            @endcan
          </ul>
        </li>
      @endcan

      @can('reports')
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>
            {{trans('archive.reports')}}
              </span></a>
            <ul class="dropdown-menu">
            @can('report_archieve')
              <li data-menu="">
                <a class="dropdown-item" href="{{route('report_archieve')}}" data-toggle="dropdown">{{trans('archive.report_archive')}}</a>
              </li>
              @endcan
              @can('report_archieve')
              <li data-menu="">
                <a class="dropdown-item" href="{{route('volunteer_report')}}" data-toggle="dropdown">{{trans('archive.volunteer_report')}}</a>
              </li>
              @endcan
              @can('agenda_report')
              <li data-menu="">
                <a class="dropdown-item" href="{{route('agenda_report')}}" data-toggle="dropdown">{{trans('archive.agenda_report')}}</a>
              </li>
              @endcan
              <li data-menu="">
                <a class="dropdown-item" href="{{route('jobLicReport')}}" data-toggle="dropdown">{{trans('archive.jobLic_report')}}</a>
              </li>
            </ul>
        </li>
      @endcan
      </ul>
    </div>
  </div>
