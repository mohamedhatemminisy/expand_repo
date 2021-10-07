@extends('layouts.admin')
@section('content')
<div class="content-body">
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <img src="{{asset('assets/images/ico/report32.png')}}" />تقرير المتطوعين  </h4>
                    </div>
                    <div class="card-body">
                        <form id="formDataaa" onsubmit="return false">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        فصيلة الدم
                                                    </span>
                                                </div>
                                                <select name="arcType" id="OrgType" class="form-control" onchange="ShowTypes()">
                                                    <option value="all" >الكل</option>
                                                    <option value="outArchive">{{trans('archive.out_archive')}}</option>
                                                    <option value="inArchive">{{trans('archive.in_archive')}}</option>
                                                    <option value="munArchive">{{trans('archive.mun_archive')}}</option>
                                                    <option value="projArchive">{{trans('archive.proj_archive')}}</option>
                                                    <option value="empArchive">{{trans('archive.emp_archive')}}</option>
                                                    <option value="depArchive">{{trans('archive.dep_archive')}}</option>
                                                    <option value="citArchive">{{trans('archive.cit_archive')}}</option>
                                                    <option value="licArchive">{{trans('archive.lic_archive')}}</option>
                                                    <option value="licFileArchive">{{trans('archive.licFile_archive')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text lblNo" id="basic-addon1">
                                                        رخصة القيادة
                                                    </span>
                                                </div>
                                                <input type="text" id="archNo" name="archNo"  class="form-control eng-sm  valid" >
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        المدينة
                                                    </span>
                                                </div>
                                                <input type="text" id="frmDate" name="frmDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid" placeholder="">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-2" style="padding-left:0px;">
                                        <div class="row">
                                            <div class="form-group col-10" style="padding-left:0px;">
                                            <div class="input-group" >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        {{trans('admin.city')}}
                                                    </span>
                                                </div>
                                                <select id="CityID" name="CityID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),8,'TownID')">
                                                    <option> -- {{trans('admin.city')}} --</option>
                                                    {{-- @foreach($city as $cit)
                                                        <option  value="{{$cit->id}}">  {{$cit->name}} </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            </div>
                                            {{-- <div class="input-group-append col-2" onclick="QuickAdd(10,'PositionID','City')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                                                <span class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        البلدة
                                                    </span>
                                                </div>
                                                <input type="text" id="toDate" name="toDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid"  placeholder="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-2" style="padding-left:0px;">
                                        <div class="row">
                                            <div class="form-group col-10" style="padding-left:0px;">
                                                <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            {{trans('admin.state')}}
                                                        </span>
                                                    </div>
                                                <select id="area_data" name="TownID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),9,'AreaID')">
                                                    <option value=""> -- {{trans('admin.state')}} -- </option>
                                                </select>
                                            </div>
                                            </div>
                                            {{-- <div class="input-group-append col-2" onclick="QuickAdd(33,$('#CityID').find(':selected').val(),'Area')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                                                <span class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        العمر
                                                    </span>
                                                </div>
                                                <input type="text" id="toDate" name="toDate" data-mask="00/00/0000" maxlength="10" class="form-control eng-sm  valid"  placeholder="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend lblTo">
                                                    <span class="input-group-text lblName" id="basic-addon1">
                                                        الدورة التدريبية
                                                    </span>
                                                </div>
                                                <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                <input type="hidden" id="customerid" name="customerid" value="0">
                                                <input type="hidden" id="arcType" name="arcType">
                                                <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend lblTo">
                                                    <span class="input-group-text lblName" id="basic-addon1">
                                                        التحصيل العلمى
                                                    </span>
                                                </div>
                                                <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                <input type="hidden" id="customerid" name="customerid" value="0">
                                                <input type="hidden" id="arcType" name="arcType">
                                                <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-12 pr-0 pr-s-12"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend lblTo">
                                                    <span class="input-group-text lblName" id="basic-addon1">
                                                        مدة التطوع
                                                    </span>
                                                </div>
                                                <input type="text" id="customerName" class="form-control cust" name="customerName">
                                                <input type="hidden" id="customerid" name="customerid" value="0">
                                                <input type="hidden" id="arcType" name="arcType">
                                                <input type="hidden" id="msgType" name="msgType" value="<?php echo $type ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-right: 20px">
                                    <div style="text-align:center" >
                                        <button type="button" class="btn btn-primary" onclick="search();" style="">
                                        بحث
                                        </button>
                                    </div>
                                    </div>
                                    {{-- <div class="col-lg-3 col-md-12 pr-0 pr-s-12 ShowTypes" style="display:none"  >
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
                                    </div> --}}
                                    {{-- <div class="col-lg-3 col-md-12 pr-0 pr-s-12 divType" style="display:none"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        نوع الترخيص
                                                    </span>
                                                </div>
                                                <select class="form-control" name="BuildingTypeData" id="BuildingTypeData">
                                                    <option value="-1">الكل</option>
                                                    @foreach($license_type as $license)
                                                    <option value="{{$license->id}}"> {{$license->name}}   </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-3 col-md-12 pr-0 pr-s-12 divBuildType" style="display:none"  >
                                        <div class="form-group">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        نوع البناء
                                                    </span>
                                                </div>

                                                <select class="form-control" name="BuildingData" id="BuildingData">
                                                    <option value="-1">الكل</option>
                                                    <option value="2079">قائم</option>
                                                    <option value="2080">مقترح</option>
                                                    <option value="2081">قائم/مقترح</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
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
    margin-bottom: 20px;
    text-align: left;

}

</style>

<input type="hidden" id="type" name="type" value="{{$type}}">
<div class="content-body resultTblaa">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" />
                            {{ trans('archive.search_result') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th class="col1" >
                                             {{trans('archive.title_name')}}
                                                </th>
                                                <th class="col2">
                                                    {{trans('admin.type')}}
                                                </th>
                                                <th class="col3">
                                                    {{trans('archive.num')}}
                                                </th>
                                                <th class="col4">
                                                    {{trans('admin.related_to')}}
                                                </th>
                                                <th class="col5">
                                                    {{trans('archive.date_send')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.attach')}}
                                                </th>
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

<script>

    function ShowTypes(){
            $(".lblNo").text('رقم الأرشيف')
            $(".lblName").text('مرتبط بـ')
            $(".divType").hide()
            $(".divBuildType").hide()
            $(".col1").text('العنوان')
            $(".col2").text('النوع')
            $(".col3").text('الرقم')
            $(".col4").text('مرتبط بــ')
            $(".col5").text('تاريخ الإرسال')
        if($('#OrgType').find(":selected").val()=="munArchive")
            $(".ShowTypes").show()

        else if($('#OrgType').find(":selected").val()=="licArchive"||($('#OrgType').find(":selected").val()=="licFileArchive")){
            $(".ShowTypes").hide()
            $(".lblNo").text('رقم الرخصة')
            $(".lblName").text('اختر المشترك')
            $(".divType").show()
            $(".divBuildType").show()
            $(".col1").text('نوع الترخيص')
            $(".col2").text('نوع البناء')
            $(".col3").text('رقم الرخصة')
            $(".col4").text('اسم صاحب الرخصة')
            $(".col5").text('تاريخ الإدخال')
        }
        else
            $(".ShowTypes").hide()

    }

    $( function(){
            var table=$('.wtbl').DataTable({
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
    function search(){
        if ( $.fn.DataTable.isDataTable( '.wtbl' ) ) {
        $(".wtbl").dataTable().fnDestroy();
        $('#recListaa').empty();
        }
        let name = $("#customerName").val();
        let archNo = $("#archNo").val();
        let start = $("#frmDate").val();
        let end = $("#toDate").val();
        var arcType = $('#OrgType').find(":selected").val();
        var BuildingData = $('#BuildingData').find(":selected").val();
        var arcType = $('#OrgType').find(":selected").val();
        let OrgType1 = $("#OrgType1").val();
        let BuildingType = $("#BuildingType").val();
        let BuildingTypeData = $("#BuildingTypeData").val();
        let LicType = $("#LicType").val();
        $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "archieve_report",

                data: {
                    name: name,
                    archNo:archNo,
                    arcType:arcType,
                    start:start,
                    end:end,
                    orgType:OrgType1,
                    buildType:BuildingType,
                    licType:LicType,
                    BuildingData:BuildingData,
                    BuildingTypeData:BuildingTypeData,

                },
                success:function(response){
                    var c=1;
                    console.log(response);
                    var typeArray = { "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'};
                if(response.type=="lic"){
                    var buildArray = { "2079": '{{trans('archive.build_type1')}}', "2080": '{{trans('archive.build_type2')}}',"2081": '{{trans('archive.build_type3')}}'};
                        console.log(buildArray["2079"]);
                        response.result.forEach(elem => {
                        $row="<tr>"+
                            "<td>"+c+"</td>"+
                            "<td>"+elem.licName+"</td>"+
                            "<td>"+buildArray[elem.license_type]+"</td>"+
                            "<td>"+elem.licNo+"</td>"+
                            "<td>"+elem.name+"</td>"+
                            "<td>"+elem.date+"</td>"+
                            "<td>";
                            attach='';
                            var i=1;
                            if(elem.fileIDS&&typeof(elem.fileIDS)=="object"){
                            elem.fileIDS.forEach(file => {
                                attach+='<div id="attach" class=" col-sm-6 ">'
                                        +'<div class="attach">'
                                            +'<span class="attach-text">مرفق '+i+'</span><a onclick="delAttach()"><i class="fa fa-trash"></i></a>'
                                            +'<a class="attach-close1" href="'+file+'" style="color: #74798D; float:left;" target="_blank">'
                                            +'  <i class="fa fa-eye"> </i>'
                                            +'</a><input type="hidden" value="" name="attach[]" >'
                                            +'</div>'
                                        +'</div>';
                                        i++;
                                    });
                                    $row += attach;
                                }


                            $row += "</td></tr>";
                        $('#recListaa').append($row)
                        c++;
                    });
                }
                else{
                    response.result.forEach(elem => {
                        $row="<tr>"+
                            "<td>"+c+"</td>"+
                            "<td>"+elem.title+"</td>"+
                            "<td>"+typeArray[elem.type]+"</td>"+
                            "<td>"+elem.serisal+"</td>"+
                            "<td>"+elem.name+"</td>"+
                            "<td>"+elem.date+"</td>"+
                            "<td>";
                            attach='';
                            var i=1;
                            if(elem.fileIDS&&typeof(elem.fileIDS)=="object"){
                            elem.fileIDS.forEach(file => {
                                attach+='<div id="attach" class=" col-sm-6 ">'
                                        +'<div class="attach">'
                                            +'<span class="attach-text">مرفق '+i+'</span><a onclick="delAttach()"><i class="fa fa-trash"></i></a>'
                                            +'<a class="attach-close1" href="'+file+'" style="color: #74798D; float:left;" target="_blank">'
                                            +'  <i class="fa fa-eye"> </i>'
                                            +'</a><input type="hidden" value="" name="attach[]" >'
                                            +'</div>'
                                        +'</div>';
                                        i++;
                                    });
                                    $row += attach;
                                }


                            $row += "</td></tr>";
                        $('#recListaa').append($row)
                        c++;
                    });
                }
                    $('.wtbl').DataTable({
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
                },
            });

    }
</script>
@endsection
