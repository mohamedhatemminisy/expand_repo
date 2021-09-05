@extends('layouts.admin')
@section('content')

<section class="horizontal-grid" id="horizontal-grid">
<form id="ajaxform">
    <div class="row white-row">
        <div class="col-sm-12 col-md-6">
            <div class="card rightSide">
                <div class="card-header">
                    <h4 class="card-title"><img src="https://db.expand.ps/images/sponsor.png">
                    {{trans('admin.org_info')}}
                    </h4>

                    <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">
                    {{trans('admin.org_status')}}
                    </div>
                    <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
                            <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked="">
                        </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body" style="padding-bottom: 0px;">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">
                                    <div class="form-group">
                                        <div class="input-group w-s-87">
                                            @if($type == 'orginzation')
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.orgnization_name')}} 
                                            </span>
                                            </div>
                                            <input type="text" id="SponsorName" 
                                            class="form-control alphaFeild ac ui-autocomplete-input"
                                             placeholder=" {{trans('admin.orgnization_name')}} "
                                              name="SponsorName" autocomplete="off">
                                              @elseif($type == 'enginering')
                                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.enginer_office')}} 
                                            </span>
                                            </div>
                                            <input type="text" id="SponsorName" 
                                            class="form-control alphaFeild ac ui-autocomplete-input"
                                             placeholder=" {{trans('admin.enginer_office')}} "
                                              name="SponsorName" autocomplete="off">
                                              @elseif($type == 'banks')
                                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.bank_name')}} 
                                            </span>
                                            </div>
                                            <input type="text" id="SponsorName" 
                                            class="form-control alphaFeild ac ui-autocomplete-input"
                                             placeholder=" {{trans('admin.bank_name')}} "
                                              name="SponsorName" autocomplete="off">

                                              @elseif($type == 'space')
                                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.space_office')}} 
                                            </span>
                                            </div>
                                            <input type="text" id="SponsorName" 
                                            class="form-control alphaFeild ac ui-autocomplete-input"
                                             placeholder=" {{trans('admin.space_office')}} "
                                              name="SponsorName" autocomplete="off">
                                              @elseif($type == 'suppliers')
                                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.supplier_name')}} 
                                            </span>
                                            </div>
                                            <input type="text" id="SponsorName" 
                                            class="form-control alphaFeild ac ui-autocomplete-input"
                                             placeholder=" {{trans('admin.supplier_name')}} "
                                              name="SponsorName" autocomplete="off">
                                              
                                              @endif


                                              </div>

                                              <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>

                                            <input type="hidden" id="orgnization_id" name="orgnization_id" value="">
                                            <input type="hidden" id="type" name="type" value="{{$type}}">

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            {{trans('admin.ZIP_code')}} 
                                            </span>
                                            </div>
                                            <input type="text" id="LisenceNo" class="form-control " placeholder=" {{trans('admin.ZIP_code')}} " name="LisenceNo">

                                            <div class="input-group-append hide hidden-xs hidden-sm">
                                                <span class="input-group-text input-group-text2" style="color:#ffffff">
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
                                        <div class="input-group w-s-87 ">
                                            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                {{trans('admin.manager')}}                             </span>
                                            </div>
                                            <input type="text" id="personInCharge" class="form-control alphaFeild" placeholder="{{trans('admin.manager')}}" name="personInCharge">
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
                                        <select type="text" id="PositionID" name="PositionID" class="form-control">
                                            <option> - </option>
                                            @foreach($jobTitle as $job)
                                            <option value="{{$job->id}}"> {{$job->name}}   </option>
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
                            
                            <div class="row">
                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pr-s-12 pr-0">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text1" id="basic-addon1">
                                                        <img src="https://db.expand.ps/images/jawwal35.png">
                                                    </span>
                                                    </div>
                                                    <input type="text" id="MobileNo1" maxlength="10" name="MobileNo1" class="form-control noleft numFeild" placeholder="0590000000" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text1" id="basic-addon1">
                                                        <img src="https://db.expand.ps/images/w35.png" style="max-width: 35px;">
                                                    </span>
                                                    </div>
                                                    <input type="text" id="MobileNo2" maxlength="10" name="MobileNo2" class="form-control noleft numFeild" placeholder="0560000000" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                                <img src="https://db.expand.ps/images/fax35.png">
                                            </span>
                                            </div>
                                            <input type="text" id="faxNo" name="faxNo" maxlength="9" class="form-control noleft numFeild" placeholder="000000000" aria-describedby="basic-addon1">

                                            <div class="input-group-append hide hidden-xs hidden-sm">
                                    <span class="input-group-text input-group-text2" style="color:#ffffff">
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
                                            <input type="email" id="EmailAddress" name="EmailAddress" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))" class="form-control noleft" placeholder="Example@domain.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group" style="">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                    <img src="https://db.expand.ps/images/call-pinar35.png">
                    </span>
                                            </div>
                                            <input type="text" id="phone1" name="phone1" maxlength="9" class="form-control noleft numFeild" placeholder="09-0000000" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-12 pr-0 pr-s-12 w-s-87 mt-s-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                <img src="https://db.expand.ps/images/110.jpg" style="max-width: 35px;">
                                        </span>
                                            </div>
                                            <input type="text" id="website" onkeydown="returnCd(event,this)" onkeyup="ClearArabic($(this))" name="website" class="form-control noleft" placeholder="wwww.example.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group" style="">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                    <span class="input-group-text input-group-text1" id="basic-addon1">
                    <img src="https://db.expand.ps/images/call-pinar35.png">
                    </span>
                                            </div>
                                            <input type="text" id="phone2" maxlength="9" name="phone2" class="form-control noleft numFeild" placeholder="09-0000000" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">المستخدم معطل</div>

                        </div>
                    </div>
                </div>
                <div class="card-header" style="padding-top:0px;">
                        <h4 class="card-title">
                            <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32"> 
                            {{trans('admin.details')}}
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
                                        <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#CertModal').modal('show')" style="cursor:pointer">
                                        <div class="form-group">
                                            <a onclick="$('#msgModal').modal('show')" style="color:#000000">{{trans('admin.archieve')}} 
                                            <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card leftSide" style="min-height:532.375px">
            <div class="card-header">
                <h4 class="card-title"><img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32"> {{trans('admin.address')}}</h4>
            </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                        @include('dashboard.component.address')		
                            <div class="row">
                                <div class="col-md attachs-section">
                                    <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40">
                                    <span class="attach-header">{{trans('admin.attachments')}} 
                                        <span id="attach-required">*</span>
                                        <span class="attach-icons">
                                            <a href="#" onclick="document.getElementById('formDataupload-file[]').click(); return false" class="attach-icon"><i class="fa fa-paperclip"></i></a>
                                            <a href="#" onclick="document.getElementById('formDataupload-image[]').click(); return false" class="attach-icon"><i class="fa fa-picture-o"></i></a>
                                            <a onclick="showLinkModal('formData')" class="attach-icon"><i class="fa fa-link"></i></a>
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

                            <div class="form-actions" style="border-top:0px;">
                                <div class="text-right">
                                    <button class="btn btn-primary save-data">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>
                                    <button type="reset" onclick="redirectURL('linkIcon1-tab1')" class="btn btn-warning"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
