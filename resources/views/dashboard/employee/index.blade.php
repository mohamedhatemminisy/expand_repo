@extends('layouts.admin')
@section('content')

<link rel="stylesheet" type="text/css" href="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css"/>

<script src="https://db.expand.ps/assets/jquery.min.js" type="text/javascript"></script>

<section class="horizontal-grid " id="horizontal-grid">

    <form id="ajaxform">
        
                <div class="row white-row">
                    
                    <div class="col-sm-12 col-md-6">
                        <div class="card leftSide">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                                    {{trans('admin.emp_info')}}
                                     </h4>
                                <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">
                                {{trans('admin.status')}}  
                                </div>
                                <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
                                        <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">
                                    </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body" style="padding-bottom: 0px;">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="input-group" style="width: 98% !important;">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.emp_name')}}
                                                                    </span>
                                                                </div>
                                                                <input type="text" id="Name" 
                                                                class="form-control alphaFeild ac ui-autocomplete-input"
                                                                 placeholder="{{trans('admin.emp_name')}}" name="Name" autocomplete="off">
                                                                 </div>
                                                                 <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>
                                                                </div>

                                                        
                                                    </div>
                                                </div>
                                                <input type="hidden" name="employee_id" id="employee_id" >
                                                <div class="row" style="position: relative;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.emp_id')}}
                                                                    </span>
                                                                </div>
                                                                <input type="text" id="NationalID" maxlength="9" class="form-control numFeild" 
                                                                placeholder="{{trans('admin.emp_id')}}" name="NationalID" onblur="$('#password').val($(this).val())">
                                                                <input type="hidden" id="emp_id" name="emp_id" value="0">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="padding-right: 0px !important;">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">
                                                                    {{trans('admin.job_num')}}
                                                                    </span>
                                                                </div>
                                                                <input type="text" id="JobNumber" class="form-control" 
                                                                placeholder="{{trans('admin.job_num')}}" name="JobNumber">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="text-align: center;">
                                                <img id="userProfileImg" src="https://db.expand.ps/images/user.png" style="max-height: 100px; cursor:pointer" onclick="document.getElementById('imgPic').click(); return false">
                                                <input type="file" class="form-control-file" id="imgPic" name="imgPic" style="display: none" onchange="doUploadPic()" aria-invalid="false">
                                                <input type="hidden" id="userimgpath" name="userimgpath">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                <img src="https://db.expand.ps/images/jawwal35.png">
                                                            </span>
                                                        </div>
                                                        <input type="text" id="MobileNo1" maxlength="10" name="MobileNo1" class="form-control noleft numFeild" placeholder="0590000000" aria-describedby="basic-addon1" onblur="$('#username').val($(this).val())">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="padding-right: 0px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                <img src="https://db.expand.ps/images/w35.png">
                                                            </span>
                                                        </div>
                                                        <input type="text" id="MobileNo2" maxlength="10" name="MobileNo2" class="form-control noleft numFeild" placeholder="0560000000" aria-describedby="basic-addon1" onblur="$('#username').val().length>0?'':$('#username').val($(this).val())">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="padding-right: 0px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" title="NickName" id="basic-addon1">
                                                            {{trans('admin.nick_name')}}
                                                            </span>
                                                        </div>
                                                        <input type="text" id="NickName" name="NickName" class="form-control alphaFeild" placeholder="{{trans('admin.nick_name')}}" aria-describedby="basic-addon1">
														<div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt"></i>
                                                        </span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.Internal_Phone')}}                                                            </span>
                                                        </div>
                                                        <input type="text" id="InternalPhone" name="InternalPhone" class="form-control numFeild" placeholder="Ex. 123">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8" style="padding-right: 0px;">
                                                <div class="form-group">
                                                    <div class="input-group" style="width: 98% !important;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.email')}} 
                                                            </span>
                                                        </div>
                                                        <input type="email" id="EmailAddress" name="EmailAddress" class="form-control" placeholder="user@domian.com" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))"><div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="EnabledItem" style="padding:5px; direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>

                                    </div>
                                </div>
                            </div>

                          
                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title"><img src="https://db.expand.ps/images/workHrs.png" width="32" height="32"> 
                                {{trans('admin.working_info')}} 
                            </h4>

                                <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>

                                <div class="heading-elements" style="display: none">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.depat')}}                                                             </span>
                                                    </div>
                                                    <select type="text" id="DepartmentID" name="DepartmentID" class="form-control" onchange="getDeptInfo($(this).val(),DirectManager)">
                                                        <option> اختر </option>
                                                        <option value="0">  {{trans('admin.without')}} </option>

                                                        @foreach($departments as $department)
                                                        <option value="{{$department->id}}">  {{$department->name}} </option>
                                                        @endforeach

                                              
                                                    </select>
                                                    <div class="input-group-append hide">
                                                        <span class="input-group-text input-group-text2">
                                                            <a href="https://db.expand.ps/addDepartment" target="_blank"> 
															<i class="fa fa-external-link-alt"></i>
															</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.job_title')}}                                                              </span>
                                                    </div>
                                                    <select type="text" id="Position" name="Position" class="form-control" placeholder="internal phone">
                                                        <option> اختر </option>
                                                        <option value="0">  {{trans('admin.without')}} </option>
                                                        @foreach($jobTitle as $title)
                                                        <option value="{{$title->id}}">  {{$title->name}}  </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(17,'PositionID','Position')">
                                                    <span class="input-group-text input-group-text2">
                                                        <i class="fa fa-external-link"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.Task_Checker')}}
                                                            </span>
                                                    </div>
                                                    <select type="text" id="DirectManager" name="DirectManager" class="form-control" placeholder="internal phone">
                                                        <option>  {{trans('admin.Task_Checker')}} </option>
                                                        <option value="0">  {{trans('admin.without')}} </option>
                                                        @foreach($admin as $adm)
                                                        <option value="{{$adm->id}}"> {{$adm->name}}  </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.start_date')}}
                                                        </span>
                                                    </div>
                                                    <input id="HiringDate" type="date" name="HiringDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" placeholder="dd/mm/yyyy" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.JobType')}}
                                                        </span>
                                                    </div>
                                                    <select id="JobType" name="JobType" type="text" class="form-control">
                                                        <option> اختر </option>
                                                        @foreach($jobType as $type)
                                                        <option value="{{$type->id}}"> {{$type->name}} </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(6,'PositionID','Position')">
                                                    <span class="input-group-text input-group-text2">
                                                        <i class="fa fa-external-link"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 0px;padding-left: 0px;">
                                            <div class="form-group">
                                                
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.Salary')}}
                                                            </span>
                                                            </div>
                                                            <input id="Salary" name="Salary" class="form-control numFeild " placeholder="00.00" style="    border-radius: 0rem !important;width: 30%;height: 33px !important;">
                                                            <select id="CurrencyID" name="CurrencyID" type="text" class="form-control" style="width: 85px;margin-left: 6%;height: 33px !important;">
                                                                <option> - </option>
                                                                <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>
                                                                <option value="dollar"> {{trans('admin.dollar')}} </option>
                                                                <option value="dinar">{{trans('admin.dinar')}}  </option>
                                                                <option value="euro">{{trans('admin.euro')}}  </option>
                                                            </select>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title"><img src="https://db.expand.ps/images/workHrs.png" width="32" height="32"> 
                                {{trans('admin.Holiday_info')}}
                                 </h4>

                                <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>

                                <div class="heading-elements" style="display: none">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.year')}}
                                                        </span>
                                                    </div>
                                                    <input id="vac_year" name="vac_year" maxlength="4" class="form-control valid" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.vac_annual')}}
                                                           
                                                        </span>
                                                    </div>
                                                    <input id="vac_annual" name="vac_annual" maxlength="2" class="form-control valid" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.emr_blanace')}}
                                                           
                                                        </span>
                                                    </div>
                                                    <input id="emr_blanace" name="emr_blanace" maxlength="2" class="form-control valid" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card-header" style="padding-top:0px;">
                                <h4 class="card-title"><i class="fa fa-key"></i> 
                                {{trans('admin.user_info')}}
                                </h4>
                                <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>
                                <div class="heading-elements" style="display: none">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" name="customCheck" id="customCheck2" onclick="$('#userlogin').toggle()">
                                                    <label class="custom-control-label" for="customCheck2"> 
                                                    {{trans('admin.has_account')}}

                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.permissions')}}

                                                            </span>
                                                    </div>
                                                    <select id="userGroup" name="userGroup" type="text" class="form-control" multiple>
                                                        @foreach (config('global.permissions') as $name => $value)
                                                         <option value="{{$value}}"> {{$value}} </option>
                                                        @endforeach

                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row" id="userlogin">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.user_name')}}
                                                            </span>
                                                        </div>
														<input id="username" name="username" class="form-control" placeholder="{{trans('admin.user_name')}}">
														<div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.password')}}
                                                            </span>
                                                        </div>
														<input id="password" name="password" class="form-control" placeholder="{{trans('admin.password')}}" value="">
														<div class="input-group-append">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link-alt" style="color: #ffffff"></i>
                                                        </span>
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
            <div class="card rightSide" style="min-height:500.75px">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                </div>
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
                                         style="height: 40px;"></textarea>
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
                                         style="height: 40px;"></textarea>
                                        <div class="input-group-append hidden-xs hidden-sm">
                                            <span class="input-group-text input-group-text2" style="color:#ffffff">
                                            <i class="fa fa-external-link-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       						
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title" style="padding-bottom: 10px !important;padding-top: 5px;">			
										<i class="fa fa-key" style="color:#4267B2"></i> &nbsp;قائمة الصلاحيات									</h4>
									<a class="heading-elements-toggle">
									    <i class="ft-align-justify font-medium-3">
									        
									    </i>
									</a>
									<div class="heading-elements">
										<a href="https://db.expand.ps/PerGroup" style="color:#4267B2;padding-top: 5px;font-size:25px !important;" title="عودة للصلاحيات">
										    <i class="fa fa-arrow-alt-circle-left"></i>
										</a>
									</div>
								</div>
								<div class="card-content collapse show" >
									<div class="card-body" style="padding-bottom: 0px;">
										<div class="form-body">

											<div class="row">
												<div class="col-md-12" >
												<div class="form-group">
													<input type="hidden" id="pk_i_id" name="pk_i_id" value="1" />
														<select multiple="multiple" class="multi-select" id="my_multi_select3" name="my_multi_select3[]">
															<optgroup label="نظام الصلاحيات"></optgroup>
																<option value='117'selected>نقل ذمة مالية/كهرباء</option>
																<option value='152'selected>تقرير الحرف و الصناعات	</option>
														</select>								
													</div>
												</div>
											</div>
										</div>
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
function SavePer(){
    var formData = new FormData($("#formData")[0]);
				$.ajax({
					url: realPath+'UpdateGroupFunction',
					type: 'POST',
					data: formData,
					dataType:"json",
					async: false,
					success: function (data) {
						if(data.status.success){	
							$(".alert-danger").hide();
							$(".alert-success").show();
							$("#succMsg").text(data.status.msg)
							//self.location=document.URL;
						}
						else {
							$(".alert-success").hide();
							$(".alert-danger").show();
							$("#errMsg").text(data.status.msg)
						}
						$(".loader").addClass('hide');
					},
					error:function(){
						$(".alert-success").hide();
						$(".alert-danger").show();
						$("#errMsg").text(data.status.msg)
						$(".loader").addClass('hide');
					},
					cache: false,
					contentType: false,
					processData: false
				});
}
    $(document).ready(function (){
        $('#my_multi_select2').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>موظفون خارج المجموعة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>موظفون داخل المجموعة </b></div>"
      });
    })
    
    
    $(document).ready(function (){
        $('#my_multi_select3').multiSelect({
              selectableHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات المحجوبة</b></div>",
  selectionHeader: "<div class='custom-header' style='color:#4267B2'><b>الصلاحيات الممنوحة</b></div>"
      });
    })
