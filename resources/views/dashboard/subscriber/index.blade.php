@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')

<section class="horizontal-grid" id="horizontal-grid">
    <form id="ajaxform">
    <div class="row white-row">
        <div class="col-sm-12 col-md-6">
            <div class="card leftSide">
                <div class="card-header">
                    <h4 class="card-title">
                        <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                        {{trans('admin.subscriber_info')}}
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
                                <div class="col-md-7">
                                <div class="form-group">
                                    <div class="input-group" style="width: 98% !important;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.subscriber_name')}}
                                            </span>
                                        </div>
                                        <input type="text" id="formDataNameAR" 
                                        class="form-control alphaFeild ac ui-autocomplete-input"
                                            placeholder="{{trans('admin.subscriber_name')}}" name="formDataNameAR" autocomplete="off">
                                            </div>
                                            <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>
                                        </div>

                                
                            </div>




                                <input type="hidden" id="subscriber_id" name="subscriber_id" value="">

                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                {{trans('admin.emp_id')}}
                                                </span>
                                            </div>
                                            <input type="text" id="formDataNationalID" maxlength="9" class="form-control numFeild" placeholder="{{trans('admin.emp_id')}}" name="formDataNationalID">
                                            <div class="input-group-append" style="visibility: hidden;" onclick="QuickAdd(17,'formDataProfessionID','Profession')">
                                                <span class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link"></i>
    
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-12 pr-s-12" style="padding-left: 0px !important;">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pr-s-12 pr-0">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                                                    <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                                        <img src="https://db.expand.ps/images/jawwal35.png">
                                                                                    </span>
                                                    </div>
                                                    <input type="text" id="formDataMobileNo1" maxlength="10" name="formDataMobileNo1" class="form-control noleft numFeild" placeholder="0590000000" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87" style="padding-left: 10px;">
                                                    <div class="input-group-prepend">
                                                                                    <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                                        <img src="https://db.expand.ps/images/w35.png" style="max-width: 35px;">
                                                                                    </span>
                                                    </div>
                                                    <input type="text" id="formDataMobileNo2" maxlength="10" name="formDataMobileNo2" class="form-control noleft numFeild" placeholder="0560000000" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                {{trans('admin.subscriber_num')}}   
                                                </span>
                                            </div>
                                            <input type="text" id="formDataCutomerNo" name="formDataCutomerNo" class="form-control" placeholder="{{trans('admin.subscriber_num')}}" aria-describedby="basic-addon1">
                                            <div class="input-group-append" style="visibility: hidden;" onclick="QuickAdd(9,'formDataProfessionID','Profession')">
                                                <span class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link"></i>
    
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                                <img src="https://db.expand.ps/images/mailico35.jpg" style="max-width: 35px;">
                                                                            </span>
                                            </div>
                                            <input type="email" id="formDataEmailAddress" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))" name="formDataEmailAddress" class="form-control noleft" placeholder="Example@domain.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">
                                                                        {{trans('admin.job_title')}}
                                                                        </span>
                                        </div>
                                        <select type="text" id="formDataProfessionID" name="formDataProfessionID" class="form-control">
                                            <option value=""> - </option>
                                            @foreach($jobTitle as $job)
                                            <option value="{{$job->id}}"> {{$job->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" onclick="QuickAdd(17,'formDataProfessionID','Profession')">
                                            <span class="input-group-text input-group-text2">
                                                <i class="fa fa-external-link"></i>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-12 pr-s-12" style="padding-left: 0px !important;">
                                    <div class="form-group">
                                        <div class="input-group w-s-87 mt-s-6">
                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="basic-addon1">
                                                                            {{trans('admin.business_name')}}   
                                                                            </span>
                                            </div>
                                            <input type="text" id="formDataBussniessName" class="form-control alphaFeild" placeholder="{{trans('admin.business_name')}}" name="formDataBussniessName">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.part')}} 
                                            </span>
                                        </div>
                                        <select type="text" id="formDataIndustryID" name="formDataIndustryID" class="form-control">
                                            <option value=""> - </option>
                                            @foreach($groups as $group)
                                            <option value="{{$group->id}}"> {{$group->name}}  </option>
                                            @endforeach
                                    </select>
                                    <div class="input-group-append" onclick="QuickAdd(9,'formDataIndustryID','Profession')">
                                        <span class="input-group-text input-group-text2">
                                            <i class="fa fa-external-link"></i>

                                        </span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card-header hide" style="padding-top:0px;">
                <h4 class="card-title"><i class="fa fa-key"></i> 
                {{trans('admin.subscriber_data')}}
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
            
            <div class="row hide" id="userlogin">
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
                <div class="card-header" style="padding-top:0px;">
                    <h4 class="card-title">
                        <img src="https://db.expand.ps/images/detalies.png" width="32" height="32"> {{trans('admin.subscriber_details')}}  </h4>
                    <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->
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
                        <div class="row" style="text-align: center">
                            <div class="col-md-2 w-s-50" style="padding: 0px;">
                                <div class="form-group">
                                    <img src="https://db.expand.ps/images/Eng64.png" onclick="ShowEngModal('formData')" style="cursor:pointer">
                                    <div class="form-group">
                                        <a onclick="ShowEngModal('formData')" style="color:#000000">رخص بناء
                                        <span id="EngStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 w-s-50" style="padding: 0px;">
                                <div class="form-group">
                                    <img src="https://db.expand.ps/images/electric64.png" onclick="ShowElectrisityModal('formData')" style="cursor:pointer">
                                    <div class="form-group">
                                        <a onclick="ShowElectrisityModal('formData')" style="color:#000000">الكهرباء<span id="ElecStatc" style="color:#1E9FF2"><b>(0)</b></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 w-s-50" style="padding: 0px;">
                                <div class="form-group">
                                    <img src="https://db.expand.ps/images/water-faucet64.png" height="64px" onclick="ShowWaterModal('formData')" style="cursor:pointer">
                                    <div class="form-group">
                                        <a onclick="ShowWaterModal('formData')" style="color:#000000">المياه.<span id="WaterStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 w-s-50" style="padding: 0px;">
                                <div class="form-group">
                                    <img src="{{asset('assets/images/ico/msg.png')}}" onclick="ShowCertModal('formData')" style="cursor:pointer">
                                    <div class="form-group">
                                        <a onclick="ShowCertModal('formData')" style="color:#000000"> الأرشيف 
                                            <span id="certListCnt" style="color: #1e9ff2">(0)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 w-s-50" style="padding: 0px;">
                                <div class="form-group">
                                    <img src="https://db.expand.ps/images/rep.png" height="64px" onclick="ShowAppModal('formData')" style="cursor:pointer">
                                    <div class="form-group">
                                        <a onclick="ShowAppModal('formData')" style="color:#000000"> تقارير 
                                            <span id="cRepListCnt" style="color: #1e9ff2">(0)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 w-s-50" style="padding: 0px;">
                                <div class="form-group">
                                    <img src="https://db.expand.ps/images/ico6.jpg" height="64px" onclick="$('#joblicModal').modal('show')" style="cursor:pointer">
                                    <div class="form-group">
                                        <a onclick="$('#joblicModal').modal('show')" style="color:#000000"> رخص حرف
                                            <span id="licListCnt" style="color: #1e9ff2">(0)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="EnabledItem" style="padding:5px; direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>
                        <div class="row formDataallDept formDatac1 hide" style="padding-left: 15px;">
                            <div class="row formDatac1Content" style="    width: 100%;">

                            </div>
                        </div>

                        <div class="row formDataallDept formDatac2 hide" style="padding-left: 15px;">
                            <div class="row formDatac2Content" style="    width: 100%;">
                            </div>
                        </div>

                        <div class="row formDataallDept formDatac3 hide" style="padding-left: 15px;">
                            <div class="row formDatac3Content" style="    width: 100%;">
                            </div>
                        </div>

                        <div class="row formDataallDept formDatac4 hide">
                            <div class="table-responsive">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="height: 8px">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card rightSide" style="min-height:598.359px">
                <div class="card-header">
                    <h4 class="card-title">
                        <img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                    <!-- <a class="heading-elements-toggle">
                        <i class="ft-align-justify font-medium-3"></i></a> -->

    
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
                    @if($setting->address->city_id != null)
                        <option value="{{$cit->id}}" @if($cit->id == $setting->address->city->id) 
                            selected @endif>{{$cit->name}}</option>
                    @endif
                @endforeach 
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(10,'PositionID','City')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
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
                        <option value="{{$are->id}}" @if($are->id == $setting->address->area->id) 
                            selected @endif>{{$are->name}}</option>
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

                       				                
                
                        <div class="form-actions" style="border-top:0px;">
                            <div class="text-right">
                                <button class="btn btn-primary save-data">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>
                                <button type="reset" onclick="redirectURL('linkIcon1-tab1')" class="btn btn-warning reset-dats"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
@include('dashboard.component.archive_table');
@include('dashboard.component.archive_joblic');
@include('dashboard.component.fetch_table');
@stop
@section('script')
<script>
$( function() {
    $( ".ac" ).autocomplete({
		source: 'subscribe_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            let subscribe_id = (ui.item.id)
            update(subscribe_id);
            
        }
	});
} );


function update($id)
{
    
    let subscribe_id = $id;
    $.ajax({
    type: 'get', // the method (could be GET btw)
    url: "subscribe_info",

        data: {
            subscribe_id: subscribe_id,
        },
        success:function(response){
        $('#subscriber_id').val(response.info.id);
        $('#formDataNameAR').val(response.info.name);
        $('#formDataNationalID').val(response.info.national_id);
        $('#formDataMobileNo1').val(response.info.phone_one);
        $('#formDataMobileNo2').val(response.info.phone_two);
        $('#formDataCutomerNo').val(response.info.cutomer_num);
        $('#formDataEmailAddress').val(response.info.email);
        $('#formDataBussniessName').val(response.info.bussniess_name);
        $("#certListCnt").html("("+response.ArchiveCount+")");
        $("#licListCnt").html("("+response.ArchiveJobLicCount+")");
        
        drawTablesArchive(response.Archive,response.copyTo,response.ArchiveLic,response.jalArchive,
        response.outArchiveCount,response.inArchiveCount,response.otherArchiveCount
        ,response.licFileArchiveCount
        ,response.licArchiveCount,response.copyToCount,response.linkToCount);
        drawTableJoblic(response.ArchiveJobLic);
        $("select#formDataProfessionID option")
            .each(function() { this.selected = (this.text == response.job_title); 
        });
        $("select#formDataIndustryID option")
            .each(function() { this.selected = (this.text == response.group); 
        });
        $('#username').val(response.info.username);
        $('#AddressDetails').val(response.address.details);
        $('#Note').val(response.address.notes);
        $("select#CityID option")
            .each(function() { this.selected = (this.text == response.city); 
        });
        $("select#area_data option")
            .each(function() { this.selected = (this.text == response.area); 
        });
        $("select#region_data option")
            .each(function() { this.selected = (this.text == response.region); 
        });
        },
    });
}

$("#CityID").change(function () {
        $("#area_data").empty();
        var val = $(this).val();

    $.ajax({
       type: 'post',
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
$('.reset-dats').click(function(event){
    $("#certListCnt").html("(0)");
});

    $(".save-data").click(function(event){
        $(".loader").removeClass('hide');
     $( "#formDataNameAR" ).removeClass( "error" );
      event.preventDefault();

      let formDataNameAR = $("input[name=formDataNameAR]").val();
      let formDataNationalID = $("input[name=formDataNationalID]").val();
      let formDataMobileNo1 = $("input[name=formDataMobileNo1]").val();
      let formDataMobileNo2 = $("input[name=formDataMobileNo2]").val();
      let formDataCutomerNo = $("input[name=formDataCutomerNo]").val();
      let formDataEmailAddress = $("input[name=formDataEmailAddress]").val();
      let formDataBussniessName = $("input[name=formDataBussniessName]").val();
      let username = $("input[name=username]").val();
      let password = $("input[name=password]").val();
      var formDataProfessionID = $('#formDataProfessionID').find(":selected").val();
      var formDataIndustryID = $('#formDataIndustryID').find(":selected").val();
      var _token ='{{csrf_token()}}';
      let subscriber_id = $("input[name=subscriber_id]").val();
      var CityID = $('#CityID').find(":selected").val();
      var area_data = $('#area_data').find(":selected").val();
      var region_data = $('#region_data').find(":selected").val();
      var AddressDetails = $('#AddressDetails').val();
      var Note = $('#Note').val();

      $.ajax({
        url: "store_subscriber",
        type:"POST",
        data:{
            formDataNameAR:formDataNameAR,
            formDataNationalID:formDataNationalID,
			formDataMobileNo1:formDataMobileNo1,
            formDataMobileNo2:formDataMobileNo2,
            formDataCutomerNo:formDataCutomerNo,
            formDataEmailAddress:formDataEmailAddress,
            formDataBussniessName:formDataBussniessName, 
            username:username,                              
            password:password,                              
            formDataProfessionID:formDataProfessionID,                              
            formDataIndustryID:formDataIndustryID,               
            _token: _token ,   
            subscriber_id:subscriber_id, 
            CityID:CityID, 
            area_data:area_data,            
            region_data:region_data,            
            AddressDetails:AddressDetails,            
            Note:Note,                    
         },

        success:function(response){
			$(".loader").addClass('hide');

             $('.wtbl').DataTable().ajax.reload(); 
            // setTimeout(function(){
            //     $(".alert-success").addClass("hide");
            // },2000)
            Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})
            $("#ajaxform")[0].reset();   
              
        },
        error: function(response) {
			$(".loader").addClass('hide');
            Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: '{{trans('admin.error_save')}}',
				showConfirmButton: false,
				timer: 1500
				})
                $("#formDataNameAR").on('keyup', function (e) {
                    if ($(this).val().length > 0) {
                        $( "#formDataNameAR" ).removeClass( "error" );
                    }
                });

            if(response.responseJSON.errors.formDataNameAR){
                $( "#formDataNameAR" ).addClass( "error" );
            }
           

           }



       });
  });


  function ShowCertModal(bindTo){

$("#CitizenName").html($("#formDataNameAR").val())
$("#CertModal").modal('show')
}
</script>


@endsection