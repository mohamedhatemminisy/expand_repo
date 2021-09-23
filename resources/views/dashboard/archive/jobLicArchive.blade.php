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
                                رخص الحرف و الصناعات
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
                                                             اسم المشترك 
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
                                        <div class="col-lg-5 col-md-12 pr-0"  >
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
    													<span class="input-group-text" id="basic-addon1">
    														نوع الحرفة
    													</span>
                                                    </div>
                                                    <select class="form-control" name="licType" id="licType">
                                                        @foreach($craftType as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append" onclick="QuickAdd(66,'licType','نوع الحرفة')" style="cursor:pointer; margin-left: 0px !important;">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 pr-0 pr-s-12">
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            تصنيف الرخصة
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="lic_cat" id="lic_cat">
                                                        @foreach($licenseRating as $rate)
                                                        <option value="{{$rate->id}}">{{$rate->name}}</option>
                                                        @endforeach
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
                                                    
                                                    <select class="form-control" name="LicBorder" id="LicBorder1">
                                                     @foreach($limitNumber as $number)
                                                        <option value="{{$number->id}}">{{$number->name}}</option>  
                                                        @endforeach                                                      
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
                                </div>
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
                                                    <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" 
                                                    onchange="doUploadAttach('archive-form')" 
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
          url: "store_jobLic_archieve",
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
            url: "{{ route('job_Lic_info') }}",
            data: {
                archive_id: archive_id,
            },
            success:function(response){
                console.log(response.info);
            $('#customerid').val(response.info.model_id);
            $('#customername').val(response.info.name);
            $('#customerName').val(response.info.name);

            $('#customerType').val(response.info.model_name);
            $('#licNo').val(response.info.license_number);
            $('#businessName').val(response.info.trade_name);
            $('#startAt').val(response.info.start_date);
            $('#endAt').val(response.info.expiry_ate);

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

    function doUploadAttach(formDataStr)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($("#"+formDataStr)[0]);
        $.ajax({
            url: 'uploadAttach',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                row='';
                row1='';
                // var len = data.files.length;
                console.log(data.all_files);
                if(data){

                    for(j=imgCounter;j<data.img.length;j++){
            if(data.img[j].type==1 ) {
                shortCutName=data.img[j].orgname;
                            shortCutName=shortCutName.substring(0, 40)
                            row+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+realPath+'uploads/'+data.img[j].name+'" style="color: #74798D; float:left;" target="_blank"><i class="fa fa-eye"></i></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="'+formDataStr+'imgUploads[]" name="'+formDataStr+'imgUploads[]" value="'+data.img[j].name+'">'
                                +'             <input type="hidden" id="'+formDataStr+'orgNameList[]" name="'+formDataStr+'orgNameList[]" value="'+data.img[j].orgname+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
            }
                        if(data.img[j].type==2 ) {
            row1+='<div  class="col-sm-2" id="i'+(j+1)+'">'
                +'     <div class="row"  onmouseover="$(this).children().first().children().first().next().show()"  onmouseout="$(this).children().first().children().first().next().hide()">'
                                +'         <div class="col-sm-12" style="height: 80px;">'
                                +'         <a class="group1" href="'+realPath+'uploads/'+data.img[j].name+'" title="'+data.img[j].orgname+'" style="color: #74798D" >' +
                                '                <img src="'+realPath+'uploads/'+data.img[j].name+'" title="'+data.img[j].orgname+'" id="imgSlider'+(j+1)+'" style="max-height:80px;"/></a>'
                                +'           <a class="attach-close" style="color: #74798D" onclick="$(this).parent().parent().parent().remove()" ><i class="fa fa-times"></i></a>'
                                +'             <input type="hidden" id="'+formDataStr+'imgUploads[]" name="'+formDataStr+'imgUploads[]" value="'+data.img[j].name+'">'
                                +'             <input type="hidden" id="'+formDataStr+'orgNameList[]" name="'+formDataStr+'orgNameList[]" value="'+data.img[j].orgname+'">'
                                +'         </div>'
                +'     </div>'
                +'</div>'
                        }
                    }
                    //$(".attachs-carousel-container").html(row)
                    $(".alert-danger").addClass("hide");
                    $(".alert-success").removeClass('hide');
                    $("#succMsg").text(data.status.msg)
        $("."+formDataStr+"FilesArea").append(row)
        $("."+formDataStr+"ImagesArea").append(row1)
                    $(".loader").addClass('hide');
                    document.getElementById(""+formDataStr+"upload-file[]").value="";
                    document.getElementById(""+formDataStr+"upload-image[]").value="";
                    $(".group1").colorbox({rel:'group1'});
                    setTimeout(function(){
                        $(".alert-danger").addClass("hide");
                        $(".alert-success").addClass("hide");
                    },2000)
                }
                else {
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    $("#errMsg").text(data.status.msg)
                }
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
            },
            error:function(){
                $(".alert-success").addClass("hide");
                $(".alert-danger").removeClass('hide');
                $("#errMsg").text(data.status.msg)
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
  

</script>
@endsection
