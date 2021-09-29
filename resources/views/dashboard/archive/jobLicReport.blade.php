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
                                            <div class="col-lg-6 col-md-12 pr-0 pr-s-12"  >
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
                                            <div class="col-lg-3 col-md-12 pr-0 pr-s-12"  >
                                                <div class="form-group">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                حالة الرخصة
                                                            </span>
                                                        </div>
                                                        <select class="form-control" name="status" id="status" >
                                                            <option value="1" selected>فعالة</option>
                                                            <option value="2">منتهية</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-lg-4 col-md-12"></div>
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
    
    </script>
@endsection
