<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center" style="height: 70px;">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" ><i class="fa fa-large font-large-1"></i></a></li>
        <li class="nav-item">
          <a class="apperOnMob " href="<?php //echo base_url()?>">
            <span >
              
              <i class="fa fa-home fixHome" style="font-size:32px; color:#000000"></i></span>
                          

          </a></li>
        <li class="nav-item">
          <a class="navbar-brand" style="padding: 0px;" href="">
            <img class="" alt="modern admin logo" src="{{asset('assets/images/logo/16232479351317.png')}}" style="height:64px !important;">
          </a>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container container center-layout">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a id="nav_hover" class="nav-link nav-menu-main hidden-xs" onclick="
            if($('.navbar-expand-sm').hasClass('hide')) 
              $('.navbar-expand-sm').removeClass('hide');
            else 
              $('.navbar-expand-sm').addClass('hide');
              setTimeout(function(){
              $('.horizontal-menu.menu-collapsed #main-menu-navigation .nav-item a span').show()
              },100)
  
            " ><i class="fa fa-bars" style="font-size: 1.6rem;"></i></a></li>
          <li class="dropdown nav-item mega-dropdown hideMob" style="padding-top: 15px;">
            <a  href="">
              
                <img src="{{asset('assets/images/ico/rep.png')}}" style="height: 32px;">
            </a>
          </li>
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">
                                <font class="hideMob">{{trans('admin.hello')}} ,</font>
                              <span class="user-name text-bold-700"> {{auth('admin') -> user() -> name}} </span>
                            </span>
              <span class="avatar avatar-online hideMob">
                
                  <img src="{{asset('assets/images/ico/16171327591279.jpg')}}" style="    max-height: 35px;" alt="avatar">
               
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item hide" href="#"><i class="ft-user"></i> تعديل الملف الشخصي</a>
            <a class="dropdown-item" href=""><i class="ft-mail"></i>صندوق الوارد
            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow"></span>
            </a>
            <a class="dropdown-item hide" href="#"><i class="ft-check-square"></i> المهام</a>
            <a
              class="dropdown-item hide" href="#"><i class="ft-message-square"></i> دردشة</a>
            <div class="dropdown-divider hide"></div><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ft-power"></i> {{trans('admin.logout')}}</a>
          </div>
          </li>
          <li class="dropdown dropdown-notification nav-item hideMob">
            <a class="nav-link nav-link-label" href=""><i class="ft-mail" style="font-size: 27px !important;margin-left: 14px;"></i>
              <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow"></span>
            </a>
          </li>
          
          <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">{{trans('admin.languages')}}<span class="selected-language"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">

                              <div class="dropdown-divider"></div>
                          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <a class="dropdown-item"  rel="alternate" hreflang="{{ $localeCode }}"
                                 href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}</a>
                                          @endforeach

              </div>
          </li>
          
        </ul>

        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round ac1" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>

          
        </ul>
      </div>
    </div>
  </div>
</nav>