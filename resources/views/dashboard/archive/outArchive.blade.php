@extends('layouts.admin')
@section('content')
<div class="content-body">
    <section id="hidden-label-form-layouts">
    <form method="post" id="archive-form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />
                            @if ($type=='outArchive')
                            {{trans('archive.out_archive')}} 
                            @elseif ($type=='inArchive')
                            {{trans('archive.in_archive')}} 
                            @elseif ($type=='projArchive')
                            {{trans('archive.proj_archive')}}
                            @elseif ($type=='munArchive')
                            {{trans('archive.mun_archive')}} 
                            @elseif ($type=='empArchive')
                            {{trans('archive.emp_archive')}} 
                            @elseif ($type=='depArchive')
                            {{trans('archive.dep_archive')}} 
                            @elseif ($type=='assetsArchive')
                            {{trans('archive.assets_archive')}} 
                            @elseif ($type=='citArchive')
                            {{trans('archive.cit_archive')}} 
                            @endif
                           
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="formDataaa" action="{{  url('store_archive') }}" onsubmit="return false">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                @if ($type=='outArchive')
                                                                {{trans('archive.export_to')}} 
                                                                @elseif ($type=='inArchive')
                                                                {{trans('archive.import_from')}} 
                                                                @elseif ($type=='projArchive'||'munArchive')
                                                                {{trans('archive.title')}} 
                                                                @endif
                                                            </span>
                                                            
                                                        </div>
                                                        
                                                        @if($type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive')
                                                            <input type="text" id="msgTitle" class="form-control" name="msgTitle" style="width: 30%;">
                                                            <select name="archive_type" id="archive_type" class="form-control">
                                                                    
                                                                <option value="">-- نوع الارشيف --</option>
                                                                @foreach($archive_type as $archive)
                                                                <option value="{{$archive->id}}"> {{$archive->name}}   </option>
                                                                @endforeach

                                                            </select>
                                                            <div class="input-group-append" onclick="QuickAdd(42,'OrgType','نوع الأرشيف')" style="cursor:pointer">
                                                                <span class="input-group-text input-group-text2">
                                                                    <i class="fa fa-external-link"></i>
                                                                </span>
                                                            </div>
                                                        @elseif ($type=='inArchive'||$type=='outArchive')
                                                        <input type="text" id="customerName" class="form-control cust" name="customerName" style="width: 30%;">
                                                        @endif
                                                        <input type="hidden" id="customerid" name="customerid" value="0">
                                                        <input type="hidden" id="customername" name="customername" value="0">
                                                        <input type="hidden" id="customerType" name="customerType" value="0">
                                                        <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                                        <input type="hidden" id="url" name="url" value="<?php echo $url ?>">
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
                                                                @if ($type=='projArchive'||$type=='munArchive')
                                                                {{trans('archive.date')}}
                                                                @elseif ($type=='outArchive'||'inArchive')  
                                                                {{trans('archive.date_send')}}
                                                                @endif
                                                                
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
                                                                @if ($type=='projArchive')
                                                                {{trans('archive.proj_name')}} 
                                                                @elseif($type=='empArchive')
                                                                {{trans('archive.name_emp')}}
                                                                @elseif ($type=='depArchive')  
                                                                {{trans('archive.name_dep')}}
                                                                @elseif ($type=='citArchive')  
                                                                {{trans('archive.name_cit')}}
                                                                @elseif ($type=='assetsArchive')  
                                                                {{trans('archive.name_assets')}}
                                                                @elseif ($type=='munArchive')  
                                                                {{trans('admin.related_to')}}
                                                                @elseif ($type=='outArchive'||$type=='inArchive')  
                                                                {{trans('archive.title_send')}}
                                                                @endif
                                                            </span>
                                                        </div>
                                                        @if($type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive')
                                                        <input type="text" id="customerName" class="form-control cust" name="customerName" style="width: 30%;">
                                                        @elseif ($type=='inArchive'||$type=='outArchive')
                                                        <input type="text" id="msgTitle" class="form-control" name="msgTitle">
                                                        @endif
                                                        <input type="hidden" id="OrgType" class="form-control" name="OrgType" value="2076">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                @if ($type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='depArchive'||$type=='assetsArchive'||$type=='citArchive')
                                                                {{trans('archive.num')}}
                                                                @elseif ($type=='outArchive'||$type=='inArchive')  
                                                                {{trans('archive.num_send')}}
                                                                @endif
                                                                
                                                            </span>
                                                        </div>
                                                        <input type="text" id="msgid" name="msgid" class="form-control eng-sm valid" style="text-align: left;direction: ltr;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="checkbox" name="copyTo" onclick="$('.copyto').toggle()"> {{trans('archive.copy_to')}}
                                            </div>
                                            <div class="col-md-8 pr-0 pr-s-12 copyto hide"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('archive.copy_to')}}
                                                            </span>
                                                        </div>
                                                        <input type="text" id="copyToText[]" class="form-control cust_auto" name="copyToText[]">
                                                        <input type="hidden" id="copyToID[]" name="copyToID[]" value="0">
                                                        <input type="hidden" id="copyToCustomer[]" name="copyToCustomer[]" value="0">
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
                                                <div class="progress">
                                                    <div class="bar"></div >
                                                    <div class="percent">0%</div >
                                                </div>
                                                <input type="hidden" name="fromname" value="formDataaa">
                                                <meta name="csrf-token" content="{{ csrf_token() }}" />

                                                <input type="file" class="form-control-file" id="formDataaaupload-file[]" multiple="" name="formDataaaUploadFile[]" onchange="doUploadAttach('archive-form')" 
                                                style="display: none" >
                                                <div class="row formDataaaFilesArea" style="margin-left: 0px;">
                                                </div>
                                                <div class="row formDataaaLinkArea" style="margin-left: 0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-12 pr-0 pr-s-12"  >
                                        <img src="{{asset('assets/images/ico/upload.png')}}" width="40" height="40" style="cursor:pointer" onclick="document.getElementById('formDataaaupload-file[]').click(); return false">
                                        <!-- <a onclick="showLinkModal('formDataaa')" class="attach-icon">
                                            <img src="images/hyper.png" width="35" height="35" style="cursor:pointer">
                                        </a>-->
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" id="" style="" >
                                    {{ trans('admin.save') }}    
                                    </button>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
      </form>
    </section>