</section>
<?php $types=$type; $type="org";?>
@include('dashboard.component.archive_table');
@include('dashboard.component.fetch_table');
<?php $type=$types;?>
@stop
@section('script')
<script>

$( function() {
    let type = $("input[name=type]").val();
    $( ".ac" ).autocomplete({
		source:  function (request, response) {
            $.ajax({
                    type: "get",
                    url:"orginzation_auto_complete",
                    data: {request, type},
                    success: response,
                    dataType: 'json'
                });
                },
       
		minLength: 1,

        select: function( event, ui ) {
            let orginzation_id = ui.item.id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "orgnization_info",
            data: {
                orginzation_id: orginzation_id,
            },
            success:function(response){
            $('#orgnization_id').val(response.info.id); 
            $('#SponsorName').val(response.info.name);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#LisenceNo').val(response.info.zepe_code);
            $('#EmailAddress').val(response.info.email);
            $('#faxNo').val(response.info.fax);
            $('#personInCharge').val(response.info.manager_name);
            $('#phone1').val(response.info.whatsapp_one);
            $('#phone2').val(response.info.whatsapp_two);
            $('#website').val(response.info.website);
            $("#msgStatic").html(response.ArchiveCount);
            drawTablesArchive(response.Archive,response.copyTo);
            $("select#PositionID option")
                 .each(function() { this.selected = (this.text == response.job_title); 
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
			},
			});
        }
	});
} );

