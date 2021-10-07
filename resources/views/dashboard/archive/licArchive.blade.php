@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
<div class="content-body">
        <section id="hidden-label-form-layouts">
            <form method="post" id="formDataaa" enctype="multipart/form-data">
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
                                                            اسم صاحب الرخصة
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

                                        <div class="col-lg-5 col-md-12 pr-0 pr-s-12"  >
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
                                    </div>
                                    <div class="row">
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
                                                    onchange="doUploadAttach('formDataaa')"
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
                    <div class="card lSide" style="min-height:302.2px;">
                        <div class="card-header">
                            <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />مرفقات الرخصة </h4>
                        </div>
                        <div class="card-body" id="attachList">
                            <div class="row formDataaaFilesArea" style="margin-left: 0px;">
                            </div>
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

   $('#formDataaa').submit(function(e) {
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
                $(".formDataaaFilesArea").html('');
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
            row='';
                if(response.files){
                    var j=0;
                    for(j=0;j<response.files.length;j++){
                        shortCutName=response.files[j].real_name;
                        shortCutID=response.files[j].id;
                        urlfile='{{ asset('') }}';
                        urlfile+=response.files[j].url;
                        formDataStr="formDataaa";
                            shortCutName=shortCutName.substring(0, 20)
                            row+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><i class="fa fa-eye"></i></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="'+formDataStr+'imgUploads[]" name="'+formDataStr+'imgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="'+formDataStr+'orgNameList[]" name="'+formDataStr+'orgNameList[]" value="'+shortCutName+'">'
								+'             <input type="hidden" id="'+formDataStr+'orgIdList[]" name="'+formDataStr+'orgIdList[]" value="'+shortCutID+'">'
							    +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $(".formDataaaFilesArea").html(row)
                }

            },
        });
    }




</script>
@endsection