</script>



<script src="https://template.expand.ps/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>


  <script src="https://template.expand.ps/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js"
  type="text/javascript"></script>
  <script src="https://template.expand.ps/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <script src="https://template.expand.ps/app-assets/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
  <script src="https://template.expand.ps/app-assets/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
<!-- BEGIN (NEW) PAGE VENDOR JS-->
<script type="text/javascript" src="https://template.expand.ps/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<!-- END (NEW) PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="https://template.expand.ps/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="https://template.expand.ps/app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="https://template.expand.ps/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<script src="https://template.expand.ps/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
	<script src="https://db.expand.ps/assets/js/generalScript.js"  type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://template.expand.ps/app-assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
	<script src="https://template.expand.ps/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>

<script>
$( function() {
    $( ".ac" ).autocomplete({
		source: 'emp_auto_complete',
		minLength: 2,
		
        select: function( event, ui ) {
            let emp_id = ui.item.id
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "emp_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
            $('#employee_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#JobNumber').val(response.info.job_Number);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#NickName').val(response.info.nick_name);
            $('#InternalPhone').val(response.info.InternalPhone);
            $('#EmailAddress').val(response.info.email);
            $("#DepartmentID").val(response.info.department_id);
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.job_title); 
            });
            $("select#JobType option")
                 .each(function() { this.selected = (this.text == response.job_type); 
            });

            $("select#DirectManager option")
                 .each(function() { this.selected = (this.text == response.DirectManager); 
            });
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.department_id); 
            });
            $("select#CurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency); 
            });
            $('#HiringDate').val(response.info.start_date);
            $('#Salary').val(response.info.salary);
            $('#vac_year').val(response.details.year);
            $('#vac_annual').val(response.details.balance);
            $('#emr_blanace').val(response.details.emergency);
            $('#username').val(response.info.username);
            $('#AddressDetails').val(response.address.details);
            $('#Note').val(response.address.notes);
            $("select#CityID option")
                 .each(function() { this.selected = (this.text == response.city); 
            });
            $("select#TownID option")
                 .each(function() { this.selected = (this.text == response.area); 
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.text == response.region); 
            });
                    },
                    });
        }
	});
} );

