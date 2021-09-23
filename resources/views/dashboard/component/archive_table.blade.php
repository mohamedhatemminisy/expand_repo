@if ($type=="subscriber"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type == 'equip'||$type == 'org'||$type == 'employee'||$type == 'depart')

<div class="modal fade text-left" id="CertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
aria-hidden="true">
  <div class="modal-dialog"  role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel1">وثائق  (<span id="CitizenName"></span>)</h4>
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
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab8" data-toggle="tab" aria-controls="tab8" href="#xtab8" aria-expanded="false">نسخة الى</a>
                                </li>
                              </ul>
                              <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane " id="xtab1" aria-expanded="true" aria-labelledby="base-tab1">
                                  <p>
                                  <table style="width:100%; margin-top: -10px;" class="detailsTB table engTbl">
                                      <tr>
                                          <th scope="col">اسم الشهادة</th>
                                          <th scope="col">تاريخ الاصدار</th>
                                          <th scope="col" >اسم الموظف</th>
                                          <th scope="col" >طباعة</th>
                                      </tr>

                                      <tbody id="subTask">

                                      </tbody>
                                  </table>
                                  </p>
                                </div>
                                <div class="tab-pane" id="xtab5" aria-labelledby="base-tab5">
                                  <p>
                                  <table width="100%" class="detailsTB table engTbl">
                          <tr>
                            <th>#</th>
                            <th>رقم الشهادة </th>
                            <th>اسم المشروع</th>
                            <th>تاريخ </th>
                            <th width="width: 40px;">طباعة</th>
                          </tr>
                          <tbody id="lecearthlist">
                          </tbody>
                        </table>
                        </p>
                                </div>
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

                                <div class="tab-pane active" id="xtab2" aria-labelledby="base-tab2">
                                  <p>
                            <table width="100%" class="detailsTB table SaderTbla">
                                  <thead>
                                  <tr>
                                    <th width="50px">#</th>
                                    <th width="80px">رقم المراسلة</th>
                                    <th width="120px">عنوان المراسلة</th>
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
                                          <th width="80px">رقم الأرشيف</th>
                                          <th width="120px">عنوان الأرشيف</th>
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
                                    <th width="80px">رقم المراسلة</th>
                                    <th width="120px">عنوان المراسلة</th>
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
                                    <th width="80px">رقم المراسلة</th>
                                    <th width="120px">عنوان المراسلة</th>
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
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@elseif ($type=="project"||$type=="orgnization")
<div class="modal fade text-left" height="500px" id="OrgArchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel1">الأرشيف </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-body">
                    <form id="orgArchFormData">
                        
    					<div>
              <table width="100%" class="detailsTB table archTbl">
                            <thead>
    						    <tr>
        							<th width="50px"># </th>
                                    <th width="80px">رقم الأرشيف </th>
        							<th width="80px">العنوان </th>
        							<th width="60px">التاريخ</th>
        							<th width="50px">النوع</th>
        							<th width="260px">المرفقات </th>
        						</tr>
                            </thead>
    						<tbody id="msgRList1">
    						    
    						</tbody>
    					</table>
    					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@elseif ($type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type == 'equip'||$type == 'org'||$type == 'employee'||$type == 'depart')
  <div class="modal fade text-left" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1"> 
          الأرشيف
          <span id="msgTitleSpn"></span></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-body">
              <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tabMM1" aria-expanded="true">أرشيف الصادر</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tabMM2" aria-expanded="false">أرشيف الوارد</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tabMM3" aria-expanded="false">نسخة إلى </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tabMM4" aria-expanded="false"> أخرى </a>
                        </li>
                      </ul>
                      <div class="tab-content px-1 pt-1">
                        <div role="tabpanel"   style="max-height:400px; overflow-x:hidden; overflow-y:scroll"class="tab-pane active" id="tabMM1" aria-expanded="true" aria-labelledby="base-tab1">
                          <p>
                    <table width="100%" class="detailsTB table SaderTbl">
                          <thead>
                          <tr>
                            <th width="50px">#</th>
                            <th width="80px">رقم المراسلة</th>
                            <th width="120px">عنوان المراسلة</th>
                            <th width="90x">التاريخ </th>
                            <th width="260px">المرفقات </th>
                          </tr>
                      </thead>
                      <tbody id="msgList">
                      </tbody>
                    </table>
                          </p>
                        </div>
                        <div class="tab-pane"  style="max-height:400px; overflow-x:hidden; overflow-y:scroll "id="tabMM2" aria-labelledby="base-tab2">
                          <p>
                    <table width="100%" class="detailsTB table waredTbl">
                          <thead>
                          <tr>
                            <th width="50px">#</th>
                            <th width="80px">رقم المراسلة</th>
                            <th width="120x">عنوان المراسلة</th>
                            <th width="80px">التاريخ </th>
                            <th width="260px">المرفقات </th>
                          </tr>
                      </thead>
                      <tbody id="msgRList">
                      </tbody>
                    </table>
                </p>
                        </div>
                        <div style="max-height:400px; overflow-x:hidden; overflow-y:scroll" class="tab-pane" id="tabMM3" aria-labelledby="base-tab3">
                          <p >
                    <table width="100%" class="detailsTB table copyToTbl">
                          <thead>
                          <tr>
                            <th width="50px">#</th>
                            <th width="80px">رقم الأرشيف </th>
                            <th width="120px">عنوان الأرشيف</th>
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
                        <div style="max-height:400px; overflow-x:hidden; overflow-y:scroll" class="tab-pane" id="tabMM4" aria-labelledby="base-tab4">
                          <p >
                    <table width="100%" class="detailsTB table OtherTbl">
                          <thead>
                          <tr>
                            <th width="50px">#</th>
                            <th width="80px">رقم الأرشيف </th>
                            <th width="80px">عنوان الأرشيف</th>
                            <th width="80px">نوعها</th>
                            <th width="80px">التاريخ </th>
                            <th width="260px">المرفقات </th>
                          </tr>
                      </thead>
                      <tbody id="msgOList1">
                      </tbody>
                    </table>
                </p>
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
    @if ($type=="subscriber"||$type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type == 'equip'||$type == 'org'||$type == 'employee'||$type == 'depart')
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
    $archives.forEach(archive => {
        
        if(archive.type=="outArchive")
           { $row="<tr>"+
                "<td>"+s+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>";
                attach='';
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
    console.log($archivesLic);
        $archivesLic.forEach(archive => {
           if(archive.type=="licArchive")
           { $row="<tr>"+
                "<td>"+lc+"</td>"+
                "<td>"+archive.licNo+"</td>"+
                "<td>"+archive.license_id+"</td>"+
                "<td>"+archive.license_type+"</td>"+
                "<td>";
                attach='';
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
            $row="<tr>"+
                "<td>"+c+"</td>"+
                "<td>"+copy.archive.serisal+"</td>"+
                "<td>"+copy.archive.title+"</td>"+
                "<td>"+copy.archive.name+"</td>"+
                "<td>"+copy.archive.date+"</td>"+
                "<td>";
                attach='';
                var i=1;
                if(copy.archive.fileIDS&&typeof(copy.archive.fileIDS)=="object"){ 
                copy.archive.fileIDS.forEach(file => {
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
            $('#copyToList').append($row)
            c++;
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


  @elseif ($type=="project"||$type=="orgnization")
  if ( $.fn.DataTable.isDataTable( '.archTbl' ) ) {
    $(".archTbl").dataTable().fnDestroy();
            $('#msgRList1').empty();
            console.log("inside");
            }
        var proj=1
        $archives.forEach(archive => {
          console.log(archive);
           $row="<tr>"+
                "<td>"+proj+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>"+typeArray[archive.type]+"</td>"+
                "<td>";
                attach='';
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
            $('#msgRList1').append($row)
            proj++;
        });
        
        $('.archTbl').DataTable({
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

    @elseif ($type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type == 'equip'||$type == 'org'||$type == 'employee'||$type == 'depart')
    var s=1;
    var w=1,p=1,c=1;
    
    $archives.forEach(archive => {
        
        if(archive.type=="outArchive")
           { $row="<tr>"+
                "<td>"+s+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>";
                attach='';
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
            $('#msgList').append($row)
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
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
            $('#msgRList').append($row)
            w++;
           }
           if(archive.type=="projArchive"||archive.type=='munArchive'||archive.type=='empArchive'||archive.type=='assetsArchive'||archive.type=='citArchive'||archive.type=='depArchive')
           {
             
              $row="<tr>"+
                "<td>"+p+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+typeArray[archive.type]+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>";
                attach='';
                var i=1;
                if(archive.fileIDS&&typeof(archive.fileIDS)=="object"){ 
                archive.fileIDS.forEach(file => {
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
            $('#msgOList1').append($row)
            p++;
           }
           
           $copyTo.forEach(copy => {
              $row="<tr>"+
                  "<td>"+c+"</td>"+
                  "<td>"+copy.archive.serisal+"</td>"+
                  "<td>"+copy.archive.title+"</td>"+
                  "<td>"+copy.archive.name+"</td>"+
                  "<td>"+copy.archive.date+"</td>"+
                  "<td>";
                attach='';
                var i=1;
                if(copy.archive.fileIDS&&typeof(copy.archive.fileIDS)=="object"){ 
                copy.archive.fileIDS.forEach(file => {
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
              $('#copyToList').append($row)
              c++;
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
        
      });

      $('.OtherTbl').DataTable({
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

    $('.SaderTbl').DataTable({
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
    $('.waredTbl').DataTable({

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

