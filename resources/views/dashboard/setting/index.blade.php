
@extends('layouts.admin')
@section('content')


<section class="horizontal-grid" id="horizontal-grid">
<form id="ajaxform">
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

                                           
<!-- 
                                            @foreach (config('translatable.locales') as $key => $locale)
 
                                                    <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.municipality_name_'.$locale)}}
                                                    </span>                                            

                                                    <input type="text" id="name_{{$locale}}" class="form-control"
                                                        placeholder="{{trans('admin.municipality_name')}}" 
                                                        name="name_{{$locale}}" value="{{$setting->name}}"><br>
                                                        </div><br>
                                                    </div><br>
                                            @endforeach -->


 
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

                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <!-- <img src="https://db.expand.ps/uploads/16232479351317.png" id="userProfileImg" style="width:100%;cursor:pointer;max-height: 150px;" onclick="document.getElementById('formDataimgPic').click(); return false"> -->
                                    <input type="file" id="userimgpath" name="userimgpath" value="">
                                </div>
                                <div class="col-lg-8 col-md-12 pr-0 pr-s-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pr-s-12 pr-0">
                                            <div class="form-group" style="    margin-right: 5px;">
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
                                            <div class="form-group" style="    margin-right: 7px; margin-left: -9px;">
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

                <div class="card">
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
            <div class="card rightSide" style="min-height:1183.75px">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                </div>
                <hr>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
 
                                            <select id="CityID" name="CityID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),8,'TownID')">
                                                <option disabled> -- {{trans('admin.city')}} --</option>     
                                                @foreach($city as $cit)
                                                 <option  value="{{$cit->id}}">  {{$cit->name}} </option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select id="area_data" name="TownID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),9,'AreaID')">
                                                <option disabled>   {{trans('admin.area')}} </option>
                                            </select>



                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <select id="region_data" name="AreaID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),10,'NeighborID')">
                                                    <option value="0" disabled>   {{trans('admin.region')}}  </option>                                                                         
                                                 </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link-alt" style="color:#ffffff"></i>
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

                        <div class="form-actions" style="border-top:0px;">
                            <div class="text-right">
                                <button class="btn btn-primary save-data">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>
                                <button type="reset" class="btn btn-warning"> {{trans('admin.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
    @stop
@section('script')
<script>
$(document).ready(function () {

    $(".save-data").click(function(event){
      event.preventDefault();

      let name_ar = $("input[name=name_ar]").val();
      let name_en = $("input[name=name_en]").val();
      let phone_one = $("input[name=phone_one]").val();
      let phone_two = $("input[name=phone_two]").val();
      let userimgpath = $("input[name=userimgpath]").val();
      let website = $("input[name=website]").val();
      let fax = $("input[name=fax]").val();
      let email = $("input[name=email]").val();
      let storage_path = $("input[name=storage_path]").val();
      let max_upload = $("input[name=max_upload]").val();
      let WorkinghoursFrom = $("input[name=WorkinghoursFrom]").val();
      let WorkinghoursTo = $("input[name=WorkinghoursTo]").val();
      let Holidays = $("input[name=Holidays]").val();
      let from1 = $("input[name=from1]").val();
      let to1 = $("input[name=to1]").val();
      let from2 = $("input[name=from2]").val();
      let to2 = $("input[name=to2]").val();
      let from3 = $("input[name=from3]").val();
      let to3 = $("input[name=to3]").val();
      let from4 = $("input[name=from4]").val();
      let to4 = $("input[name=to4]").val();
      let from5 = $("input[name=from5]").val();
      let to5 = $("input[name=to5]").val();
      let from6 = $("input[name=from6]").val();
      let to6 = $("input[name=to6]").val();      
      let from7 = $("input[name=from7]").val();
      let to7 = $("input[name=to7]").val();
      var CityID = $('#CityID').find(":selected").val();
      var area_data = $('#area_data').find(":selected").val();
      var region_data = $('#region_data').find(":selected").val();
      var AddressDetails = $('#AddressDetails').val();
      var Note = $('#Note').val();
      var _token ='{{csrf_token()}}';

      $.ajax({
        url: "store_settings",
        type:"POST",
        data:{
            name_ar:name_ar,
            name_en:name_en,
            phone_one:phone_one,
            phone_two:phone_two,
            logo:userimgpath,
            website:website,
            fax:fax,
            email:email,          
            storage_path:storage_path,
            max_upload:max_upload,
            WorkinghoursFrom:WorkinghoursFrom,
            WorkinghoursTo:WorkinghoursTo,
            Holidays:Holidays,
            from1:from1,
            to1:to1,
            from2:from2,            
            to2:to2,
            from3:from3,
            to3:to3,
            from4:from4,
            to4:to4,
            from5:from5,
            to5:to5,   
            from6:from6,
            to6:to6,
            from7:from7,
            CityID:CityID, 
            area_data:area_data,            
            region_data:region_data,            
            AddressDetails:AddressDetails,            
            Note:Note,                       
            _token: _token ,       
         },

        success:function(response){
            $('#phone_one').val(blaresponse.phone_one);
            $('#phone_two').val(blaresponse.phone_two);
            $('#website').val(blaresponse.website);
            $('#fax').val(blaresponse.fax);
            $('#email').val(blaresponse.email);
            $('#storage_path').val(blaresponse.storage_path);
            $('#WorkinghoursFrom').val(blaresponse.WorkinghoursFrom);
            $('#WorkinghoursTo').val(blaresponse.WorkinghoursTo);
            $('#Holidays').val(blaresponse.Holidays);
            $('#max_upload').val(blaresponse.max_upload);
            $('#from1').val(blaresponse.from1);
            $('#to1').val(blaresponse.to1);
            $('#from2').val(blaresponse.from2);
            $('#to2').val(blaresponse.to2);            
            $('#from3').val(blaresponse.from3);
            $('#to3').val(blaresponse.to3);            
            $('#from4').val(blaresponse.from4);
            $('#to4').val(blaresponse.to4);            
            $('#from5').val(blaresponse.from5);
            $('#to5').val(blaresponse.to5);            
            $('#from6').val(blaresponse.from6);
            $('#to6').val(blaresponse.to6);            
            $('#from7').val(blaresponse.from7);
            $('#to7').val(blaresponse.to7);
            $('#AddressDetails').val(blaresponse.AddressDetails);
            $('#Note').val(blaresponse.Note);
            $('#name_ar').val(blaresponse.name_ar);
            $('#name_en').val(blaresponse.name_en);

            

        },
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

});
</script>
@endsection