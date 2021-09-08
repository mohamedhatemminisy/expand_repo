@extends('layouts.admin')
@section('content')

<style>
    .detailsTB th,.detailsTB td{
        text-align:right !important;
    }
    .recList>tr>td{
        font-size:12px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding-bottom: 5px !important;
}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Hidden label form layout section start -->
            <section id="hidden-label-form-layouts">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><img src="{{ asset('assets/images/ico/report32.png') }}" />  تقرير </h4>
                            </div>
                            <div class="card-body">
                                <form id="formData" onsubmit="return false">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
    														<span class="input-group-text" id="basic-addon1">
    															التقرير عن
    														</span>
                                                        </div>
                                                        <select id="meetingtitle" class="form-control" name="meetingtitle">
                                                            <option value="-1">-- إختر --</option>
                                                            {{-- <?php foreach($meetingNames as $row){?>
                                                            <option value="<?php echo $row->pk_i_id?>"><?php echo $row->meetingnamear?></option>
                                                            <?php }?> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12 pr-0 pr-s-12"  ><div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
    														<span class="input-group-text" id="basic-addon1">
    															 رقم الجلسة
    														</span>
                                                        </div>
                                                        <input type="text" id="meetNo" class="form-control" placeholder="رقم الجلسة" name="meetNo" />
    
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
    															مقدم الطلب/ المستفيد
    														</span>
                                                        </div>
                                                        <input type="text" id="customerName" class="form-control cust" placeholder="ابدأ بالكتابة لعرض محاور البحث" name="customerName">
                                                        <input type="hidden" id="customerid" name="customerid" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
    														<span class="input-group-text" id="basic-addon1">
    															 من تاريخ.
    														</span>
                                                        </div>
                                                        <input type='text' id="period1" name="period1"  data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" value="<?php echo date('01/01/Y');?>" placeholder=""  onblur="calcDuration()"/>
    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12 pr-0 pr-s-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
    														<span class="input-group-text" id="basic-addon1">
    															 حتى تاريخ.
    														</span>
                                                        </div>
                                                        <input type='text' id="period2" name="period2"  data-mask="00/00/0000" maxlength="10" class="form-control eng-sm singledate valid" value="<?php echo date('d/m/Y');?>" placeholder="" onblur="calcDuration()" />
    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12">
                                                <div class="form-group">
                                                    <button type="button" onclick="StartSearch()" class="btn btn-primary addBtn"  id="save">
                                                        بحث
                                                        <i class="ft-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- // Hidden label form layout section end -->
        </div>

        <div class="content-body resultTbl" >
            <!-- Hidden label form layout section start -->
            <section id="hidden-label-form-layouts">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="direction: rtl;">
                                <h4 class="card-title"><img src="{{ asset('assets/images/ico/report32.png') }}" />  نتائج البحث</h4>
                                <div class="heading-elements1 heading-elements2" style>
                                    
                                                        <img src="{{ asset('assets/images/ico/Printer.png') }}"  onclick="PrintDiv('resultTbl')" class="fa fa-print" style="height: 32px;"/>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-body">
                                    <div class="row" id="resultTbl">
                                        <div class="col-xl-12 col-lg-12 showPrint">
                                            <div class="row">
                                                <table style="width:100%;">
                                                    <tr style="text-align:right;height:45px !important;">
                                                        <td id="otherInfo1" style="text-align:center;font-size:14pt;height:45px !important;">
                                                            
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <table class="detailsTB table wtbl" style="width:100%;direction: rtl;text-align: right; border:1px solid #000000 !important">
                                                <thead>
                                                    <tr style="text-align:center !important;background: #00A3E8;height:25px !important;">
                                                        <th scope="col" style=" width: 30px;" class="th1">
                                                             #
                                                        </th>
                                                        <th scope="col" style=" width: 100px;" class="hideImage th1">
                                                            تاريخ الجلسة
                                                        </th>
                                                        <th scope="col" style=" width: 100px;" class="hideImage th1">
                                                            رقم الجلسة
                                                        </th>
                                                        <th scope="col" style="    width: 250px;" class="th1">
                                                            الموضوع
                                                        </th>
                                                        <th scope="col" class="th1">
                                                            مقدم الطلب
                                                        </th>
                                                        <th scope="col" style="text-align: center !important;    width: 250px;" class="th1">
                                                            نص القرار
                                                        </th>
                                                        <th scope="col" style="width:0px;" class="hideImage th1"> </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="recList">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- // Hidden label form layout section end -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function ShowMyEmp(){
        dept=$("#Deptid").val()
        if(dept==0){
            $(".allDept").addClass("hide")
        }
        else{
            $(".allDept").addClass("hide")
            $(".empDept"+dept).removeClass("hide")
            
        }
    }
    function PrintDiv(elem)
    {
        /**************************/
            var table = $('.wtbl').DataTable();
             table.destroy();
        /**************************/
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
    
        mywindow.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">');
        mywindow.document.write('<link href="app-assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css" rel="stylesheet" type="text/css">');
        mywindow.document.write('<link href="assets/css/style.css" rel="stylesheet" type="text/css">');
        mywindow.document.write('<link href="assets/custome-rtl.css" rel="stylesheet" type="text/css">');
        mywindow.document.write('<style>@media print {.hideImage {display:none;}}</style>');
        mywindow.document.write('</head><body ><style>table{border-spacing: 0px;}.td1,.th1{border:1px solid #000000;} a{text-decoration:none;}body,a{font-size:8px;color:#000000}'
            +'tr,td{height: 90px !important;vertical-align:top;text-align:right;}</style>');
        mywindow.document.write('<table width="100%"><tr><td align="center"  style="text-align:center;"><img src="images/logo.JPG" style="width: 150px;" /></td></tr></table>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');
    
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/
    
        //mywindow.print();
       // mywindow.close();
    
        $(".wtbl").DataTable({
            
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
        })
        return true;
    }
    
    function getTrans(str=''){
        //var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        if(str.toLowerCase()=="sunday")
            return 'الأحد';
        if(str.toLowerCase()=="monday")
            return 'الإثنين';
        if(str.toLowerCase()=="tuesday")
            return 'الثلاثاء';
        if(str.toLowerCase()=="wednesday")
            return 'الأربعاء';
        if(str.toLowerCase()=="thursday")
            return 'الخميس';
        if(str.toLowerCase()=="friday")
            return 'الجمعة';
        if(str.toLowerCase()=="saturday")
            return 'السبت';
    }
    
    function myFunction(datestr) {
        var weekday = new Array(7);
        weekday[0] = "الأحد";
        weekday[1] = "الإثنين";
        weekday[2] = "الثلاثاء";
        weekday[3] = "الأربعاء";
        weekday[4] = "الخميس";
        weekday[5] = "الجمعة";
        weekday[6] = "السبت";
        var d = new Date(datestr);
        var n = d.getDay()
        return weekday[n];
    }
       
       
        function ProcessSearch(){
            
                    $(".loader").removeClass('hide');
            var formData = new FormData($("#formData")[0]);
            $.ajax({
                url: 'c_reporting/doAgendaRep',
                type: 'POST',
                data: formData,
                dataType:"json",
                async: true,
                success: function (data) {
                    $(".loader").addClass('hide');
                    
                    var table = $('.wtbl').DataTable();
                    table.destroy();
                    $("#recList").children().remove();
                    
                    if(data.length>0){
                        str=' محضر '
                        +$("#meetingtitle option:selected").text()
                        +' رقم '
                        +data[0].agendanum
                        +' والمنعقدة بتاريخ : '+data[0].agendastartdate
                        $("#otherInfo1").html(str)
                        for(i=0; i<data.length;i++){
                            row='<tr>'
                                    +'<td scope="col"style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important; width:30px;" class="td1">'+(i+1)+'</td>'
                                    +'<td scope="col"style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;" class="hideImage td1">'+data[i].agendastartdate+'</td>'
                                    +'<td scope="col"style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;" class="hideImage td1">'+data[i].agendanum+'</td>'
                                    +'<td scope="col"style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important; width:350px;" class=" td1">'+data[i].topicTitle+'</td>'
                                    +'<td scope="col"style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important;"width:150px; class=" td1">'+data[i].applicantName+'</td>'
                                    +'<td scope="col"style="text-align: right;; color: #000000; font-weight:bold;font-size: 14px !important; width:350px;" class=" td1">'+data[i].decision+'&nbsp;</td>'
                                    +'<td scope="col" style="width:0px;" class="hideImage td1"><a href="printDes/'+data[i].topic_id+'"><img style="height: 32px;" src="images/printer.jpeg"></a></td>'
                                +'</tr>';
                            $("#recList").append(row)
                        }
                    }
                        
                        $(".resultTbl").removeAttr('style');
                        $(".wtbl").DataTable({
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
                        })
                    console.log(data.length);return;
                    
                },
                        cache: false,
                        contentType: false,
                        processData: false
            });
        }
    
        function calcDuration(str){
            twoDatesArr= new Array();
            twoDatesArr[0]= $('#period1').val();
            twoDatesArr[1]= $('#period2').val();
            
    
    
            d1Arr=twoDatesArr[0].split('/')
            d2Arr=twoDatesArr[1].split('/')
            d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
            d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
            if(d1Date>d2Date){
                alert('تاريخ النهاية اقل من البداية')
                return;
            }
            var diff = Math.abs(d2Date - d1Date);
            diffinyear=diff/(24*60*60*1000*30*12);
            diffinmonth=diff/(24*60*60*1000*30);
            diffinday=diff/(24*60*60*1000);
            month1=Math.floor(diffinmonth)-(Math.floor(diffinyear)*12)
            day=Math.floor(diffinday)-(Math.floor(diffinmonth)*30)
            txt='';
            txt1='';
            strr='';
            if(Math.floor(diffinyear)>0)
                txt=Math.floor(diffinyear)+' سنة'
    
            if(Math.floor(month1)>0)
                txt1=Math.floor(month1)+' شهر, '
            if(txt.length>0) {
                strr = txt
                if(txt1.length>0)
                    strr+=', '+txt1
                else
                    strr+=', 0 شهر, '
            }
            else {
                if(txt1.length>0)
                    strr+=txt1
    
            }
            $(".res").text(strr+Math.floor(day)+'يوم');
            //console.log(d2Date-d1Date);
            console.log(diffinyear,diffinmonth,diffinday);
        }
    
        function StartSearch(){
    /*
            twoDatesArr= new Array();
            twoDatesArr[0]= $('#period1').val();
            twoDatesArr[1]= $('#period2').val();
            
            d1Arr=twoDatesArr[0].split('/')
            d2Arr=twoDatesArr[1].split('/')
            d1Date=new Date(d1Arr[1]+'/'+d1Arr[0]+'/'+d1Arr[2])
            d2Date=new Date(d2Arr[1]+'/'+d2Arr[0]+'/'+d2Arr[2])
            if(d1Date>d2Date){
                alert('تاريخ النهاية اقل من البداية')
                return;
            }
            
            $("#repCusName").text($("#customerName").val().length==0?'الكل':$("#customerName").val())
            $("#repDeptName").text($("#Deptid option:selected").text())
            $("#repTaskName").text($("#TaskState option:selected").text())
            $("#repPeriod").text(' من '+twoDatesArr[0]+' الى '+twoDatesArr[1])
            $("#repEmpName").text($("#empid option:selected").text())*/
            ProcessSearch()
        }
    
        $( function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
    
            $( ".cust" ).autocomplete({
                source: "generalSearch",
                minLength: 2,
                select: function( event, ui ) {
                    $("#customerName").val(ui.item.label)
                    $("#customerid").val(ui.item.category+''+ui.item.id)
    
                }
            });
    
            $( ".dept" ).autocomplete({
                source:"searchDeptByName",
                minLength: 2,
                select: function( event, ui ) {
                    $("#DeptName").val(ui.item.label)
                    $("#Deptid").val(ui.item.id)
                }
            });
    
            $( ".emp" ).autocomplete({
                source: "searchEmpByName",
                minLength: 2,
                select: function( event, ui ) {
                    $("#empName").val(ui.item.label)
                    $("#empid").val(ui.item.id)
                }
            });
            
            //StartSearch()
        } );
    </script>
@endsection