/*
$(".ui-autocomplete-input").keyup(function () {
            if ($(this).val().length >= 1) {
                // auto complete with Ajax Function :-
                var url = 'emp_auto_complete';
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        employee: $(this).val()
                    },
                    success: function (barcodes) {
                        $('.divKayUP').html(barcodes);
                        $(".divKayUP").css("display", "block");
                    }
                });
            } else {
                $(".ui-autocomplete").css("display", "none");
            }
        });
        $(document).on('click', '.select_name', function () {
            $("#barcode").val('');
            $(".divKayUP").css("display", "none");
            // get product details :-
            let emp_id = $(this).data("id");
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "emp_info",
            data: {
                emp_id: emp_id,
            },
            success:function(response){
            $('#employee_id').val(response.info.id);
            $('#Name').val(response.info.name);
            $('#NationalID').val(response.info.identification);
            $('#JobNumber').val(response.info.job_Number);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#NickName').val(response.info.nick_name);
            $('#InternalPhone').val(response.info.InternalPhone);
            $('#EmailAddress').val(response.info.email);
            $("#DepartmentID").val(response.info.department_id);
            $("select#Position option")
                 .each(function() { this.selected = (this.text == response.job_title); 
            });
            $("select#JobType option")
                 .each(function() { this.selected = (this.text == response.job_type); 
            });

            $("select#DirectManager option")
                 .each(function() { this.selected = (this.text == response.DirectManager); 
            });
            $("select#DepartmentID option")
                 .each(function() { this.selected = (this.text == response.department_id); 
            });
            $("select#CurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency); 
            });
            $('#HiringDate').val(response.info.start_date);
            $('#Salary').val(response.info.salary);
            $('#vac_year').val(response.details.year);
            $('#vac_annual').val(response.details.balance);
            $('#emr_blanace').val(response.details.emergency);
            $('#username').val(response.info.username);
            $('#AddressDetails').val(response.address.details);
            $('#Note').val(response.address.notes);
            $("select#CityID option")
                 .each(function() { this.selected = (this.text == response.city); 
            });
            $("select#TownID option")
                 .each(function() { this.selected = (this.text == response.area); 
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.text == response.region); 
            });
                    },
                    });
        });

*/

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

     $(".save-data").click(function(event){
        $(".loader").removeClass('hide');
            $( "#Name" ).removeClass( "error" );
            $( "#NationalID" ).removeClass( "error" );
            $( "#NickName" ).removeClass( "error" );
            $( "#DepartmentID" ).removeClass( "error" );
            $( "#Position" ).removeClass( "error" );
            $( "#HiringDate" ).removeClass( "error" );
            $( "#DirectManager" ).removeClass( "error" );
            $( "#JobType" ).removeClass( "error" );

      event.preventDefault();

      let Name = $("input[name=Name]").val();
      let employee_id = $("input[name=employee_id]").val();
      let NationalID = $("input[name=NationalID]").val();
      let MobileNo1 = $("input[name=MobileNo1]").val();
      let MobileNo2 = $("input[name=MobileNo2]").val();
      let JobNumber = $("input[name=JobNumber]").val();
      let NickName = $("input[name=NickName]").val();
      let InternalPhone = $("input[name=InternalPhone]").val();
      let EmailAddress = $("input[name=EmailAddress]").val();
      var DepartmentID = $('#DepartmentID').find(":selected").val();
      var Position = $('#Position').find(":selected").val();
      var DirectManager = $('#DirectManager').find(":selected").val();
      let HiringDate = $("input[name=HiringDate]").val();
      var JobType = $('#JobType').find(":selected").val();
      var CurrencyID = $('#CurrencyID').find(":selected").val();
      let Salary = $("input[name=Salary]").val();
      let vac_year = $("input[name=vac_year]").val();
      let vac_annual = $("input[name=vac_annual]").val();
      let emr_blanace = $("input[name=emr_blanace]").val();
      var userGroup = $("#userGroup :selected").map(function(i, el) {
    return $(el).val();
}).get();
      let username = $("input[name=username]").val();
      let password = $("input[name=password]").val();
      var CityID = $('#CityID').find(":selected").val();
      var area_data = $('#area_data').find(":selected").val();
      var region_data = $('#region_data').find(":selected").val();
      var AddressDetails = $('#AddressDetails').val();
      var Note = $('#Note').val();
      var _token ='{{csrf_token()}}';

      $.ajax({
        url: "store_employee",
        type:"POST",
        data:{
            Name:Name,
            NationalID:NationalID,
            MobileNo1:MobileNo1,
            MobileNo2:MobileNo2,
            JobNumber:JobNumber,
            NickName:NickName,
            InternalPhone:InternalPhone,
            EmailAddress:EmailAddress,          
            DepartmentID:DepartmentID,
            Position:Position,
            CurrencyID:CurrencyID,
            DirectManager:DirectManager,
            HiringDate:HiringDate,
            JobType:JobType,
            Salary:Salary,
            employee_id:employee_id,
            vac_year:vac_year,
            vac_annual:vac_annual,
            emr_blanace:emr_blanace,
            userGroup:userGroup,
            username:username,
            password:password,
            CityID:CityID, 
            area_data:area_data,            
            region_data:region_data,            
            AddressDetails:AddressDetails,            
            Note:Note,                       
            _token: _token ,       
         },

        success:function(response){
            
            $(".loader").addClass('hide');
            $(".alert-success").removeClass('hide');
            $("#succMsg").text('{{trans('admin.employee_added')}}')
            setTimeout(function(){
                $(".alert-success").addClass("hide");
            },2000)

            
            
            $("#ajaxform")[0].reset();          
        },
        error: function(response) {
            $(".loader").addClass('hide');
            $(".alert-success").addClass("hide");
			$(".alert-danger").removeClass('hide');
            $("#errMsg").text(' حطأ في الحفظ ')
            setTimeout(function(){
                $(".alert-danger").addClass("hide");
            },2000)
            if(response.responseJSON.errors.Name){
                $( "#Name" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NationalID){
                $( "#NationalID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.NickName){
                $( "#NickName" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DepartmentID){
                $( "#DepartmentID" ).addClass( "error" );
            }
            if(response.responseJSON.errors.Position){
                $( "#Position" ).addClass( "error" );
            }
            if(response.responseJSON.errors.JobType){
                $( "#JobType" ).addClass( "error" );
            }           
            if(response.responseJSON.errors.HiringDate){
                $( "#HiringDate" ).addClass( "error" );
            }
            if(response.responseJSON.errors.DirectManager){
                $( "#DirectManager" ).addClass( "error" );
            }

           }



       });
  });

  
$(document).ready(function () {

});
</script>
@endsection