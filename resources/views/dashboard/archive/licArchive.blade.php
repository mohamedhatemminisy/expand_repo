@extends('layouts.admin')
@section('content')
<div class="content-body">
        <section id="hidden-label-form-layouts">
            <form method="post" id="archive-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="card rSide">
                        <div class="card-header">
                            <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />
                                @if ($type=='licArchive')
                                أرشيف رخص البناء
                                @elseif ($type=='licFileArchive')
                                أرشيف ملف الترخيص
                                @elseif ($type=='jobLicArchive')
                                رخص الحرف و الصناعات
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            @if ($type=='jobLicArchive')
                                                             اسم المشترك 
                                                            @else
                                                            اسم صاحب الرخصة
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                    <input type="hidden" id="customerid" name="customerid" value="0">
                                                    <input type="hidden" id="archieveid" name="archieveid" value="0">
                                                    <input type="hidden" id="customername" name="customername" value="0">
                                                    <input type="hidden" id="url" name="url" value="<?php echo $url ?>">
                                                    <input type="hidden" id="customerType" name="customerType" value="0">
                                                    <input type="hidden" id="msgType" name="msgType" value="">
                                                    <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">
                                                    <input type="hidden" id="type" name="type" value="{{$type}}">
                                                </div>
                                            </div>
                                        </div>
                                        @if ($type=='jobLicArchive')
                                        <div class="col-lg-5 col-md-12 pr-0"  >
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
    													<span class="input-group-text" id="basic-addon1">
    														نوع الحرفة
    													</span>
                                                    </div>
                                                    <select class="form-control" name="licType" id="licType">
                                                        <option value=""></option>
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(66,'licType','نوع الحرفة')" style="cursor:pointer; margin-left: 0px !important;">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            @if ($type=='licArchive')
                                                            رقم الرخصة
                                                            @elseif ($type=='licFileArchive')
                                                            رقم ملف الترخيص
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <input type="text" id="licNo" name="licNo" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                    @if ($type=='jobLicArchive')
                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            تصنيف الرخصة
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="lic_cat" id="lic_cat">
                                                        <option value=""></option>
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(49,'lic_cat','تصنيف رخصة')" style="cursor:pointer; margin-left: 0px !important;">
                                                    <span class="input-group-text input-group-text2">
                                                        <i class="fa fa-external-link"></i>
                                                    </span>
                                                </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            المنطقة
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="cityData" id="cityData" >
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12"  >
                                            <div class="form-group">
                                                <div class="input-group"> 
                                                    <div class="input-group-prepend">
    													<span class="input-group-text" id="basic-addon1">
    														رقم الحد
    													</span>
                                                    </div>
                                                    
                                                    <select class="form-control" name="LicBorder[]" id="LicBorder1" onchange="
                                                        <option value=""></option>                                                        
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(56,'licType','رقم الحد')" style="cursor:pointer; margin-left: 0px !important;">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            رقم الرخصة
                                                        </span>
                                                    </div>
                                                    <input type="text" id="licNo" name="licNo" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع الترخيص
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="BuildingTypeData" id="BuildingTypeData">
                                                                @foreach($license_type as $license)
                                                                <option value="{{$license->id}}"> {{$license->name}}   </option>
                                                                @endforeach
                                                    </select>
                                                
                                                    <div class="input-group-append" onclick="QuickAdd(16,'BuildingTypeData','نوع الترخيص')" style="cursor:pointer;max-width: 15px;
                                                    margin-left: 0px !important;
                                                    padding-left: 0px !important;
                                                    padding-right: 0px !important;
                                                    margin-right:15px;
                                                     ">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع البناء
                                                        </span>
                                                    </div>
                                                    



                                                    <select class="form-control" name="BuildingData" id="BuildingData">
                                                        <option value="2079">قائم</option>
                                                        <option value="2080">مقترح</option>
                                                        <option value="2081">قائم/مقترح</option>
                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12" style="min-width: 21%" >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            رقم الحوض
                                                        </span>
                                                    </div>
                                                    <input type="text" id="licn" class="form-control " name="licn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  style="min-width: 20%" >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            رقم القطعة
                                                        </span>
                                                    </div>
                                                    <input type="text" id="licnfile" class="form-control " name="licnfile">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                    @if ($type=="jobLicArchive")
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87" style="    width: 98% !important;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                الاسم التجاري
                                                            </span>
                                                        </div>
                                                        <input type="text" id="businessName" name="businessName" class="form-control eng-sm  valid" value="" placeholder="" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
    														<span class="input-group-text" id="basic-addon1">
    															تاريخ البداية
    														</span>
                                                        </div>
                                                        <input type="text" id="startAt" name="startAt" class="form-control" value="<?php echo date('d/m/Y')?>" onblur="calcRenew()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
    														<span class="input-group-text" id="basic-addon1">
    															تاريخ النهاية
    														</span>
                                                        </div>
                                                        <input type="text" id="endAt" name="endAt" class="form-control" value="31/03/<?php echo date('m')<=3?date('Y'):date('Y')+1; ?>" placeholder="" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                        <div class="row">
                                        <div class="col-lg-10 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع المرفق
                                                        </span>
                                                    </div>
                                                    
                                                    <select class="form-control" name="AttahType" id="AttahType">
                                                            @foreach($attachment_type as $attachment)
                                                            <option value="{{$attachment->id}}"> {{$attachment->name}}   </option>
                                                            @endforeach
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(46,'AttahType','نوع المرفق')" style="cursor:pointer">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">
                                                    </div>
                                                    <input type="hidden" name="fromname" value="formDataaa">
                                                    <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" onchange="doArchUploadAttach('formDataaa')" 
                                                    style="display: none" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: center;">
                                        
                                    <button type="submit" class="btn btn-primary" id="" style="" onclick="SaveMasterArch()">
                                        حفظ    
                                    </button>
                                        
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    @if ($type=='jobLicArchive')
                    <div class="card lSide" style="min-height:358.2px;">
                    @else
                    <div class="card lSide" style="min-height:302.2px;">
                    @endif
                        <div class="card-header">
                            <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />مرفقات الرخصة </h4>
                        </div>
                        <div class="card-body" id="attachList">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
