@extends('layouts.admin')
@section('content')

<section id="hidden-label-form-layouts">
<form method="post" id="vehicle-form" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card leftSide" style="min-height:544.562px">
                <div class="card-header">
                    <h4 class="card-title">
                        <img src="https://db.expand.ps/images/car.png" width="32" height="32"> {{trans('assets.vehicles_header')}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 ">
                                <div class="form-group">
                                    <div class="input-group w-s-87">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                {{trans('assets.vehicles_name')}}
                                            </span>
                                        </div>

                                        <input type="text" id="Vehiclename" class="form-control ac ui-autocomplete-input" placeholder=" {{trans('assets.vehicles_name')}}" name="Vehiclename" autocomplete="off">
                                        <input type="hidden" id="vehicle_id" name="vehicle_id" value="">
                                    </div>
                                    <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group w-s-87">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                {{trans('assets.plate')}}
                                            </span>
                                        </div>
                                        <input type="text" id="plateNo" class="form-control" placeholder="" name="plateNo">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{trans('assets.vehicles_brand')}}
                                                </span>
                                            </div>
                                            <select type="text" id="vehiclebrand" name="vehiclebrand" class="form-control">
                                            <optgroup label=" ">
                                            @foreach($vehicleBrands as $bra)
                                              <option value="{{$bra->id}}"> {{$bra->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                        <div class="input-group-append" onclick="QuickAdd(25,'Vehcilebrand','{{trans('assets.vehicles_brand')}}')">
                                            <span class="input-group-text input-group-text2">
                                                <i class="fa fa-external-link"></i>
                                            </span>
                                        </div>

                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <img src="https://db.expand.ps/images/car.png" id="carimg" width="150" height="100" style="cursor: pointer;" onclick="document.getElementById('formDataimgPic3').click(); return false">


                                <input type="hidden" id="carimgpath" name="carimgpath">
                                <input type="file" class="form-control-file" id="formDataimgPic3" name="imgPic" style="display: none" onchange="doUploadPic1('formData2','carimg','carimgpath')">

                            </div>

                            <div class="col-lg-8 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            {{trans('assets.vehicles_type')}}
                                        </span>
                                        </div>
                                        <select type="text" id="vehicletype" name="vehicletype" class="form-control">
                                        <optgroup label=" ">
                                            <?php $types=$type;?>
                                            @foreach($vehicleTypes as $type)
                                              <option value="{{$type->id}}"> {{$type->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                        <div class="input-group-append" onclick="QuickAdd(26,'Vehciletype','{{trans('assets.vehicles_type')}}')">
                                            <span class="input-group-text input-group-text2">
                                                <i class="fa fa-external-link"></i>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12" style="padding: 0 !important;">
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="https://db.expand.ps/images/gas-station.png" width="15px" height="15px">
                                                    {{trans('assets.fuel')}}
                                                </span>
                                            </div>
                                        

                                            <select type="text" id="oiltype" name="oiltype" class="form-control">
                                                <option> - </option>
                                                <option value="petrol">{{trans('admin.petrol')}}  </option>
                                                <option value="diesel"> {{trans('admin.diesel')}}  </option>
                                        </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>

                        <div class="row" style="margin-left: 0">
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext1" style="display: block">
                                <label class="sr-only" for="dateinput21">{{trans('assets.date_sale')}}</label>
                                {{trans('assets.date_sale')}} :<br>
                                <input type="text" id="dateinput21" name="dateinput21" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext2" style="display: block">
                                <label class="sr-only" for="Wdateinput22">{{trans('assets.date_end')}}</label>
                                {{trans('assets.date_end')}}<br>
                                <input type="text" id="Wdateinput22" name="Wdateinput22" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext3" style="display: block;padding-left: 0px;">
                                <label class="sr-only" for="CW">{{trans('assets.all_price')}}</label>
                                {{trans('assets.all_price')}} :<br>

                                <input id="OrgSalary3" name="OrgSalary" class="form-control numFeild " placeholder="00.00" style="border-radius: 0rem !important;height: 38px;width: 50%;float: right;">
                                <select id="OrgCurrencyID3" name="OrgCurrencyID3" type="text" class="form-control" style="height: 38px !important;width: 50%;float: right;">
                                    <option> - </option>
                                    <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>
                                    <option value="dollar"> {{trans('admin.dollar')}} </option>
                                    <option value="dinar">{{trans('admin.dinar')}}  </option>
                                    <option value="euro">{{trans('admin.euro')}}  </option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 0">
                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext4" style="display: block">
                                                            <label class="sr-only" for="licensedate"></label>
                                                            {{trans('assets.date_lic_end')}} :<br>
                                                            <input type="text" id="licensedate" name="licensedate" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext12" style="display: block">
                                                            <label class="sr-only" for="Inshurencedate"></label>
                                                            {{trans('assets.sure_end')}} :<br>
                                                            <input type="text" id="Inshurencedate" name="Inshurencedate" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext13" style="display: block;padding-left: 0px;">
                                                            <label class="sr-only" for="pinc2"></label>
                                                            {{trans('assets.manager')}}<br>
                                                            <select id="pinc2" name="pinc2" class="form-control" style="border-radius:3px !important;height:36px !important;">
                                                            <optgroup label=" ">
                                                                @foreach($admins as $admin)
                                                                <option value="{{$admin->id}}"> {{$admin->name}} </option>
                                                                @endforeach
                                                            </select>
                                                            </optgroup>
                                                        </div>
                                                    </div>
                                                    
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card rightSide">
                <div class="card-header">
                    <h4 class="card-title">
                        <img src="https://db.expand.ps/images/sponsor.png" width="32" height="32">{{trans('assets.suplier_v_header')}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
    {{trans('assets.dept')}}
</span>
                                    </div>
                                    <select type="text" id="Department" name="Department" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($departments as $department)
                                              <option value="{{$department->id}}"> {{$department->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" style="    padding-left: 10px;">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
    {{trans('assets.manager')}}
</span>
                                    </div>
                                    <select type="text" id="pinc3" name="pinc3" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($admins as $admin)
                                              <option value="{{$admin->id}}"> {{$admin->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="display:none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group" style="width: 99% !important;">
                                    <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
    {{trans('assets.address_detail')}}
</span>
                                    </div>
                                    <textarea type="text" id="AddressDetailsAR" class="form-control" placeholder="تفاصيل العنوان" name="AddressDetailsAR" style="height: 35px;"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group" id="vehicledvtext14" style="display:block;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            {{trans('assets.company_s')}}
                                        </span>
                                    </div>

                                    <select onchange="getSupplierInfo($(this).val(),'formData2 #PHnum1')" type="text" id="Supplier" name="Supplier" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}"> {{$supplier->name}}  </option>
                                            @endforeach
                                        </optgroup>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                        <img src="https://db.expand.ps/images/jawwal35.png">
                                        </span>
                                    </div>
                                    <input type="text" id="PHnum1" name="PHnum1" maxlength="10" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1">

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
                                            {{trans('assets.company_sp')}}
                                        </span>
                                    </div>
                                    <select onchange="getSponserInfo($(this).val(),'formData2 #PHnum2')" type="text" id="Sponsor" name="Sponsor" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($sponsers as $sponser)
                                            <option value="{{$sponser->id}}"> {{$sponser->name}}  </option>
                                            @endforeach
                                        </optgroup>
                                        </select>                                    <div class="input-group-append hide">
                                        <a class="input-group-text input-group-text2" href="https://db.expand.ps/addSponsor">
                                        <i class="fa fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                        <img src="https://db.expand.ps/images/jawwal35.png">
                                        </span>
                                    </div>
                                    <input type="text" id="PHnum2" name="PHnum2" maxlength="10" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="display: none">
                        <div class="col-md attachs-section">
                            <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
                            <span class="attach-header">{{trans('assets.archive')}}
                            <span id="attach-required">*</span>
                            <span class="attach-icons">
                                <a href="#" onclick="document.getElementById('formData2upload-file[]').click(); return false" class="attach-icon"><i class="fas fa-paperclip"></i></a>
                                <a href="#" onclick="document.getElementById('formData2upload-image[]').click(); return false" class="attach-icon"><i class="far fa-image"></i></a>
                                <a onclick="showLinkModal('formData2')" class="attach-icon"><i class="fas fa-link"></i></a>
                            </span>
                        </span>
                        </div>
                    </div>
                    <div class="row attachs-body" style="display: none">
                        <div class="form-group col-12 mb-2">
                            <input type="hidden" name="fromname" value="formData2">
                            <input type="file" class="form-control-file" id="formData2upload-file[]" multiple="" name="formData2UploadFile[]" onchange="doUploadAttach('formData2')" style="display: none" accept=".doxc, .xlsx, .pptx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                            <input type="file" class="form-control-file" id="formData2upload-image[]" multiple="" name="formData2UploadImage[]" onchange="doUploadAttach('formData2')" accept="image/*" style="display: none">
                            <div class="row formData2ImagesArea">
                            </div>
                            <div class="row formData2FilesArea" style="margin-left: 0px;">
                            </div>
                            <div class="row formData2LinkArea" style="margin-left: 0px;">
                            </div>
                        </div>
                    </div>
                    
                        <div class="card-header" style="padding-top:0px;">
                            <h4 class="card-title">
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32"> 
                                {{trans('assets.archive')}}
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
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#msgModal').modal('show')" style="cursor:pointer">
                                            <div class="form-group">
                                                <a onclick="$('#msgModal').modal('show')" style="color:#000000">{{trans('assets.archive')}}
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-actions" style="border-top:0px;">
                        <div class="text-right">
                            
                        <button type="submit" class="btn btn-primary">{{trans('assets.save')}} <i class="ft-thumbs-up position-right"></i></button>
                        <button type="reset" class="btn btn-warning"> {{trans('assets.reset')}} <i class="ft-refresh-cw position-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
<?php $type=$types;?>
@include('dashboard.component.fetch_table');

@stop

@section('script')
<script>
$( function() {
    $( ".ac" ).autocomplete({
            source: 'vehicle_auto_complete',
            minLength: 1,
            
            select: function( event, ui ) {
                let vehcile_id = (ui.item.id);
                $.ajax({
                type: 'get', // the method (could be GET btw)
                url: "vehcile_info",
                data: {
                    vehcile_id: vehcile_id,
                },
                success:function(response){
                $('#vehicle_id').val(response.info.id);

                $('#Vehiclename').val(response.info.name);
                $('#plateNo').val(response.info.serial_number);
                $('#dateinput21').val(response.info.selling_date);
                $('#Wdateinput22').val(response.info.wdateinput);
                $('#licensedate').val(response.info.licensedate);
                $('#OrgSalary3').val(response.info.price);
                $('#Inshurencedate').val(response.info.Inshurencedate);
                $("#PHnum2").val(response.info.sponsor_phone);
                $("#PHnum1").val(response.info.supply_phone);
                $('#carimg').attr('src', response.info.image);
                $("#msgStatic").html(response.ArchiveCount);

                $("select#vehiclebrand option")
                    .each(function() { this.selected = (this.text == response.brand); 
                });
                $("select#vehicletype option")
                    .each(function() { this.selected = (this.text == response.type); 
                });

                $("select#EqtStatus option")
                    .each(function() { this.selected = (this.text == response.status); 
                });
                $("select#Department option")
                    .each(function() { this.selected = (this.text == response.department); 
                });
                $("select#pinc2 option")
                    .each(function() { this.selected = (this.text == response.admin); 
                });
                $("select#pinc3 option")
                    .each(function() { this.selected = (this.text == response.admin_two); 
                });
                $("select#OrgCurrencyID3 option")
                    .each(function() { this.selected = (this.text == response.Currency); 
                });
                $("select#oiltype option")
                    .each(function() { this.selected = (this.text == response.oiltype); 
                });
                

                $("select#Supplier option")
                    .each(function() { this.selected = (this.text == response.supplyer); 
                });
                $("select#SponsorName option")
                    .each(function() { this.selected = (this.text == response.sponser); 
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
		var url = 'vehicle_auto_complete';
		$.ajax({
			type: 'GET',
			url: url,
			data: {
				vehicle: $(this).val()
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
            let vehcile_id = $(this).data("id");
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "vehcile_info",
            data: {
                vehcile_id: vehcile_id,
            },
            success:function(response){
            $('#vehicle_id').val(response.info.id);

            $('#Vehiclename').val(response.info.name);
            $('#plateNo').val(response.info.serial_number);
            $('#dateinput21').val(response.info.selling_date);
            $('#Wdateinput22').val(response.info.wdateinput);
            $('#licensedate').val(response.info.licensedate);
            $('#OrgSalary3').val(response.info.price);
            $('#Inshurencedate').val(response.info.Inshurencedate);
            $("#PHnum2").val(response.info.sponsor_phone);
            $("#PHnum1").val(response.info.supply_phone);

            $("select#vehiclebrand option")
                 .each(function() { this.selected = (this.text == response.brand); 
            });
            $("select#vehicletype option")
                 .each(function() { this.selected = (this.text == response.type); 
            });

            $("select#EqtStatus option")
                 .each(function() { this.selected = (this.text == response.status); 
            });
            $("select#Department option")
                 .each(function() { this.selected = (this.text == response.department); 
            });
            $("select#pinc2 option")
                 .each(function() { this.selected = (this.text == response.admin); 
            });
            $("select#pinc3 option")
                 .each(function() { this.selected = (this.text == response.admin_two); 
            });
            $("select#OrgCurrencyID3 option")
                 .each(function() { this.selected = (this.text == response.Currency); 
            });
            $("select#oiltype option")
                 .each(function() { this.selected = (this.text == response.oiltype); 
            });
            

            $("select#Supplier option")
                 .each(function() { this.selected = (this.text == response.supplyer); 
            });
            $("select#SponsorName option")
                 .each(function() { this.selected = (this.text == response.sponser); 
            });

         },
     });

    });
*/

$('#vehicle-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
     $( "#Vehiclename" ).removeClass( "error" );
     $( "#plateNo" ).removeClass( "error" );
     $( "#vehiclebrand" ).removeClass( "error" );
     $( "#oiltype" ).removeClass( "error" );
       $.ajax({
          type:'POST',
          url: "store_vehcile",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            $('.wtbl').DataTable().ajax.reload();
             if (response) {
               this.reset();
             }
              
           },
           error: function(response){
            if(response.responseJSON.errors.Vehiclename){
                $( "#Vehiclename" ).addClass( "error" );
            }
            if(response.responseJSON.errors.plateNo){
                $( "#plateNo" ).addClass( "error" );
            }
            if(response.responseJSON.errors.vehiclebrand){
                $( "#vehiclebrand" ).addClass( "error" );
            }
            if(response.responseJSON.errors.oiltype){
                $( "#oiltype" ).addClass( "error" );
            }
           }
       });
  });



</script>

@stop
