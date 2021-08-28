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
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            اسم صاحب الرخصة
                                                        </span>
                                                    </div>
                                                    <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                    <input type="hidden" id="customerid" name="customerid" value="0">
                                                    <input type="hidden" id="customerType" name="customerType" value="0">
                                                    <input type="hidden" id="msgType" name="msgType" value="">
                                                    <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">
                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع الترخيص
                                                        </span>
                                                    </div>
                                                    <select class="form-control" name="BuildingTypeData" id="BuildingTypeData">
                                                        <option value=""></option>
                                                    </select>
                                                    
                                                    <div class="input-group-append" onclick="QuickAdd(16,'BuildingTypeData','نوع الترخيص')" style="cursor:pointer">
                                                        <span class="input-group-text input-group-text2">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع البناء
                                                        </span>
                                                    </div>
                                                    
                                                    <select class="form-control" name="BuildingData" id="BuildingData">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-12 pr-0 pr-s-12"  >
                                            <div class="form-group">
                                                <div class="input-group w-s-87">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            نوع المرفق
                                                        </span>
                                                    </div>
                                                    
                                                    <select class="form-control" name="AttahType" id="AttahType">
                                                        <option value=""></option>
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
                                        
                                    <button type="button" class="btn btn-primary" id="" style="" onclick="SaveMasterArch()">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
@include('dashboard.component.fetch_table');
@endsection