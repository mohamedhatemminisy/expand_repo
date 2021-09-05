@extends('layouts.admin')
@section('content')
<div class="content-body">
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <img src="{{asset('assets/images/ico/report32.png')}}" />تقرير الأرشيف  </h4>
                    </div>
                    <div class="card-body">
                        <form id="formDataaa" onsubmit="return false">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        نوع الأرشيف
                                                    </span>
                                                </div>
                                                <select name="OrgType" id="OrgType" class="form-control" onchange="ShowTypes()">
                                                    <option value="-1">الكل</option>
                                                    <option value="2076">صادر</option>
                                                    <option value="2077">وارد</option>
                                                    <option value="0">أرشيف البلدية</option>
                                                    <option value="1">أرشيف رخص البناء</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text lblNo" id="basic-addon1">
                                                        رقم الأرشيف 
                                                    </span>
                                                </div>
                                                <input type="text" id="archNo" name="archNo"  class="form-control eng-sm  valid" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        من تاريخ
                                                    </span>
                                                </div>
                                                <input type="text" id="frmDate" name="frmDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        حتى تاريخ
                                                    </span>
                                                </div>
                                                <input type="text" id="toDate" name="toDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" value="<?php echo date('d/m/Y')?>" placeholder="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend lblTo">
                                                    <span class="input-group-text lblName" id="basic-addon1">
                                                        مرتبط بـ
                                                    </span>
                                                </div>
                                                <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                <input type="hidden" id="customerid" name="customerid" value="0">
                                                <input type="hidden" id="customerType" name="customerType" value="0">
                                                <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                                <input type="hidden" id="pk_i_id" name="pk_i_id" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12 ShowTypes" style="display:none"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        نوع الإرشيف
                                                    </span>
                                                </div>
                                                <select name="OrgType1" id="OrgType1" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12 divType" style="display:none"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        نوع الترخيص
                                                    </span>
                                                </div>
                                                <select name="LicType" id="LicType" class="form-control">
                                                    <option value="-1">الكل</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12 divBuildType" style="display:none"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        نوع البناء
                                                    </span>
                                                </div>
                                                <select name="BuildingType" id="BuildingType" class="form-control">
                                                    <option value="-1">الكل</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:center">
                                    <button type="button" class="btn btn-primary" id="" style="">
                                    بحث
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
<script>
    
    function ShowTypes(){
            $(".lblNo").text('رقم الأرشيف')
            $(".lblName").text('مرتبط بـ')
            $(".divType").hide()
            $(".divBuildType").hide()
        if($("#OrgType").val()==0)
            $(".ShowTypes").show()
        else if($("#OrgType").val()>1)
            $(".ShowTypes").hide()
        else if($("#OrgType").val()==1){
            $(".ShowTypes").hide()
            $(".lblNo").text('رقم الرخصة')
            $(".lblName").text('اختر المشترك')
            $(".divType").show()
            $(".divBuildType").show()
        }
    }
</script>
@endsection