</div>
@include('dashboard.component.fetch_table');
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
     $( "#customerName" ).removeClass( "error" );
       $.ajax({
          type:'POST',
          url: "store_archive",
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
               $(".formDataaaFilesArea").html('');
           },
           error: function(response){
            Swal.fire({
				position: 'top-center',
				icon: 'error',
				title: '{{trans('admin.error_save')}}',
				showConfirmButton: false,
				timer: 1500
				})
            if(response.responseJSON.errors.customerName){
                $( "#customerName" ).addClass( "error" );
            }
           }
       });
  });
  $( function() {
    $( ".cust_auto" ).autocomplete({
		source: 'archive_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            var currentIndex=$("input[name^=copyToID]").length -1;
            $('input[name="copyToID[]"]').eq(currentIndex).val(ui.item.id);
            $('input[name="copyToCustomer[]"]').eq(currentIndex).val(ui.item.name);
            $('input[name="copyToType[]"]').eq(currentIndex).val(ui.item.model);
        }
	});
});
$( function() {
    $( ".cust" ).autocomplete({
		source: 'archive_auto_complete',
		minLength: 1,
		
        select: function( event, ui ) {
            console.log(ui.item);
            $('#customerid').val(ui.item.id);
            $('#customerName').val(ui.item.name);
            $('#customername').val(ui.item.name);
            $('#customerType').val(ui.item.model);
           }
	    });
    });
    function update($id){
        let archive_id = $id;
        $(".formDataaaFilesArea").html('');
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "{{ route('archieve_info') }}",
            data: {
                archive_id: archive_id,
            },
            success:function(response){
            $('#customerid').val(response.info.id);
            $('#customerName').val(response.info.name);
            $('#customername').val(response.info.name);
            $('#customerType').val(response.info.model_name);
            $('#msgTitle').val(response.info.title);
            $('#msgDate').val(response.info.date);
            $('#msgid').val(response.info.serisal);
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
    function CopyRec(id){
        
		var formData =  {'id':id};
		$.ajax({
			url:'c_archive/GetMunArchByID',
			type: 'POST',
			data: formData,
			dataType:"json",
			async: true,
			success: function (data) {
			    if(data.inCharge.length>0){
			        
                    for(i=0;i<data.inCharge.length;i++){
                        attach='';
                        for(j=0;j<data.inCharge[i].attach.length;j++)
                            attach+='<div id="attach'+data.inCharge[i].attach[j].ID+'" class=" col-sm-6 ">'
                                    +'  <div class="attach">'
                                        +'<span class="attach-text">'+data.inCharge[i].attach[j].AttachName+'</span><a onclick="delAttach('+data.inCharge[i].attach[j].ID+')"><i class="fa fa-trash"></i></a>'
                                        +'<a class="attach-close1" href="'+realPath+'uploads/'+data.inCharge[i].attach[j].AttachServerName+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'  <i class="fa fa-eye"> </i>'
                                        +'</a><input type="hidden" value="'+data.inCharge[i].attach[j].pk_i_id+'" name="attach[]" >'
                                        +'</div>'
                                    +'</div>';
                        $(".formDataaaFilesArea").html(attach)
                        $("#pk_i_id").val(data.inCharge[i].pk_i_id)
                        d=new Date(data.inCharge[i].arch_date);
                        $("#msgDate").val(d.getDate()+'/'+((d.getMonth()+1)<10?'0'+(d.getMonth()+1):(d.getMonth()+1))+'/'+d.getFullYear())
                        $("#customerName").val(data.inCharge[i].receiver_name)
                        $("#msgTitle").val(data.inCharge[i].arch_title)
                        $("#msgid").val(data.inCharge[i].arch_no)
                        
                    }
			    }
			    else
			        alert('لا يوجد بيانات')
			},
			error:function(){
			},
		});
    }
    function addRec(){
        $('.copyto').append('<div class="form-group">'
                            +'    <div class="input-group w-s-87">'
                            +'        <div class="input-group-prepend">'
							+'			<span class="input-group-text" id="basic-addon1">'
							+'				 {{trans('archive.copy_to')}}'
							+'			</span>'
                            +'        </div>'
                            +'        <input type="text" id="copyToText[]" class="form-control cust_auto ui-autocomplete-input" name="copyToText[]" autocomplete="off">'
                            +'        <input type="hidden" id="copyToID[]" name="copyToID[]" value="0">'
                            +'        <input type="hidden" id="copyToCustomer[]" name="copyToCustomer[]" value="0">'
                            +'        <input type="hidden" id="copyToType[]" name="copyToType[]" value="0">'
                            +'        <div class="input-group-append" onclick="$(this).parent().parent().remove()" style="cursor:pointer">'
                            +'            <span class="input-group-text input-group-text2">'
                            +'                <i class="fa fa-trash"></i>'
                            +'            </span>'
                            +'        </div>'
                            +'    </div>'
                            +'</div>')
    }
    function doUploadAttach(formDataStr)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
<<<<<<< HEAD
=======

>>>>>>> 206070f0f1d65bfb6003d5c4a9a5646439b8e543
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($("#"+formDataStr)[0]);
        console.log(formData);
        $.ajax({
            url: 'uploadAttach',
            type: 'POST',
            data: formData,
            dataType:"json",
            async: true,
            success: function (data) {
                row='';
                row1='';
                if(data.status.success){
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
<<<<<<< HEAD
=======

>>>>>>> 206070f0f1d65bfb6003d5c4a9a5646439b8e543
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
<<<<<<< HEAD
=======

>>>>>>> 206070f0f1d65bfb6003d5c4a9a5646439b8e543
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
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 206070f0f1d65bfb6003d5c4a9a5646439b8e543
