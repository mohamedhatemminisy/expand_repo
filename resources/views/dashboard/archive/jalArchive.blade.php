@extends('layouts.admin')
@section('content')
<div class="content-body">
    <section id="hidden-label-form-layouts">
    <form method="post" id="formDataaa" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />
                            {{trans('archive.out_archive')}} 
                        </h4>
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
                                                            <span class="input-group-text" id="basic-addon1"
                                                                style="width: 81px; ">
                                                                اسم الاجتماع
                                                            </span>
                                                        </div>
                                                        <input type="hidden" id="meetingID" name="meetingID" value="0">
                                                        <input type="hidden" id="lastorder" name="lastorder" value="1">
                                                        <input type="hidden" name="customerName" value="agenda_archieve">
                                                        <select type="text" id="archive_type" name="archive_type"
                                                            class="form-control alphaFeild"
                                                            style="height: 34px !important;width: 115px;"
                                                            aria-invalid="false"
                                                           >
                                                            <option disabled selected> -- اختر -- </option> 
                                                            @if(count($archive_type)>0)
                                                            @foreach($archive_type as $archive)
                                                            <option value="{{$archive->id}}">{{$archive->name}}</option>

                                                            @endforeach
                                                            @endif                                                    
                                                        </select>

                                                        <div class="input-group-append" onclick="QuickAdd(42,'OrgType','نوع الاجتماع')" style="cursor:pointer">
                                                                <span class="input-group-text input-group-text2">
                                                                    <i class="fa fa-external-link"></i>
                                                                </span>
                                                        </div>
                                                        
                                                        
                                                        <input type="hidden" id="customerid" name="customerid" value="0">
                                                        
                                                        <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                                        <input type="hidden" id="url" name="url" value="<?php echo $url ?>">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('archive.datejal')}}                                                                
                                                            </span>
                                                        </div>
                                                        <input type="text" id="msgDate" name="msgDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 pr-0 pr-s-12 copyto"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('admin.related_to')}}
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
                                            <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                {{trans('archive.numjal')}}
                                                               
                                                            </span>
                                                        </div>
                                                        <input type="text" id="msgid" name="msgid" class="form-control eng-sm valid" style="text-align: left;direction: ltr;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
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
   $('#formDataaa').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
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
							+'				 {{trans('admin.related_to')}}'
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
    }
  
</script>
@endsection
@endsection
