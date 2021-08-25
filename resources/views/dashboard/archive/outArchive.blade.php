@extends('layouts.admin')
@section('content')
<div class="content-body">
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><img src="images/report32.png" />أرشيف الصادر </h4>
                    </div>
                    <div class="card-body">
                        <form id="formDataaa" onsubmit="return false">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                صادر إلى
                                                            </span>
                                                        </div>
                                                        <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                        <input type="hidden" id="customerid" name="customerid" value="0">
                                                        <input type="hidden" id="customerType" name="customerType" value="0">
                                                        <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                                        <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">
                                                        <!-- 2166  -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                تاريخ الإرسال
                                                            </span>
                                                        </div>
                                                        <input type="text" id="msgDate" name="msgDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                عنوان المراسلة
                                                            </span>
                                                        </div>
                                                        <input type="text" id="msgTitle" class="form-control" name="msgTitle">
                                                        <input type="hidden" id="OrgType" class="form-control" name="OrgType" value="2076">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                رقم المراسلة
                                                            </span>
                                                        </div>
                                                        <input type="text" id="msgid" name="msgid" class="form-control eng-sm valid" style="text-align: left;direction: ltr;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="checkbox" name="copyTo" onclick="$('.copyto').toggle()"> نسخ إلى
                                            </div>
                                            <div class="col-md-12 pr-0 pr-s-12 copyto hide"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                نسخة إلى
                                                            </span>
                                                        </div>
                                                        <input type="text" id="copyToText[]" class="form-control cust" name="copyToText[]">
                                                        <input type="hidden" id="copyToID[]" name="copyToID[]" value="0">
                                                        <input type="hidden" id="copyToType[]" name="copyToType[]" value="0">
                                                        <div class="input-group-append" onclick="addRec()" style="cursor:pointer">
                                                            <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-plus"></i>
                                                            </span>
                                                        </div>
                                                        <!-- 2166  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12 pr-0 pr-s-12"  >
                                        <div class="row attachs-body">
                                            <div class="form-group col-12 mb-2">
                                                <input type="hidden" name="fromname" value="formDataaa">
                                                <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" onchange="doUploadAttach('formDataaa')" 
                                                style="display: none" >
                                                <div class="row formDataaaFilesArea" style="margin-left: 0px;">
                                                </div>
                                                <div class="row formDataaaLinkArea" style="margin-left: 0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-12 pr-0 pr-s-12"  >
                                        <img src="images/upload.png" width="40" height="40" style="cursor:pointer" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">
                                        <!-- <a onclick="showLinkModal('formDataaa')" class="attach-icon">
                                            <img src="images/hyper.png" width="35" height="35" style="cursor:pointer">
                                        </a>-->
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <button type="button" class="btn btn-primary" id="" style="" onclick="SaveMasterArch()">
                                    حفظ    
                                    </button>
                                    
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@include('dashboard.component.fetch_table');
@endsection

@section('script')

<script>

$( function() {
    $( ".cust" ).autocomplete({
		source: 'archive_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            let equip_id = ui.item.id
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "equip_info",
            data: {
                equip_id: equip_id,
            },
            success:function(response){
            $('#equpiment_id').val(response.info.id);
            $('#Equipment').val(response.info.name);
            $('#SerialNo').val(response.info.serial_number);
            $('#InternalNo').val(response.info.internal_number);
            $('#PiceCnt').val(response.info.count);
            $('#dateinput').val(response.info.selling_date);
            $('#Wdateinput').val(response.info.wdate_input);
            $('#OrgSalary2').val(response.info.price);
            $('#MantinanceNote').val(response.info.notes);
            $("#AddressDetailsAR").val(response.info.address);
            $("#PHnum2").val(response.info.sponsor_phone);
            $("#PHnum1").val(response.info.supply_phone);

            $("select#brand option")
                 .each(function() { this.selected = (this.text == response.brand); 
            });
            $("select#Eqtype option")
                 .each(function() { this.selected = (this.text == response.type); 
            });

            $("select#EqtStatus option")
                 .each(function() { this.selected = (this.text == response.status); 
            });
            $("select#Department option")
                 .each(function() { this.selected = (this.text == response.department); 
            });
            $("select#pinc3 option")
                 .each(function() { this.selected = (this.text == response.admin); 
            });

            $("select#OrgCurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency); 
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

</script>
@endsection
