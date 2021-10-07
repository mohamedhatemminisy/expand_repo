@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection

@section('content')
<style>
    .detailsTB th{
        color:#ffffff;
    }
      .detailsTB th,.detailsTB td{
        text-align:right !important;
        
    }
    .recList>tr>td{
        font-size:12px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding-bottom: 5px !important;
}
.dataTables_filter{
    margin-top:-15px;
}
.even{
    background-color:#D7EDF9 !important;
}
.dt-buttons
{
    text-align: left;
    display: inline;
    float: left;
    position: relative;
    bottom: 10px;
    margin-right: 10px;
}

</style>
<div class="content-body">
    <section id="hidden-label-form-layouts">
    <form method="post" id="formDataaa" enctype="multipart/form-data">
        @csrf

        <div class="row white-row" >
            <div class="col-sm-12">
                <div class="card leftSide">
                    <div class="card-header">
                        <h4 class="card-title">
                            <img src="https://db.expand.ps/images/personal-information.png" width="32" height="32">
                             معلومات الإشتراك
                        </h4>
                        <div class="heading-elements1" style="display: none;left: 87px; top: 10px;">
                            الحالة
                        </div>
                        <div class="heading-elements1 onOffArea form-group mt-1" style="display: none;    top: -5px;">
                            <input type="checkbox" id="myonoffswitchHeader" class="switchery" data-size="xs" checked/>
                        </div>
                    </div>

                    <div class="card-content collapse show" >
                        <div class="card-body" style="padding-bottom: 0px;">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                         اسم المشترك
                                                    </span>
                                                </div>
                                                <input type="text" id="formDataNameAR" class="form-control alphaFeild ac" placeholder="اسم المشترك" name="formDataNameAR">
                                                <input type="hidden" id="fromname" name="formname" value="formData">
                                                <input type="hidden" id="pk_i_id" name="pk_i_id" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        رقم الرخصة
                                                    </span>
                                                </div>
                                                <input type="text" id="formDataNameAR" class="form-control alphaFeild ac" placeholder="رقم الرخصة" name="formDataNameAR">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 pr-0 pr-s-12">
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        الغاية من الاستعمال
                                                    </span>
                                                </div>
                                        <select name="archive_type" id="archive_type" class="form-control">
                                            <option value="">-- اختر --</option>
                                        </select>
                                        <div class="input-group-append" onclick="QuickAdd(999,'archive_type','الغاية من الاستعمال')" style="cursor:pointer">
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
                                                    <span class="input-group-text" id="basic-addon1">
                                                        رقم الدفتر
                                                    </span>
                                                </div>
                                                <input type="text" id="formDataNameAR" class="form-control alphaFeild ac" placeholder="رقم الدفتر" name="formDataNameAR">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12" style="max-width: 12%;" >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        عدد الطوابق
                                                    </span>
                                                </div>
                                                <input type="text" id="formDataNameAR" class="form-control alphaFeild ac" placeholder="عدد الطوابق" name="formDataNameAR">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            
                                    <table style="width:100%; margin-top: -10px;" class="detailsTB table engTbl">
                                        <tbody>
                                        <tr>
                                            <th scope="col">رقم القطعة هيكلي</th>
                                            <th scope="col">رقم القطعة طابو</th>
                                            <th scope="col">رقم الحوض</th>
                                            <th scope="col">المساحة المرخصة</th>
                                            <th scope="col">تاريخ الترخيص</th>
                                            <th scope="col">مساحة الأرض</th>
                                            <th scope="col">اوصاف البناء</th>
                                            <th scope="col">ملاحظات</th>
                                        </tr>
                                        <tr>
                                            {{-- <td width="150px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <select id="formDataBuildingType" name="formDataBuildingTypeList" class="form-control " >

                                                        </select>
                                                    </div>
                                                </div>
                                            </td> --}}
                                            <td width="60px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="رقم القطعة هيكلي"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="110px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="رقم القطعة طابو"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="60px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="رقم الحوض"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="60px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="المساحة المرخصة"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="90px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="تاريخ الترخيص"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="60px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="مساحة الأرض"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="180px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="اوصاف البناء"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="220px;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" id="buldingLicNo" class="form-control" placeholder="ملاحظات"  name="buldingLicNoList" >
                                                    </div>
                                                </div>
                                            </td>
                                        </tbody>
                                    </table>
                                
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 pr-0 pr-s-12" style="text-align: center;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">
                                            إضافة الإشتراك
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </form>
    </section>
</div>
<input type="hidden" id="type" name="type" value="">
<div class="content-body resultTblaa">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" /> 
                            رخص البناء  
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                        <thead>
                                            <tr>
                                                <th  >
                                                   #
                                                </th>
                                                <th  style="width: 15%;">
                                                    {{trans('admin.subscriber_name')}}
                                                </th>
                                                <th style="width: 10%;">رقم القطعة هيكلي</th>
                                                <th style="width: 10%;">رقم القطعة طابو</th>
                                                <th style="width: 7%;">رقم الحوض</th>
                                                <th style="width: 10%;">المساحة المرخصة</th>
                                                <th style="width: 10%;">تاريخ الترخيص</th>
                                                <th style="width: 7%;">مساحة الأرض</th>
                                                <th style="width: 15%;">اوصاف البناء</th>
                                                <th style="width: 15%;">ملاحظات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="recListaa">
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>  
@section('script')
<script>
    $( function(){
        var table = $('.wtbl').DataTable({
                        dom: 'Bfltip',
                        buttons: [
                            {
                                extend: 'excel',
                                tag: 'img',
                                title:'',
                                attr:  {
                                    title: 'excel',
                                    src:'{{asset('assets/images/ico/excel.png')}}',
                                    style: 'cursor:pointer;',
                                },

                            },
                            {
                                extend: 'print',
                                tag: 'img',
                                title:'',
                                attr:  {
                                    title: 'print',
                                    src:'{{asset('assets/images/ico/Printer.png')}} ',
                                    style: 'cursor:pointer;height: 32px;',
                                    class:"fa fa-print"
                                },
                                customize: function ( win ) {
                            
            
                                $(win.document.body).find( 'table' ).find('tbody')
                                    .css( 'font-size', '20pt' );
                                }
                            },
                            ],
                        
                        "language": {
                                    "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                                    "sLoadingRecords": "جارٍ التحميل...",
                                    "sProcessing":   "جارٍ التحميل...",
                                    "sLengthMenu":   "أظهر _MENU_ مدخلات",
                                    "sZeroRecords":  "لم يعثر على أية سجلات",
                                    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                                    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                                    "sInfoPostFix":  "",
                                    "sSearch":       "ابحث:",
                                    "sUrl":          "",
                                    "oPaginate": {
                                        "sFirst":    "الأول",
                                        "sPrevious": "السابق",
                                        "sNext":     "التالي",
                                        "sLast":     "الأخير"
                                    },
                                    "oAria": {
                                        "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                                    }
                                }
                    });           

    });
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

</script>
@endsection
@endsection
