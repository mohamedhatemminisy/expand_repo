@if ($type=="subscriber"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type=="orgnization"||$type == 'equip'||$type == 'org'||$type == 'employee'||$type == 'depart')

<div class="modal fade text-left" id="CertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <div class="modal-header">
              {{-- <h4 class="modal-title" id="myModalLabel1">الأرشيف  (<span id=""></span>)</h4> --}}
              <h4 class="modal-title" id="myModalLabel1">الأرشيف  <span id=""></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="form-body">
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <ul class="nav nav-tabs">
                               <!-- <li class="nav-item">
                                  <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#xtab1" aria-expanded="true">شهادات</a>
                                </li>
                                -->
                                @if ($type=="orgnization")
                                <table width="100%" class="detailsTB table orgnization_table">
                                    <thead>
                                    <tr>
                                    <th width="30px">#</th>
                                    <th width="50px">رقم الأرشيف</th>
                                    <th width="200px">العنوان</th>
                                    <th width="80px">التاريخ </th>
                                    <th width="60px"> النوع </th>
                                    <th width="260px">المرفقات </th>
                                    </tr>
                                </thead>
                                <tbody id="orgnization_list">
                                </tbody>
                                </table>
                                @elseif ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type=="project"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip'||$type == 'org')
                                    @if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org')
                                    <li class="nav-item">
                                    <a class="nav-link active" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#xtab2" aria-expanded="true">أرشيف الصادر</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#xtab3" aria-expanded="false">أرشيف الوارد</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#xtab4" aria-expanded="false">أخرى </a>
                                    </li>
                                    @if ($type=="subscriber")
                                    {{-- <li class="nav-item">
                                    <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#xtab5" aria-expanded="false">شهادة تسجيل  اراضي</a>
                                    </li> --}}
                                    
                                    <li class="nav-item">
                                    <a class="nav-link" id="base-tab6" data-toggle="tab" aria-controls="tab6" href="#xtab6" aria-expanded="false">أرشيف رخص البناء</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="base-tab7" data-toggle="tab" aria-controls="tab7" href="#xtab7" aria-expanded="false">أرشيف ملف الترخيص</a>
                                    </li>
                                    @endif
                                    @endif
                                @if ($type=="project"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip')
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab9" data-toggle="tab" aria-controls="tab9" href="#xtab9" aria-expanded="false">الأرشيف</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab8" data-toggle="tab" aria-controls="tab8" href="#xtab8" aria-expanded="false">نسخة الى</a>
                                </li>
                              </ul>
                              
                                <div class="tab-content px-1 pt-1">
                                    <div class="tab-pane" id="xtab6" aria-labelledby="base-tab6">
                                        <p>
                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table licTbl">
                                                <thead>
                                                    <tr style="text-align:center !important;background: #00A3E8;">
                                                        <th width="50px">
                                                        #
                                                        </th>
                                                        <th width="80px">
                                                        رقم الرخصة
                                                        </th>
                                                        <th width="120px">
                                                            نوع الترخيص
                                                        </th>
                                                        <th width="80px">
                                                            نوع البناء
                                                        </th>
                                                        <th width="300px">
                                                            المرفقات
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="licList">
                                                </tbody>
                                            </table>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="xtab7" aria-labelledby="base-tab7">
                                        <p>
                                            <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table licFileTbl">
                                                <thead>
                                                    <tr style="text-align:center !important;background: #00A3E8;">
                                                        <th width="50px">
                                                        #
                                                        </th>
                                                        <th width="80px">
                                                        رقم ملف الترخيص
                                                        </th>
                                                        <th width="120px">
                                                            نوع الترخيص
                                                        </th>
                                                        <th width="80px">
                                                            نوع البناء
                                                        </th>
                                                        <th width="300px">
                                                            المرفقات
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="licFileList">
                                                </tbody>
                                            </table>
                                        </p>
                                    </div>

                                    <div class="tab-pane
                                    @if ($type=="project"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip'||$type == 'orgnization')
                                    active
                                    @endif" id="xtab9" aria-labelledby="base-tab9">
                                        <p>
                                            <table width="100%" class="detailsTB table orgnization_table">
                                                <thead>
                                                <tr>
                                                <th width="30px">#</th>
                                                <th width="50px">رقم الأرشيف</th>
                                                <th width="200px">العنوان</th>
                                                <th width="80px">التاريخ </th>
                                                <th width="60px"> النوع </th>
                                                <th width="260px">المرفقات </th>
                                                </tr>
                                            </thead>
                                            <tbody id="orgnization_list">
                                            </tbody>
                                            </table>
                                        </p>
                                    </div>

                                    <div class="tab-pane 
                                    @if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org')
                                        active
                                    @endif" id="xtab2" aria-labelledby="base-tab2">
                                        <p>
                                            <table width="100%" class="detailsTB table SaderTbla">
                                                <thead>
                                                <tr>
                                                    <th width="50px">#</th>
                                                    <th width="50px">رقم المراسلة</th>
                                                    <th width="200px">عنوان المراسلة</th>
                                                    <th width="80px">التاريخ </th>
                                                    <th width="260px">المرفقات </th>
                                                </tr>
                                            </thead>
                                            <tbody id="msgList1">
                                            </tbody>
                                            </table>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="xtab8" aria-labelledby="base-tab8">
                                        <p>
                                            <table width="100%" class="detailsTB table copyToTbl">
                                                    <thead>
                                                    <tr>
                                                    <th width="50px">#</th>
                                                    <th width="50px">رقم الأرشيف</th>
                                                    <th width="200px">عنوان الأرشيف</th>
                                                    <th width="120px"> صادر من </th>
                                                    <th width="80px">التاريخ </th>
                                                    <th width="260px">المرفقات </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="copyToList">
                                                </tbody>
                                            </table>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="xtab3" aria-labelledby="base-tab3">
                                        <p>
                                            <table width="100%" class="detailsTB table waredTbla">
                                                <thead>
                                                <tr>
                                                    <th width="50px">#</th>
                                                    <th width="50px">رقم المراسلة</th>
                                                    <th width="200px">عنوان المراسلة</th>
                                                    <th width="80px">التاريخ </th>
                                                    <th width="260px">المرفقات </th>
                                                </tr>
                                                </thead>
                                                <tbody id="msgRList1">
                                                </tbody>
                                            </table>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="xtab4" aria-labelledby="base-tab4">
                                        <p>
                                            <table width="100%" class="detailsTB table OtherTbla">
                                                <thead>
                                                <tr>
                                                    <th width="50px">#</th>
                                                    <th width="50px">رقم المراسلة</th>
                                                    <th width="200px">عنوان المراسلة</th>
                                                    <th width="80px">انوعها</th>
                                                    <th width="80px">التاريخ </th>
                                                    <th width="260px">المرفقات </th>
                                                </tr>
                                            </thead>
                                            <tbody id="msgOList11">
                                            </tbody>
                                            </table>
                                        </p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>
@if ($type=="subscriber")
function drawTablesArchive($archives,$copyTo,$archivesLic)
@else
function drawTablesArchive($archives,$copyTo)
@endif
{   
    @if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org')
    if ( $.fn.DataTable.isDataTable( '.SaderTbla' ) ) {
        $(".SaderTbla").dataTable().fnDestroy();
        $('#msgList1').empty();
    }
    if ( $.fn.DataTable.isDataTable( '.waredTbla' ) ) {
        $(".waredTbla").dataTable().fnDestroy();
        $('#msgRList1').empty();
    }
    if ( $.fn.DataTable.isDataTable( '.OtherTbla' ) ) {
        $(".OtherTbla").dataTable().fnDestroy();
        $('#msgOList11').empty();
    }
    if ( $.fn.DataTable.isDataTable( '.licTbl' ) ) {
        $(".licTbl").dataTable().fnDestroy();
        $('#licList').empty();
    }
    if ( $.fn.DataTable.isDataTable( '.licFileTbl' ) ) {
        $(".licFileTbl").dataTable().fnDestroy();
        $('#licFileList').empty();
    }
    if ( $.fn.DataTable.isDataTable( '.copyToTbl' ) ) {
        $(".copyToTbl").dataTable().fnDestroy();
        $('#copyToList').empty();
    }
    var s=1;
    var w=1;
    var c=1,p=1,lc=1,lf=1;
    var typeArray = { "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'}; 
    @elseif($type=="orgnization"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip')
        if ( $.fn.DataTable.isDataTable( '.orgnization_table' ) ) {
            $(".orgnization_table").dataTable().fnDestroy();
            $('#orgnization_list').empty();
        }
        if ( $.fn.DataTable.isDataTable( '.copyToTbl' ) ) {
        $(".copyToTbl").dataTable().fnDestroy();
        $('#copyToList').empty();
        }
        var s=1;
        var w=1;
        var c=1,p=1,lc=1,lf=1;
        var typeArray = { "outArchive": '{{trans('archive.out_archive')}}', "inArchive": '{{trans('archive.in_archive')}}',"projArchive": '{{trans('archive.proj_archive')}}',"munArchive": '{{trans('archive.mun_archive')}}',"empArchive": '{{trans('archive.emp_archive')}}',"depArchive": '{{trans('archive.dep_archive')}}',"assetsArchive": '{{trans('archive.assets_archive')}}',"citArchive": '{{trans('archive.cit_archive')}}',"licArchive": '{{trans('archive.lic_archive')}}',"licFileArchive": '{{trans('archive.licFile_archive')}}'}; 
        
        $archives.forEach(archive => {
        if(archive.type=="inArchive"||archive.type=="outArchive"||archive.type=="projArchive"||archive.type=='munArchive'||archive.type=='empArchive'||archive.type=='assetsArchive'||archive.type=='citArchive'||archive.type=='depArchive')
           { $row="<tr>"+
                "<td>"+p+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>"+typeArray[archive.type]+"</td>"+
                "<td>";
                    attach='';
                    if(archive.files){
                    var j=0;
                    for(j=0;j<archive.files.length;j++){
                        shortCutName=archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=archive.files[j].url;
                        if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $row += attach;
                    var attach='';
                }

                $row += "</td></tr>";
            $('#orgnization_list').append($row)
            p++;
           }
        });
        $('.orgnization_table').DataTable({
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
            @if($type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type=="project"||$type == 'equip')
            $copyTo.forEach(copy => {
                if(copy.archive){
            $row="<tr>"+
                "<td>"+c+"</td>"+
                "<td>"+copy.archive.serisal+"</td>"+
                "<td>"+copy.archive.title+"</td>"+
                "<td>"+copy.archive.name+"</td>"+
                "<td>"+copy.archive.date+"</td>"+
                "<td>";
                    attach='';
                    if(copy.archive.files.length>0){
                    var j=0;
                    for(j=0;j<copy.archive.files.length;j++){
                        shortCutName=copy.archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=copy.archive.files[j].url;
                        if(copy.archive.files[j].extension=="jpg"||copy.archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(copy.archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(copy.archive.files[j].extension=="excel"||copy.archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $row += attach;
                    attach='';
                }
                
               
                $row += "</td></tr>";
            $('#copyToList').append($row)
            c++;}
            });
                $('.copyToTbl').DataTable({

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
            @endif
    @endif
    @if ($type=="subscriber"||$type == 'employee'||$type == 'depart'||$type == 'org')
    $archives.forEach(archive => {
        
        if(archive.type=="outArchive")
           { $row="<tr>"+
                "<td>"+s+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>";
                attach='';
                if(archive.files.length>0){
                    console.log(archive.files.length);
                    for(j=0;j<archive.files.length;j++){
                        shortCutName=archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=archive.files[j].url;
                        if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                        shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' ;
                    }
                    $row += attach;
                var attach='';
                }
                
                $row += "</td></tr>";
            $('#msgList1').append($row)
            s++;
                
           }
           if(archive.type=="inArchive")
           { $row="<tr>"+
                "<td>"+w+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>";
                    attach='';
                    if(archive.files.length>0){
                    for(j=0;j<archive.files.length;j++){
                        shortCutName=archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=archive.files[j].url;
                        if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>';
                                
                    }
                    $row += attach;   
                var attach='';    
                }
                         
                $row += "</td></tr>";
            $('#msgRList1').append($row)
            w++;
           }
           if(archive.type=="projArchive"||archive.type=='munArchive'||archive.type=='empArchive'||archive.type=='assetsArchive'||archive.type=='citArchive'||archive.type=='depArchive')
           { $row="<tr>"+
                "<td>"+p+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+typeArray[archive.type]+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>";
                    attach='';
                    if(archive.files){
                    var j=0;
                    for(j=0;j<archive.files.length;j++){
                        shortCutName=archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=archive.files[j].url;
                        if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $row += attach;
                    var attach='';
                }

                $row += "</td></tr>";
            $('#msgOList11').append($row)
            p++;
           }
        
        
    });

    $('.SaderTbla').DataTable({
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
    
    $('.waredTbla').DataTable({

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
    $('.OtherTbla').DataTable({
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
    @if ($type=="subscriber")
        $archivesLic.forEach(archive => {
           if(archive.type=="licArchive")
           { $row="<tr>"+
                "<td>"+lc+"</td>"+
                "<td>"+archive.licNo+"</td>"+
                "<td>"+archive.license_id+"</td>"+
                "<td>"+archive.license_type+"</td>"+
                "<td>";
                    attach='';
                    if(archive.files){
                    var j=0;
                    for(j=0;j<archive.files.length;j++){
                        shortCutName=archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=archive.files[j].url;
                        if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><i class="fa fa-eye"></i></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $row += attach;
                    attach='';
                }
                
                      
                $row += "</td></tr>";
            $('#licList').append($row)
            lc++;
           }
           if(archive.type=="licFileArchive")
           { $row="<tr>"+
                "<td>"+lf+"</td>"+
                "<td>"+archive.licNo+"</td>"+
                "<td>"+archive.license_id+"</td>"+
                "<td>"+archive.license_type+"</td>"+
                "<td>";
                    attach='';
                    if(archive.files){
                    var j=0;
                    for(j=0;j<archive.files.length;j++){
                        shortCutName=archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=archive.files[j].url;
                        if(archive.files[j].extension=="jpg"||archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(archive.files[j].extension=="excel"||archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $row += attach;
                    attach='';
                }
                
               
                $row += "</td></tr>";
            $('#licFileList').append($row)
            lf++;
           }
        });
        $('.licTbl').DataTable({
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
    $('.licFileTbl').DataTable({
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
    @endif
   $copyTo.forEach(copy => {
    if(copy.archive){
            $row="<tr>"+
                "<td>"+c+"</td>"+
                "<td>"+copy.archive.serisal+"</td>"+
                "<td>"+copy.archive.title+"</td>"+
                "<td>"+copy.archive.name+"</td>"+
                "<td>"+copy.archive.date+"</td>"+
                "<td>";
                    attach='';
                    if(copy.archive.files.length>0){
                    var j=0;
                    for(j=0;j<copy.archive.files.length;j++){
                        shortCutName=copy.archive.files[j].real_name;
                        urlfile='{{ asset('') }}';
                        urlfile+=copy.archive.files[j].url;
                        if(copy.archive.files[j].extension=="jpg"||copy.archive.files[j].extension=="png")
                        fileimage='{{ asset('assets/images/ico/image.png') }}';
                        else if(copy.archive.files[j].extension=="pdf")
                        fileimage='{{ asset('assets/images/ico/pdf.png') }}';
                        else if(copy.archive.files[j].extension=="excel"||copy.archive.files[j].extension=="xsc")
                        fileimage='{{ asset('assets/images/ico/excellogo.png') }}';
                        else
                        fileimage='{{ asset('assets/images/ico/file.png') }}';
                            shortCutName=shortCutName.substring(0, 20);
                            attach+='<div id="attach" class=" col-sm-6 ">' +
                                '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                +'    <span class="attach-text">'+shortCutName+'</span>'
                                +'    <a class="attach-close1" href="'+urlfile+'" style="color: #74798D; float:left;" target="_blank"><img style="width: 20px;"src="'+fileimage+'"></a>'
                                +'    <a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                +'      <input type="hidden" id="formDataaaimgUploads[]" name="formDataaaimgUploads[]" value="'+shortCutName+'">'
                                +'             <input type="hidden" id="formDataaaorgNameList[]" name="formDataaaorgNameList[]" value="'+shortCutName+'">'
                                +'    </div>'
                                +'  </div>' +
                                '</div>'
                    }
                    $row += attach;
                    attach='';
                }
                
               
                $row += "</td></tr>";
            $('#copyToList').append($row)
            c++;}
  });
  $('.copyToTbl').DataTable({

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
    @endif
}
</script>