function update($id)
{
    let orginzation_id = $id;
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "orgnization_info",
            data: {
                orginzation_id: orginzation_id,
            },
            success:function(response){
            $('#orgnization_id').val(response.info.id); 
            $('#SponsorName').val(response.info.name);
            $('#MobileNo1').val(response.info.phone_one);
            $('#MobileNo2').val(response.info.phone_two);
            $('#LisenceNo').val(response.info.zepe_code);
            $('#EmailAddress').val(response.info.email);
            $('#faxNo').val(response.info.fax);
            $('#personInCharge').val(response.info.manager_name);
            $('#phone1').val(response.info.whatsapp_one);
            $('#phone2').val(response.info.whatsapp_two);
            $('#website').val(response.info.website);
            $("select#PositionID option")
                 .each(function() { this.selected = (this.text == response.job_title); 
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
			},
			});
}
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
            $( "#SponsorName" ).removeClass( "error" );
      event.preventDefault();

      let SponsorName = $("input[name=SponsorName]").val();
      let orgnization_id = $("input[name=orgnization_id]").val();
      let type = $("input[name=type]").val();
      let LisenceNo = $("input[name=LisenceNo]").val();
      let personInCharge = $("input[name=personInCharge]").val();
      let MobileNo1 = $("input[name=MobileNo1]").val();
      let MobileNo2 = $("input[name=MobileNo2]").val();
      let faxNo = $("input[name=faxNo]").val();
      let EmailAddress = $("input[name=EmailAddress]").val();
      let phone1 = $("input[name=phone1]").val();
      let website = $("input[name=website]").val();
      let phone2 = $("input[name=phone2]").val();
      var PositionID = $('#PositionID').find(":selected").val();
      var CityID = $('#CityID').find(":selected").val();
      var area_data = $('#area_data').find(":selected").val();
      var region_data = $('#region_data').find(":selected").val();
      var AddressDetails = $('#AddressDetails').val();
      var Note = $('#Note').val();
      var _token ='{{csrf_token()}}';

      $.ajax({
        url: "store_orginzation",
        type:"POST",
        data:{
            SponsorName:SponsorName,
            orgnization_id:orgnization_id,
            MobileNo1:MobileNo1,
            MobileNo2:MobileNo2,
            LisenceNo:LisenceNo,
            personInCharge:personInCharge,
            faxNo:faxNo,
            EmailAddress:EmailAddress,          
            phone1:phone1,
            website:website,
            phone2:phone2,
            type,type,
            PositionID:PositionID,
            CityID:CityID, 
            area_data:area_data,            
            region_data:region_data,            
            AddressDetails:AddressDetails,            
            Note:Note,                       
            _token: _token ,       
         },

        success:function(response){
            $('.success_alert').css('visibility', 'visible');

            setTimeout(function() {
                $('.wtbl').DataTable().ajax.reload();    
            $('.success_alert').fadeOut();
            }, 3000 ); 
            $(".loader").addClass('hide');
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

            if(response.responseJSON.errors.SponsorName){
                $( "#SponsorName" ).addClass( "error" );
            }
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



</script>
@endsection