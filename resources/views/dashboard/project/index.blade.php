@extends('layouts.admin')
@section('content')

<form id="ajaxform">
<section class="horizontal-grid" id="horizontal-grid">
<div class="row white-row">
    <div class="col-sm-12 col-lg-6 col-md-12">
        <div class="card leftSide">
            <div class="card-header">
                <h4 class="card-title">
                    <img src="https://db.expand.ps/images/info.png" width="32" height="32">
                    {{trans('admin.project_name')}}
                    </h4>
                <div class="heading-elements1" style="display: none;right: 87px; top: 10px;">
                {{trans('admin.project_status')}}
                </div>
                <div class="heading-elements1 onOffArea" style="display: none;    top: 10px;">
                    <div class="onoffswitch" onclick="ShowModal()">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitchHeader">
                        <label class="onoffswitch-label" for="myonoffswitchHeader">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="card-content collapse show">
                <div class="card-body" style="padding-bottom: 0px;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 pr-0 pr-s-12" style="padding-left: 15px !important;">
                                <div class="form-group">
                                    <div class="input-group" style=" width: 100% !important;">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                    {{trans('admin.project_name')}}
                                    </span>
                                        </div>
                                        <input type="text" id="ProjectName" class="form-control ac ui-autocomplete-input" placeholder="{{trans('admin.project_name')}}" name="ProjectName" autocomplete="off">
                                    </div>
                                    <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>
                                    <input type="hidden" id="project_id" name="project_id" value="">

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                    {{trans('admin.project_num')}}
                                    </span>
                                        </div>
                                        <input type="text" id="ProjectNo" class="form-control" placeholder="{{trans('admin.project_num')}}" name="ProjectNo">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="input-group" style=" width: 100% !important;">
                                        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
            {{trans('admin.project_start_date')}}
            </span>
                                        </div>
                                        <input type="date" id="dateStart" name="dateStart" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid " placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" autocomplete="off">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
            {{trans('admin.project_end_date')}}
            </span>
                                        </div>
                                        <input type="date" id="dateEnd" name="dateEnd" class="form-control eng-sm singledate valid" data-mask="00/00/0000" autocomplete="off" maxlength="10" placeholder="dd/mm/yyyy" aria-describedby="basic-addon1">

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-7 col-md-12 pr-s-12">
                                <div class="form-group">
                                    <div class="input-group w-s-87 mt-s-6" style="width: 100% !important;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.manager')}}
                                            </span>
                                        </div>
                                        <select type="text" id="pinc6" name="pich6" class="form-control valid" onchange="getEmpInfo($(this).val(),$('#Department'),$('#pos'),0);hideSelected($(this).val())" aria-invalid="false">
                                        <optgroup label=" ">
                                            @foreach($admins as $admin)
                                            <option value="{{$admin->id}}"> {{$admin->name}}  </option>
                                            @endforeach
                                        </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="input-group" style="">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        {{trans('admin.department')}}
                                        </span>
                                    </div>

                                    <select type="text" disabled="" id="Department" name="Department" class="form-control">
                                  
                                    @foreach($departments as $department)
                                       <option value="{{ $department->id }}">{{ $department->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-lg-12 col-md-12 pr-s-12" style="padding-left: 27px;">
                                <div class="form-group user_subscriber">
                                    <div class="input-group w-s-87 mt-s-6" style="width: 100% !important;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.subscribers')}}
                                            </span>
                                        </div>
                                        <select type="text" id="subscribers" name="subscribers[]" multiple class="form-control valid" onchange="getEmpInfo($(this).val(),$('#Department'),$('#pos'),0);hideSelected($(this).val())" aria-invalid="false">
                                         @foreach($users as $user)   
                                        <option value="{{$user->id}}"> {{$user->name}}  </option>
                                        @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-1 mb-2 hide">
                                <i class="fas fa-users fa-lg" onclick="show();" style="    margin-left: 14px; color: #1e9ff2;margin-top: 15px;"></i>
                            </div>
                        </div>
                            <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="input-group" style="width: 100% !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    {{trans('admin.project_cost')}}
                                                    </span>
                                                </div>
                                                <input id="Projectcost" name="Projectcost" class="form-control numFeild " placeholder="00.00" style="    border-radius: 0rem !important;">

                                                <select id="CurrencyID" name="CurrencyID" type="text" class="form-control" style="padding: 0 !important;height: 32px !important;">
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
                                
                        <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">المستخدم معطل</div>

                        <div  id="ParticipatedEmployees">
                        <div class="row" style="margin-left: 0;">
                            <h5> {{trans('admin.subscribers')}}</h5>
                            <table style="width:100%; margin-top: 0;margin-left: 3%;" class="detailsTB table">
                                <tbody><tr>
                                <th scope="col"># </th>                                    
                                    <th scope="col">{{trans('admin.subscriber_name')}} </th>
                                    <th scope="col">{{trans('admin.business_name')}}</th>
                                    <th scope="col">{{trans('admin.emp_id')}}</th>

                                </tr>


                                </tbody><tbody id="userList">

                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="card" style=" margin-left: -3%; display: none;">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <img src="https://db.expand.ps/images/cost.jpeg" width="32" height="32">تكلفة المشروع / الممول</h4>
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        شرط الدفع
                                        </span>
                                    </div>
                                    <select type="text" id="PaymentTerm" name="PaymentTerm" class="form-control">
                                        <option> - </option>
                                                                                                        <option value="149"> كفاله حسن تنفيذ </option>
                                                                                                        <option value="152"> بعد الانتهاء </option>
                                                                                                        <option value="157">        كل يو م </option>
                                        
                                    </select>
                                    <div class="input-group-append" onclick="QuickAdd(28,'PaymentTerm','Payment Term')">
                                        <span class="input-group-text input-group-text2">
                                            <i class="fa fa-external-link-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-header" style="padding-top:0px;">
                            <h4 class="card-title">
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32"> 
                                {{trans('admin.archieve')}}
                            </h4>
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
                <div class="card-body" style="padding-bottom: 0px;">
                    <div class="row" style="text-align: center">
                        <div class="col-md-2 w-s-50" style="padding: 0px;">
                            <div class="form-group">
                                <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#OrgArchModal').modal('show')" style="cursor:pointer">
                                <div class="form-group">
                                    <a onclick="$('#OrgArchModal').modal('show')" style="color:#000000"> {{trans('admin.archieve')}} 
                                    <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                </div>
                            </div>
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
        <div class="card rightSide" style="min-height:646px">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
                </div>
            <div class="card-content collapse show">
                <div class="card-body">
                @include('dashboard.component.address')		
                    <div class="row">
                        <table style="margin-left: 2% !important;width:100%; margin-top: 0;" class="detailsTB  tablesj">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{trans('admin.select_financier')}}
                                                </span>
                                            </div>
                                            <select type="text" id="sponsor" name="sponsor" class="form-control">
                                            <optgroup label=" ">
                                                @foreach($sponsers as $sponser)
                                                <option value="{{$sponser->id}}">  {{$sponser->name}}  </option>
                                               @endforeach
                                            </optgroup>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                {{trans('admin.financie_percentage')}}
                                                </span>
                                            </div>
                                            <input type="text" id="cost1" name="cost1" class="form-control " aria-describedby="basic-addon1" style="    padding-left: 10px !important;padding-right: 0 !important;">
                                        </div>
                                    </td>
                                    <td>

                                        <i class="fa fa-plus-circle" id="plusElement" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: #1E9FF2;font-size: 15pt;"></i>

                                    </td>
                                </tr>

                            </tbody>
                            <tbody id="other">

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <table style="    margin-left: 2% !important;width:100%; margin-top: 0;" class="detailsTB tablesj">
                            <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.supplier_company')}}
                                            
                                            </span>
                                        </div>
                                        <select type="text" id="Contractor" name="Contractor" class="form-control" onchange="getSupplierInfo($(this).val(),$('#pinc8'))" style="padding-right: 0 !important;padding-left: 0rem !important;">
                                        <optgroup label=" ">
                                            @foreach($Contractor as $Contract)
                                                <option value="{{$Contract->id}}">  {{$Contract->name}}  </option>
                                            @endforeach    
                                        </optgroup>                                  
                                      </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.Contact')}}
                                            </span>
                                        </div>
                                        <input type="text" id="pinc8" name="pinc8" class="form-control alphaFeild" placeholder="" aria-describedby="basic-addon1" style="    padding-left: 10px !important;padding-right: 0 !important;">
                                    </div>
                                </td>
                                <td>
                                    <i class="fa fa-plus-circle" id="plusElement3" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: #1E9FF2;font-size: 15pt;"></i>
                                </td>
                            </tr>

                            </tbody>
                            <tbody id="other3">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-header" style="padding-top:0px;">
                <h4 class="card-title" style="    height: 36px;"> 
                </h4>
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
            <div class="card" style="display:none">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/sponsor.png" width="32" height="32"> المقاول</h4>
                    <!-- <a class="heading-elements-toggle">
                        <i class="ft-align-justify font-medium-3"></i></a> -->
                    <div class="heading-elements" style="display: none;">
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
                            <table style=" margin-left: 2% !important;width:100%; margin-top: 0;" class="detailsTB table">
                                <tbody>
                                    <tr>
                                    <th scope="col">مكتب الهندسة</th>
                                    <th scope="col">الشخص المسؤول</th>
                                    <th scope="col"></th>
                                </tr>
                                <tr>
                                    <td>
                                        <select type="text" id="EngOffice" name="EngOffice[]" class="form-control" onchange="getOfficeInfo($(this).val(),$('#pinc7'))" style="padding-right: 0 !important;padding-left: 0rem !important;">
                                            <option> - </option>
                                                                                                                <option value="1"> مكتب كنان الهندسي </option>
                                                                                                                <option value="2"> مكتب حمزة  </option>
                                                                                                                <option value="3"> مكتب الهدى الهندسي </option>
                                                                                                                <option value="4"> مكتب الأحمد </option>
                                                                                                                <option value="5"> مكتب x </option>
                                                                                                                <option value="6"> مكتب فلسطين للمساحة والهندسة والخدمات العقارية  </option>
                                                                                                                <option value="7"> مكتب زهراء للمساحة  </option>
                                                                                                                <option value="8"> مكتب المهندس وائل  </option>
                                                                                                                <option value="9"> مكتب السلام للمحاسبة  </option>
                                                                                                                <option value="10"> مكتب السلام الهندسي  </option>
                                                                                                                <option value="11"> مكتب النجاح الهندسي  </option>
                                                                                                                <option value="12"> مكتب الكرمل للمساحة  </option>
                                                                                                                <option value="13"> مكتب الوفاء الهندسي  </option>
                                                                                                                <option value="14"> مكتب الحنبلي  </option>
                                                                                                                <option value="15"> مكتب العودة  </option>
                                                                                                                <option value="16"> مكتب عتمة الهندسي  </option>
                                                                                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" id="pinc7" name="pinc7" class="form-control alphaFeild" placeholder="" aria-describedby="basic-addon1" style="    padding-left: 10px !important;padding-right: 0 !important;">
                                    </td>
                                    <td>
                                        <i class="fas fa-plus-circle" id="plusElement2" style="padding-top:10px;position: relative;left: 3%;cursor: pointer;color: #1E9FF2;font-size: 15pt;"></i>
                                    </td>
                                </tr>

                                </tbody>
                                <tbody id="other2">

                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group" style=" width: 96% !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    ملاحظات
                                                    </span>
                                                </div>
                                                <textarea type="text" id="NoteAR" class="form-control" placeholder="ادخل ملاحظاتك هنا" name="NoteAR" style="height: 35px;"></textarea>
                                                <div class="input-group-append hidden-xs hidden-sm">
                                                    <span class="input-group-text input-group-text2" style="color:#ffffff">
                                                    <i class="fa fa-external-link-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md attachs-section">
                                <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
                                <span class="attach-header">مرفقات
                                <span id="attach-required">*</span>
                                <span class="attach-icons">
                                    <a href="#" onclick="document.getElementById('formDataupload-file[]').click(); return false" class="attach-icon"><i class="fas fa-paperclip"></i></a>
                                    <a href="#" onclick="document.getElementById('formDataupload-image[]').click(); return false" class="attach-icon"><i class="far fa-image"></i></a>
                                    <a onclick="showLinkModal('formData')" class="attach-icon"><i class="fas fa-link"></i></a>
                                </span>
                            </span>
                            </div>
                        </div>
                        <div class="row attachs-body">
                            <div class="form-group col-12 mb-2">
                                <input type="hidden" name="fromname" value="formData">
                                <input type="file" class="form-control-file" id="formDataupload-file[]" multiple="" name="formDataUploadFile[]" onchange="doUploadAttach('formData')" style="display: none" accept=".doxc, .xlsx, .pptx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                                <input type="file" class="form-control-file" id="formDataupload-image[]" multiple="" name="formDataUploadImage[]" onchange="doUploadAttach('formData')" accept="image/*" style="display: none">
                                <div class="row formDataImagesArea">
                                </div>
                                <div class="row formDataFilesArea" style="margin-left: 0px;">
                                </div>
                                <div class="row formDataLinkArea" style="margin-left: 0px;">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="form-actions" style="border-top:0px;">
                <div class="text-right">
                    <button class="btn btn-primary save-data">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>
                    <button type="reset" onclick="redirectURL('linkIcon1-tab1')" class="btn btn-warning"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                </div>
          </div>

        </div>

    </div>

</div>
</section>
</form>
@include('dashboard.component.archive_table');
@include('dashboard.component.fetch_table');

@stop
@section('script')

<script>

$( function() {
    $( ".ac" ).autocomplete({
		source: 'project_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {

            let project_id = ui.item.id
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "project_info",
            data: {
                project_id: project_id,
            },
            success:function(response){
            $('#project_id').val(response.info.id); 
            $('#ProjectNo').val(response.info.ProjectNo);
            $('#ProjectName').val(response.info.name);
            $('#dateStart').val(response.info.dateStart);
            $('#dateEnd').val(response.info.dateEnd);
            $('#Projectcost').val(response.info.Projectcost);
            $("#msgStatic").html(response.ArchiveCount);
            drawTablesArchive(response.Archive);
            $("select#CurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency); 
            });
            
            $("select#pich6 option")
                 .each(function() { this.selected = (this.text == response.admin); 
            });
            $("select#Department option")
                 .each(function() { this.selected = (this.text == response.department); 
            });

            $("select#sponsor option")
                 .each(function() { this.selected = (this.text == response.sponsers); 
            });
            $('#cost1').val(response.info.cost1);
            $('#pinc8').val(response.info.pinc8);

            $("select#Contractor option")
                 .each(function() { this.selected = (this.text == response.contract); 
            });
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

            var len = response.users.length;
        for(var i=0; i<len; i++){
			    var index = i+1;

                var name = response.users[i].name;
                var bussniess_name = response.users[i].bussniess_name;
                var national_id = response.users[i].national_id;

                    var userList = '<tr><td>'+index +'</td><td>'
                    +name+'</td><td>'+bussniess_name+'</td><td>'+national_id+'</td><td></tr>'
                    $("#userList").append(userList);
            }



			},
			});

        }
	});
} );

function update($id)
{
    let project_id = $id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "project_info",
            data: {
                project_id: project_id,
            },
            success:function(response){
            $('#project_id').val(response.info.id); 
            $('#ProjectNo').val(response.info.ProjectNo);
            $('#ProjectName').val(response.info.name);
            $('#dateStart').val(response.info.dateStart);
            $('#dateEnd').val(response.info.dateEnd);
            $('#Projectcost').val(response.info.Projectcost);
            $("select#CurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency); 
            });
            
            $("select#pich6 option")
                 .each(function() { this.selected = (this.text == response.admin); 
            });
            $("select#Department option")
                 .each(function() { this.selected = (this.text == response.department); 
            });

            $("select#sponsor option")
                 .each(function() { this.selected = (this.text == response.sponsers); 
            });
            $('#cost1').val(response.info.cost1);
            $('#pinc8').val(response.info.pinc8);

            $("select#Contractor option")
                 .each(function() { this.selected = (this.text == response.contract); 
            });
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

            var len = response.users.length;
        for(var i=0; i<len; i++){
			    var index = i+1;

                var name = response.users[i].name;
                var bussniess_name = response.users[i].bussniess_name;
                var national_id = response.users[i].national_id;

                    var userList = '<tr><td>'+index +'</td><td>'
                    +name+'</td><td>'+bussniess_name+'</td><td>'+national_id+'</td><td></tr>'
                    $("#userList").append(userList);
            }



			},
			});
}
$("#pinc6").change(function () {
        var val = $(this).val();
$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "depart_manger_project",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
    $("select#Department option")
                 .each(function() { this.selected = (this.text == response); 
            });
         },
        });
    });


///////////
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
     $( "#ProjectName" ).removeClass( "error" );
     $( "#dateStart" ).removeClass( "error" );
     $( "#dateEnd" ).removeClass( "error" );

      event.preventDefault();

      let ProjectName = $("input[name=ProjectName]").val();
      let ProjectNo = $("input[name=ProjectNo]").val();
      let dateStart = $("input[name=dateStart]").val();
      let dateEnd = $("input[name=dateEnd]").val();
      var pinc6 = $('#pinc6').find(":selected").val();
      var Department = $('#Department').find(":selected").val();
      var subscribers = $("#subscribers :selected").map(function(i, el) {
    return $(el).val();
}).get();
      let Projectcost = $("input[name=Projectcost]").val();
      var CurrencyID = $('#CurrencyID').find(":selected").val();
      var _token ='{{csrf_token()}}';
      let project_id = $("input[name=project_id]").val();
      var CityID = $('#CityID').find(":selected").val();
      var area_data = $('#area_data').find(":selected").val();
      var region_data = $('#region_data').find(":selected").val();
      var AddressDetails = $('#AddressDetails').val();
      var Note = $('#Note').val();
      var sponsor = $('#sponsor').find(":selected").val();
      let cost1 = $("input[name=cost1]").val();
      var Contractor = $('#Contractor').find(":selected").val();
      let pinc8 = $("input[name=pinc8]").val();

      $.ajax({
        url: "store_project",
        type:"POST",
        data:{
            ProjectName:ProjectName,
            ProjectNo:ProjectNo,
			dateStart:dateStart,
            dateEnd:dateEnd,
            pinc6:pinc6,
            Department:Department,
            subscribers:subscribers, 
            Projectcost:Projectcost,                              
            CurrencyID:CurrencyID,                                            
            _token: _token ,   
            project_id:project_id, 
            CityID:CityID, 
            area_data:area_data,            
            region_data:region_data,            
            AddressDetails:AddressDetails,            
            Note:Note,      
            sponsor:sponsor, 
            cost1:cost1,            
            Contractor:Contractor,            
            pinc8:pinc8,            
           
         },

        success:function(response){
            $('.success_alert').css('visibility', 'visible');
            $('.wtbl').DataTable().ajax.reload();       
            setTimeout(function() {
            $('.success_alert').fadeOut();
            }, 3000 ); 
            
            $("#ajaxform")[0].reset();   
            
        },
        error: function(response) {
            if(response.responseJSON.errors.ProjectName){
                $( "#ProjectName" ).addClass( "error" );
            }
            if(response.responseJSON.errors.dateStart){
                $( "#dateStart" ).addClass( "error" );
            }
            if(response.responseJSON.errors.dateEnd){
                $( "#dateEnd" ).addClass( "error" );
            }
           }



       });
  });

</script>
@endsection