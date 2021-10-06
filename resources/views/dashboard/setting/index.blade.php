<style>
    .detailsTB th{
        color:#ffffff;
    }
      .detailsTB th,.detailsTB td{
        text-align:right !important;
        
    }
    .recList>tr>td{
        font-size:12px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding-bottom: 5px !important;
}
.dataTables_filter{
    margin-top:-15px;
}
.even{
    background-color:#D7EDF9 !important;
}
.dt-buttons
{
    text-align: left;
    display: inline;
    float: left;
    position: relative;
    bottom: 10px;
    margin-right: 10px;
}

</style>
@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
<section class="horizontal-grid" id="horizontal-grid">

<form method="post" id="setting_form" enctype="multipart/form-data">

    @csrf  
    <div class="row white-row">
        <div class="col-sm-12 col-lg-6 col-md-12">
            <div class="card leftSide">
                <div class="card-header">
                    <h4 class="card-title"><img src="{{asset('assets/images/ico/info.png')}}" width="32" height="32">
                    {{trans('admin.setting')}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body" style="padding-bottom: 0px;">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <div class="form-group" style="margin-left: -15px;">
                                            <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.municipality_name_ar')}}
                                                        </span>                                            
                                                    </div>
                                                    <input type="text" id="name_ar" class="form-control"
                                                        placeholder="{{trans('admin.municipality_name_ar')}}" 
                                                        name="name_ar" value="{{$setting->name_ar}}">
                                                        </div>
                                            </div>

                                        <div class="form-group" style="margin-left: -15px;">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.municipality_name_en')}}
                                                    </span>                                            
                                                </div>
                                                <input type="text" id="name_en" class="form-control"
                                                    placeholder="{{trans('admin.municipality_name_en')}}" 
                                                    name="name_en" value="{{$setting->name_en}}">
                                                    </div>
                                        </div>


                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pr-s-12 pr-0">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text1" id="basic-addon1">
                                                    <img src="https://db.expand.ps/images/call-pinar35.png">
                                                    </span>
                                                    </div>
                                                    <input type="text" id="phone_one" name="phone_one" class="form-control noleft" maxlength="9" placeholder="090000000" aria-describedby="basic-addon1"
                                                     value="{{$setting->phone_one}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group" style="margin-right: -8px;">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                                        <img src="https://db.expand.ps/images/call-pinar35.png">
                                                        </span>
                                                    </div>
                                                    <input type="text" id="phone_two" name="phone_two" class="form-control noleft" maxlength="9" placeholder="090000000" aria-describedby="basic-addon1" 
                                                    value="{{$setting->phone_two}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4" style="text-align: center;">
                                                <img id="userProfileImg" src="{{$setting->logo}}" style="height: 50px; cursor:pointer" onclick="document.getElementById('imgPic').click(); return false">
                                                <input type="file" class="form-control-file" id="imgPic" name="imgPic" style="display: none" onchange="doUploadPic()" aria-invalid="false">
                                                <input type="hidden" id="userimgpath" name="userimgpath">
                                                <meta name="csrf-token" content="{{ csrf_token() }}" />

                                            </div>

                                <div class="col-lg-8 col-md-12 pr-0 pr-s-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pr-s-12 pr-0">
                                            <div class="form-group" >
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text1" id="basic-addon1">
                                                    <img src="https://db.expand.ps/images/www35.png" style="max-width: 35px;">
                                                    </span>
                                                    </div>
                                                    <input type="text" id="website" name="website" class="form-control noleft" placeholder="wwww.example.com" value="{{$setting->website}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group" style="    margin-right: -8px;" >
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                                    <img src="https://db.expand.ps/images/fax35.png" style="max-width: 35px;">
                                                    </span>
                                                    </div>
                                                    <input type="text" id="fax" name="fax" class="form-control noleft" maxlength="9" placeholder="090000000" aria-describedby="basic-addon1" value="{{$setting->fax}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group" style="width: 104%;">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text input-group-text1" id="basic-addon1">
                                                <img src="https://db.expand.ps/images/mailico35.jpg" style="max-width: 35px;">
                                                </span>
                                            </div>
                                            <input type="text" id="email" name="email" class="form-control noleft" placeholder="Example@domain.com" value="{{$setting->email}}">
                                        </div>
                                    </div>
            

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-header" style="padding-top:0px;">
                    <h4 class="card-title">
                        <img src="{{ asset('assets/images/ico/msg.png') }}" width="32" height="32"> 
                    الأرشيف
                    </h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body" style="padding-bottom: 0px;">
                        <div class="row" style="text-align: center">
                            <div class="col-md-2 w-s-50" style="padding: 0px;">
                                <div class="form-group">
                                    <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#CertModal').modal('show')" style="cursor:pointer">
                                    <div class="form-group">
                                        <a onclick="$('#CertModal').modal('show')" style="color:#000000">{{trans('assets.archive')}}
                                        <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header" style="padding-top:0px;">
                    <h4 class="card-title">
                        {{trans('admin.storage')}}
                    </h4>                    
                </div>

                <div class="card-content collapse show">
                    <div class="card-body" style="padding-bottom: 0px;">
                    
                        <div class="row">
                            <div class="col-lg-6 col-md-12 pr-s-12 pr-0">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                            {{trans('admin.storage_path')}}
                                            </span>
                                        </div>
                                        <input type="text" id="storage_path" name="storage_path" class="form-control" maxlength="9"
                                         placeholder="/home4/weexpand/public_html/db.expand" aria-describedby="basic-addon1" value="{{$setting->website}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group" style="margin-right: -8px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                            {{trans('admin.storage_space')}}

                                        </span>
                                        </div>
                                        <input type="number" id="max_upload" name="max_upload" class="form-control" maxlength="9" placeholder="20MB" 
                                        aria-describedby="basic-addon1" value="{{$setting->max_upload}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="card hide">
                    <div class="card-header">
                        <h4 class="card-title"><img src="https://db.expand.ps/images/workHrs.png" width="32" height="32">
                        {{trans('admin.working_details')}}

                        </h4>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body" style="padding-bottom: 0px;">
                            <div class="form-body">
                                <div class="row ">
                                    <div class="col-lg-7 col-md-12 pr-0 pr-s-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">

                                                {{trans('admin.working_hours')}}
                                                </span>
                                                </div>
                                                <input type="text" id="WorkinghoursFrom" value="{{$setting->WorkinghoursFrom}}" class="form-control" placeholder="From: --:--" name="WorkinghoursFrom" aria-invalid="false" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;">

                                                <input type="text" id="WorkinghoursTo" value="{{$setting->WorkinghoursTo}}" class="form-control" placeholder="To: --:--" name="WorkinghoursTo" aria-invalid="false">


                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-5 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    {{trans('admin.Holidays')}}
                                                    </span>
                                                </div>
                                                <input type="text" id="Holidays" class="form-control" placeholder="{{trans('admin.Holidays')}}"
                                                 name="Holidays" value="{{$setting->Holidays}}">
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-icon-right alert-warning alert-dismissible mb-2" 
                                        role="alert"
                                        style="position: static;margin-right: 0px;margin-left: 0px;width: 100%;border-right-width: 0px;z-index: 1;">
                            
                                            <strong>ملاحظة !</strong> الحضور من  <a class="alert-link">08:00 صباحا</a> حتى <a class="alert-link">02:00 ظهرا </a> عدا يوم الخميس <a class="alert-link">01:00 ظهرا </a>.<br> إظغط <a class="alert-link" onclick="$('#timeTable').toggle()"> هنا </a> لتغيير الإعدادات
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="timeTable" style="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <table style="width:100%" class="detailsTB table">
                                                <tbody><tr>
                                                    <th class="gray-bg" scope="col">{{trans('admin.day')}}</th>
                                                    <th class="gray-bg" scope="col">{{trans('admin.from')}}</th>
                                                    <th class="gray-bg" scope="col">{{trans('admin.to')}}</th>
                                                    <th class="gray-bg" scope="col">{{trans('admin.weekend')}} </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    {{trans('admin.saturday')}}
                                                    </td>
                                                        <td>
                                                            <input type="text" id="from1" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="from1" aria-invalid="false"  value="{{$setting->from1}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="to1" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="to1" aria-invalid="false" value="{{$setting->to1}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="customCheck1" id="customCheck1" onclick="ShowHideDays(1)" value="1">
                                                                <label class="custom-control-label" for="customCheck1"> {{trans('admin.weekend')}}</label>
                                                            </div>
                                                        </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                    {{trans('admin.sunday')}}
                                                    </td>
                                                        <td>
                                                            <input type="text" id="from2" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="from2" aria-invalid="false"  value="{{$setting->from3}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="to2" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="to2" aria-invalid="false" value="{{$setting->to2}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="customCheck2" id="customCheck2" onclick="ShowHideDays(2)" value="2">
                                                                <label class="custom-control-label" for="customCheck2"> {{trans('admin.weekend')}}</label>
                                                            </div>
                                                        </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                    {{trans('admin.monday')}}
                                                    </td>
                                                        <td>
                                                            <input type="text" id="from3" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="from3" aria-invalid="false"  value="{{$setting->from3}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="to3" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="to3" aria-invalid="false" value="{{$setting->to3}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="customCheck3" id="customCheck3" onclick="ShowHideDays(3)" value="3">
                                                                <label class="custom-control-label" for="customCheck3"> {{trans('admin.weekend')}}</label>
                                                            </div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    {{trans('admin.tuesday')}}
                                                    </td>
                                                        <td>
                                                            <input type="text" id="from4" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="from4" aria-invalid="false"  value="{{$setting->from4}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="to4" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="to4" aria-invalid="false" value="{{$setting->to4}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="customCheck1" id="customCheck4" onclick="ShowHideDays(4)" value="4">
                                                                <label class="custom-control-label" for="customCheck4"> {{trans('admin.weekend')}}</label>
                                                            </div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    {{trans('admin.wednesday')}}
                                                    </td>
                                                        <td>
                                                            <input type="text" id="from5" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="from5" aria-invalid="false"  value="{{$setting->from5}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="to5" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="to5" aria-invalid="false" value="{{$setting->to5}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="customCheck5" id="customCheck5" onclick="ShowHideDays()" value="5">
                                                                <label class="custom-control-label" for="customCheck5"> {{trans('admin.weekend')}}</label>
                                                            </div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    {{trans('admin.thursday')}}
                                                    </td>
                                                        <td>
                                                            <input type="text" id="from6" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="from6" aria-invalid="false"  value="{{$setting->from6}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="to6" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="to6" aria-invalid="false" value="{{$setting->to6}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="customCheck6" id="customCheck6" onclick="ShowHideDays(6)" value="6">
                                                                <label class="custom-control-label" for="customCheck6"> {{trans('admin.weekend')}}</label>
                                                            </div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    {{trans('admin.friday')}}
                                                    </td>
                                                        <td>
                                                            <input type="text" id="from7" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="from7" aria-invalid="false"  value="{{$setting->from7}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="to7" class="form-control simple-field-data-mask" data-mask="00:00" placeholder="07:30" name="to7" aria-invalid="false" value="{{$setting->to7}}" autocomplete="off" maxlength="5">
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="customCheck7" id="customCheck7" onclick="ShowHideDays(7)" value="7">
                                                                <label class="custom-control-label" for="customCheck7"> {{trans('admin.weekend')}}</label>
                                                            </div>
                                                        </td>
                                                </tr>

                                            </tbody></table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-lg-6 col-md-12">
            <div class="card rightSide" style="min-height: 1035.75px;">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">

                    

                    <div class="row">
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">
            <div class="form-group col-10" style="padding-left:0px;">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        {{trans('admin.city')}}
                    </span>
                </div>  
                <select id="CityID" name="CityID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),8,'TownID')">
                    <option> -- {{trans('admin.city')}} --</option>     
                    @foreach($city as $cit)
                    <option value="{{$cit->id}}" @if($cit->id == $setting->address->city->id) selected @endif>
                                                    {{$cit->name}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(10,'CityID','City')" 
            style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">
            <div class="form-group col-10" style="padding-left:0px;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            {{trans('admin.state')}}
                        </span>
                    </div>  
                <select id="area_data" name="TownID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),9,'AreaID')">
                @foreach($area as $are)
                    @if($setting->address->area_id != null)
                        <option value="{{$are->id}}" @if($are->id == $setting->address->area->id) selected @endif>
                                                        {{$are->name}}</option>
                    @endif
                @endforeach  
                
                <option value=""> -- {{trans('admin.state')}} -- </option>
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(33,$('#CityID').find(':selected').val(),'Area')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">  
            <div class="form-group col-10" style="padding-left:0px;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            {{trans('admin.area')}}
                        </span>
                    </div>  
                    <select id="region_data" name="AreaID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),10,'NeighborID')">
                    @foreach($region as $reg)
                    @if($setting->address->region_id != null)
                    <option value="{{$reg->id}}" {{ $reg->id == $setting->address->region->id ? 'selected':'' }} >
                     {{$reg->name}}</option>
                    @endif
                    @endforeach  
                    <option value=""> -- {{trans('admin.area')}} --  </option>                                                                         
                        </select>
                    
                </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(77,$('#area_data').find(':selected').val(),'Resion')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="width: 98% !important;">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    {{trans('admin.address_details')}}
                    </span>
                </div>
                <textarea type="text" id="AddressDetails" class="form-control" 
                placeholder="{{trans('admin.address_details')}}" name="AddressDetails"
                    style="height: 40px;">{{$address->details}}</textarea>
                <div class="input-group-append hidden-xs hidden-sm">
                <span class="input-group-text input-group-text2" style="color:#ffffff">
                <i class="fa fa-external-link-alt"></i>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="input-group" style="width: 98% !important;">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                        {{trans('admin.notes')}}
                        </span>
                </div>
                <textarea type="text" id="Note" class="form-control"
                    placeholder="{{trans('admin.notes')}}" name="Note" 
                    style="height: 40px;">{{$address->notes}}</textarea>
                <div class="input-group-append hidden-xs hidden-sm">
                    <span class="input-group-text input-group-text2" style="color:#ffffff">
                    <i class="fa fa-external-link-alt"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

                       				



                        <div class="form-actions" style="border-top:0px; padding-bottom:44px;">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="saveBtn">{{trans('admin.save')}}  <i class="ft-thumbs-up position-right"></i></button>
                                <button type="reset" onclick="redirectURL('linkIcon1-tab1')" class="btn btn-warning"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php  $type="orgnization";  ?>
@include('dashboard.component.archive_table');
</section>
@section('script')
<script>
$(document).ready(function () {




    $('#setting_form').submit(function(e) {
        $(".loader").removeClass('hide');

       e.preventDefault();
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: "store_settings",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $('.wtbl').DataTable().ajax.reload();  
             if (response) {
                $(".loader").addClass('hide');
			Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})

               this.reset();
             }
             location.reload();

           },
           error: function(response){
            $(".loader").addClass('hide');

			Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: '{{trans('admin.error_save')}}',
				showConfirmButton: false,
				timer: 1500
				})
           }
       });
  });
    $("#CityID").change(function () {
        $("#area_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "state",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var state_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#area_data").append(state_details);
            }
         },
        });
    });


    $("#area_data").change(function () {
        $("#region_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "area",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var region_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#region_data").append(region_details);
            }
         },
        });
    });
    
    $( function() {
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "Organization_info",
            success:function(response){
                $("#msgStatic").html(response.ArchiveCount);
                drawTablesArchive(response.Archive,[]);
                },
			});

        
    });


});
   
</script>
@endsection
@endsection
