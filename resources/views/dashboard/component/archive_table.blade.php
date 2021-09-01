@if ($type=="subscriber")
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
                                <li class="nav-item">
                                  <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#xtab1" aria-expanded="true">شهادات</a>
                                </li>
                                
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#xtab2" aria-expanded="true">أرشيف الصادر</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#xtab3" aria-expanded="false">أرشيف الوارد</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#xtab4" aria-expanded="false">أخرى </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab5" data-toggle="tab" aria-controls="tab5" href="#xtab5" aria-expanded="false">شهادة تسجيل  اراضي</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab6" data-toggle="tab" aria-controls="tab6" href="#xtab6" aria-expanded="false">أرشيف رخص البناء</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab7" data-toggle="tab" aria-controls="tab7" href="#xtab7" aria-expanded="false">أرشيف ملف الترخيص</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="base-tab8" data-toggle="tab" aria-controls="tab8" href="#xtab8" aria-expanded="false">نسخة الى</a>
                                </li>
                              </ul>
                              <div class="tab-content px-1 pt-1">
                                <div role="tabpanel" class="tab-pane active" id="xtab1" aria-expanded="true" aria-labelledby="base-tab1">
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
                                  <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl2">
                                      <thead>
                                          <tr style="text-align:center !important;background: #00A3E8;">
                                              <th width="50px">
                                              #
                                              </th>
                                              <th width="80px">
                                              رقم الرخصة
                                              </th>
                                              <th width="250px">
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
                                      <tbody id="recListaa">
                                      </tbody>
                                  </table>
                        </p>
                                </div>
                                <div class="tab-pane" id="xtab7" aria-labelledby="base-tab7">
                                  <p>
                                  <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl2">
                                      <thead>
                                          <tr style="text-align:center !important;background: #00A3E8;">
                                              <th width="50px">
                                              #
                                              </th>
                                              <th width="80px">
                                              رقم ملف الترخيص
                                              </th>
                                              <th width="250px">
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
                                      <tbody id="recListaa">
                                      </tbody>
                                  </table>
                        </p>
                                </div>
                                <div class="tab-pane" id="xtab99" aria-labelledby="base-tab99">
                                  <p>
                                  <table width="100%" class="detailsTB table">
                                  <tr>
                                    <th style="width: 300px;">عنوان الأرشيف</th>
                                    <th style="width: 100px;">التاريخ</th>
                                    <th>المرفقات </th>
                                    <th style="width: 80px;">تحميل </th>
                                  </tr>
                                  <tr>
                                    <td>
                                        <input type="text" name="ArchCustomTitle" id="ArchCustomTitle" class="form-control" />
                                    </td>
                                    <td>
                                        <input type="text" name="ArchCustomDate" id="ArchCustomDate" class="form-control singledate" data-mask="00/00/0000" maxlength="10" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y')?>" />
                                        <input type="hidden" name="fromname" id="fromname" class="form-control" value="ArchCustomFormData" />
                                        <input type="hidden" name="ArchCustompk_i_id" id="ArchCustompk_i_id" class="form-control" value=""/>
                                    </td>
                                    <td>
                                        <div class="row ArchCustomFormDataImagesArea">
                                                      </div>
                                                      <div class="row ArchCustomFormDataFilesArea" style="margin-left: 0px;">
                                                      </div>
                                    </td>
                                    <td>
                                        <a href="#" onclick="document.getElementById('ArchCustomFormDataupload-file[]').click(); return false" class="attach-icon"><i class="fas fa-paperclip"></i></a>
                                        <a href="#" onclick="document.getElementById('ArchCustomFormDataupload-image[]').click(); return false" class="attach-icon"><i class="far fa-image"></i></a>
                                        <input type="file" class="form-control-file" id="ArchCustomFormDataupload-file[]" multiple="" name="ArchCustomFormDataUploadFile[]" onchange="doUploadAttachArch('ArchCustomFormData')" style="display: none" accept=".doxc, .xlsx, .pptx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                                        <input type="file" class="form-control-file" id="ArchCustomFormDataupload-image[]" multiple="" name="ArchCustomFormDataUploadImage[]" onchange="doUploadAttachArch('ArchCustomFormData')" accept="image/*" style="display: none">
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <th colspan="4" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" id="" style="" onclick="saveArchCustomForm()">
                                        حفظ    
                                        </button>
                                    </th>
                                  </tr>
                                  <tbody id="ArchCustomList">
                                  </tbody>
                                </table>
                                  </p>
                                </div>
                                <div class="tab-pane" id="xtab2" aria-labelledby="base-tab2">
                                  <p>
                            <table width="100%" class="detailsTB table SaderTbla">
                                  <thead>
                                  <tr>
                                    <th width="50px">#</th>
                                    <th width="80px">رقم المراسلة</th>
                                    <th>عنوان المراسلة</th>
                                    <th width="80px">التاريخ </th>
                                    <th>المرفقات </th>
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
                                          <th>عنوان الأرشيف</th>
                                          <th width="120px"> صادر من </th>
                                          <th width="80px">التاريخ </th>
                                          <th>المرفقات </th>
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
                                    <th>عنوان المراسلة</th>
                                    <th width="80px">التاريخ </th>
                                    <th>المرفقات </th>
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
                                    <th>عنوان المراسلة</th>
                                    <th width="80px">انوعها</th>
                                    <th width="80px">التاريخ </th>
                                    <th>المرفقات </th>
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
@elseif ($type=="project")
<div class="modal fade text-left" id="OrgArchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel1">الأرشيف </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-body">
                    <form id="orgArchFormData">
                        
    					<div style="overflow-y: auto; max-height:300px;">
              <table width="100%" class="detailsTB table archTbl">
                            <thead>
    						    <tr>
        							<th># </th>
        							<th>العنوان </th>
        							<th>التاريخ</th>
        							<th>النوع</th>
        							<th></th>
        							<th style="width: 300px;">المرفقات </th>
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
@elseif ($type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type == 'equip'||$type == 'org')
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
                            <th>#</th>
                            <th>رقم المراسلة</th>
                            <th>عنوان المراسلة</th>
                            <th>التاريخ </th>
                            <th>نسخة إلى </th>
                            <th>المرفقات </th>
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
                            <th>عنوان المراسلة</th>
                            <th width="80px">التاريخ </th>
                            <th>المرفقات </th>
                          </tr>
                      </thead>
                      <tbody id="msgRList">
                      </tbody>
                    </table>
                </p>
                        </div>
                        <div style="max-height:400px; overflow-x:hidden; overflow-y:scroll" class="tab-pane" id="tabMM3" aria-labelledby="base-tab3">
                          <p >
                    <table width="100%" class="detailsTB table OtherTbl">
                          <thead>
                          <tr>
                            <th width="50px">#</th>
                            <th width="80px">رقم الأرشيف </th>
                            <th>عنوان الأرشيف</th>
                            <th width="80px">التاريخ </th>
                            <th>المرفقات </th>
                          </tr>
                      </thead>
                      <tbody id="msgOList">
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
                            <th>عنوان الأرشيف</th>
                            <th width="80px">نوعها</th>
                            <th width="80px">التاريخ </th>
                            <th>المرفقات </th>
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
function drawTablesArchive($archives,$copyTo)
{
  @if ($type=="subscriber")
    var s=1;
    var w=1;
    var c=1;
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
                "<td>"+archive.fileIDS+"</td>"+
                
                "</tr>";
            $('#msgRList1').append($row)
            w++;
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
   $copyTo.forEach(copy => {
            $row="<tr>"+
                "<td>"+c+"</td>"+
                "<td>"+copy.archive.serisal+"</td>"+
                "<td>"+copy.archive.title+"</td>"+
                "<td>"+copy.archive.name+"</td>"+
                "<td>"+copy.archive.date+"</td>"+
                "<td>"+copy.archive.fileIDS+"</td>"+
                "</tr>";
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


  @elseif ($type=="project")
        var proj=1
        $archives.forEach(archive => {
          console.log(archive);
           $row="<tr>"+
                "<td>"+proj+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>"+archive.type+"</td>"+
                "<td>"+archive.fileIDS+"</td>"+
                "</tr>";
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

    @elseif ($type=='vehicle'||$type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands'||$type == 'equip'||$type == 'org')
    var s=1;
    var w=1;
    $archives.forEach(archive => {
        
        if(archive.type=="outArchive")
           { $row="<tr>"+
                "<td>"+s+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td></td>"+
                "<td>"+archive.fileIDS+"</td>"+
                "</tr>";
            $('#msgList').append($row)
            s++;
           }
           if(archive.type=="inArchive")
           { $row="<tr>"+
                "<td>"+w+"</td>"+
                "<td>"+archive.serisal+"</td>"+
                "<td>"+archive.title+"</td>"+
                "<td>"+archive.date+"</td>"+
                "<td>"+archive.fileIDS+"</td>"+
                "</tr>";
            $('#msgRList').append($row)
            w++;
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