@include('dashboard.component.fetch_table');
@endsection

@section('script')
<script>



$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#archive-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: "store_lince_archive",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            Swal.fire({
				position: 'top-center',
				icon: 'success',
				title: '{{trans('admin.data_added')}}',
				showConfirmButton: false,
				timer: 1500
				})

               this.reset();
               $('.wtbl').DataTable().ajax.reload();  
           },
           error: function(response){
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



$( function() {
    $( ".cust" ).autocomplete({
		source: 'Linence_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            console.log(ui.item.model);
            $('#customerid').val(ui.item.id);
            $('#customername').val(ui.item.name);
            $('#customerType').val(ui.item.model);
            $('#licNo').val(ui.item.licNo);
            $('#licn').val(ui.item.licn);
            $('#licnfile').val(ui.item.licnfile);
           }
	    });
    });
    function update($id){
        let archive_id = $id;
        $(".formDataaaFilesArea").html('');
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "{{ route('archieveLic_info') }}",
            data: {
                archive_id: archive_id,
            },
            success:function(response){
            $('#customerid').val(response.info.model_id);
            $('#customername').val(response.info.name);
            $('#customerName').val(response.info.name);

            $('#customerType').val(response.info.model_name);
            $('#licNo').val(response.info.licNo);
            $('#licn').val(response.info.licn);
            $('#licnfile').val(response.info.licnfile);
            $('#license_type').val(response.info.license_type);
            attach='';
            var i=1;
            if(response.info.fileIDS&&typeof(response.info.fileIDS)=="object"){ 
            response.info.fileIDS.forEach(file => {
                attach+='<div id="attach" class=" col-sm-6 ">'
                        +'<div class="attach">'
                            +'<span class="attach-text">مرفق '+i+'</span><a onclick="delAttach()"><i class="fa fa-trash"></i></a>'
                            +'<a class="attach-close1" href="'+file+'" style="color: #74798D; float:left;" target="_blank">'
                            +'  <i class="fa fa-eye"> </i>'
                            +'</a><input type="hidden" value="" name="attach[]" >'
                            +'</div>'
                        +'</div>';
                        i++;
                    });}
            $(".formDataaaFilesArea").html(attach)
            
            },
        });
    }
</script>
@endsection
