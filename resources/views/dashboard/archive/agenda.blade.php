@extends('layouts.admin')
@section('search')
<li class="dropdown dropdown-language nav-item hideMob">
            <input id="searchContent" name="searchContent" class="form-control SubPagea round full_search" placeholder="بحث" style="text-align: center;width: 350px; margin-top: 15px !important;">
          </li>
@endsection
@section('content')
    <div role="tabpanel" class="tab-pane active show" id="activeIcon1" aria-labelledby="activeIcon1-tab1"
        aria-expanded="true">
        <form action="C_agenda/saveMeeting" id="formData" method="post" novalidate>
            <!-- horizontal grid start -->
            <input type="hidden" name="topicToEdit" id="topicToEdit" value="0">
            <section class="horizontal-grid" id="horizontal-grid">
                <div class="row white-row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body" style="padding-bottom: 0px;">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group validate">
                                                    <div class="input-group w-s-87">
                                                        <img src="{{ asset('assets/images/ico/meeting.png') }}"
                                                            style="float: right;height: 34px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                style="width: 81px; ">
                                                                اسم الاجتماع
                                                            </span>
                                                        </div>
                                                        <input type="hidden" id="meetingID" name="meetingID" value="0">
                                                        <input type="hidden" id="lastorder" name="lastorder" value="1">
                                                        <select type="text" id="meetingTitleName" name="meetingTitleName"
                                                            class="form-control alphaFeild"
                                                            style="height: 34px !important;width: 115px;"
                                                            aria-invalid="false"
                                                            onchange="DisplayMeeting();$('.allmember').addClass('hide');$('.meeting'+$(this).val()).removeClass('hide')">
                                                            <option disabled selected> -- اختر -- </option>
                                                            @if(count($agendaExtention)>0)
                                                            @foreach($agendaExtention as $agenda)
                                                            <option value="{{$agenda->id}}">{{$agenda->name}}</option>

                                                            @endforeach
                                                            @endif
                                                            {{-- <?php if(isset($meetingNames) && !empty($meetingNames) && count($meetingNames) > 0){ ?>
                                                                <?php foreach ($meetingNames as $key => $value){ ?>
                                                                    <option value="<?php echo $value->pk_i_id; ?>"><?php echo $value->meetingnamear; ?></option>
                                                                <?php } ?>
                                                            <?php } ?> --}}
                                                        </select>

                                                        <div class="input-group-append"
                                                            onclick="AddNew('meetingTitle','اضافة اجتماع')"
                                                            style="cursor:pointet;padding-left: 5px;;margin-left:0px !important;">
                                                            <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-external-link"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group validate">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                style="width: 81px;">
                                                                رقم الجلسة
                                                            </span>
                                                            <input id="agendaNum" name="agendaNum" maxlength="20"
                                                                class="form-control"
                                                                style="height: calc(2.3rem + 2px) !important;"
                                                                onblur="DisplayMeeting()" placeholder=" رقم الاجتماع" on
                                                                aria-invalid="false">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group validate">
                                                    <div class="input-group w-s-87">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                style="width: 81px;">
                                                                تاريخ الجلسة
                                                            </span>
                                                            <input type="text" id="agendaDate" name="agendaDate"
                                                                class="form-control eng-sm singledatewithDay"
                                                                data-mask="00/00/0000 - EEEE" autocomplete="off"
                                                                placeholder="" aria-describedby="basic-addon1"
                                                                aria-invalid="false" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 startMeeting1" style="text-align:center; display:none;">
                                                <button type="button" name="mainbutton" id="mainbutton"
                                                    class="btn btn-primary" style="padding-top:5px;padding-bottom:5px"
                                                    onclick="startMeeting()">
                                                    بدء الجلسة
                                                </button>
                                            </div>
                                            <div class="col-md-3 startMeeting" style="text-align:center; display:none;">
                                                <!-- <div class="form-group ">
                                                        <div class="input-group w-s-87">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1" style="display:none;">
                                                                بحث في المواضيع 
                                                                </span>
                                                                <input type="text" id="TopicSrch" name="TopicSrch" class="form-control eng-sm " placeholder="أدخل نص البحث" style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                <input id="TopicSrch" name="TopicSrch"
                                                    class="form-control SubPagea round ac1 ui-autocomplete-input"
                                                    placeholder="بحث في المواضيع " style="text-align: center;width: 350px; "
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="content-body">
                <!-- card actions section start -->
                <section id="card-actions">
                </section>
            </div>
            <div class="content-body">
                <!-- card actions section start -->
                <section id="card-actions">
                    <div class="row">
                        <div class="col-12" id="topicAppend1">
                            <table style="width:100%;direction: rtl;text-align: right;background-color: #ffffff;"
                                class="detailsTB table wtbl">
                                <thead>
                                    <tr
                                        style="text-align:center !important;background-color: #0073AA; color:#ffffff; height:45px !important;">
                                        <th scope="col" style=" width: 30px;color:#ffffff; " class="th1"
                                            width="50">
                                            #
                                        </th>
                                        <th scope="col" class=" th1" style="text-align:center;color:#ffffff; "
                                            width="450px">
                                            الموضوع
                                        </th>
                                        <th scope="col" class=" th1" style="text-align:center;color:#ffffff; "
                                            width="200">
                                            مرتبط ب
                                        </th>
                                        <th scope="col" class="th1" style="text-align:center;color:#ffffff; "
                                            width="450px">
                                            نص القرار
                                        </th>
                                        <th scope="col" class=" th1" width="140"> </th>
                                    </tr>
                                </thead>
                                <tbody id="recList">
                                    <tr class="card123">
                                        <td scope="col">
                                            1
                                        </td>
                                        <td scope="col">
                                            <textarea class="form-control" placeholder="أدخل نص الموضوع هنا"
                                                id="topicTitle1" name="topicTitle1" style=" text-align: right;"
                                                onchange="DrawBorder(1)"></textarea>
                                            <input type="hidden" id="topicid" name="topicid[]" value="1">
                                            <input type="hidden" id="topicid1" name="topicid1" value="1">
                                        </td>
                                        <td scope="col">
                                            <input id="applicantName1" onchange="DrawBorder(1)" name="applicantName1"
                                                class="form-control ccac" placeholder="المستفيد"
                                                style="text-align: right; border:0px solid #000000;">
                                            <input type="hidden" id="applicantID" name="applicantID1" class="form-control"
                                                style="text-align: center;">

                                        </td>
                                        <td scope="col">
                                            <textarea type="text" class="form-control" onchange="DrawBorder(1)" rows="2"
                                                id="descisiontxt1" name="descisiontxt1"></textarea>
                                            <div class="row subject1ImagesArea">
                                            </div>
                                            <div class="row subject1FilesArea">
                                            </div>
                                        </td>
                                        <td scope="col">
                                            <input type="hidden" name="fromname" id="fromname" value="subject1">
                                            <input type="file" class="form-control-file" id="subject1UploadFile[]"
                                                multiple="" name="subject1UploadFile[]" onchange="doUploadAttachNew(1)"
                                                style="display: none">
                                                <meta name="csrf-token" content="{{ csrf_token() }}" />

                                            <input type="file" class="form-control-file" id="subject1UploadImage[]"
                                                multiple="" name="subject1UploadImage[]" onchange="doUploadAttachNew(1)"
                                                accept="image/*" style="display: none">

                                            <span class="attach-header">
                                                <span id="attach-required">*</span>
                                                <span class="attach-icons" style="margin-left: 0px;">
                                                    <button type="button" name="mainbutton" id="mainbutton"
                                                        style="border:0px; background:#ffffff"
                                                        onclick="if (saveMeeting()){addTopicTemplate();$(this).hide()}">
                                                        <img src="{{ asset('assets/images/ico/floppy-icon.png') }}"
                                                            style="height: 32px;">
                                                    </button>
                                                    <a href="#"
                                                        onclick="document.getElementById('subject1UploadFile[]').click(); return false"
                                                        class="attach-icon">
                                                        <img src="{{ asset('assets/images/ico/upload.png') }}"
                                                            style="height: 32px;">
                                                    </a>
                                                    <a href="#"
                                                        onclick="document.getElementById('subject1UploadImage[]').click(); return false"
                                                        class="attach-icon hide">
                                                        <img src="{{ asset('assets/images/ico/upload.png') }}"
                                                            style="height: 32px;">
                                                    </a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

            <section class="horizontal-grid" id="horizontal-grid">
                <div class="row white-row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-1 startMeeting" style="text-align:center; display:none;">
                                                <button type="button" name="mainbutton" id="mainbutton"
                                                    class="btn btn-primary" style="padding-top:5px;padding-bottom:5px"
                                                    onclick="endMeeting()">
                                                    إنهاء الجلسة
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade text-left" id="BeginMeeting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog2" role="document">
                    <div class="modal-content" style="width: 450px;">
                        <div class="modal-header modal-header2">
                            <h4 class="modal-title" id="myModalLabel2" style="color: #ffffff;"><span
                                    style="padding-right: 160px;">بدء الجلسة</span></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="color: #ffffff;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="input-group" style="max-height: 200px; overflow: auto;">
                                        <div class="input-group-prepend" style="margin-right:15%">
                                            <span class="input-group-text" id="basic-addon1" style="width: 81px;">
                                                تاريخ الجلسة
                                            </span>
                                            <input type="text" id="beginAgendaDate" name="beginAgendaDate"
                                                class="form-control eng-sm singledatewithDay" data-mask="00/00/0000 - EEEE"
                                                autocomplete="off" placeholder="" aria-describedby="basic-addon1"
                                                aria-invalid="false" style="width: 100%;">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="display:none">
                                    <div class="input-group w-s-87">
                                        <div class="input-group-prepend">
                                            <span style="margin-left: 10px; font-weight: bold; color: black">
                                                من الساعة
                                            </span>
                                            <input type="time" id="starttime" name="starttime" value="00:00">
                                            <span
                                                style="margin-left: 10px; margin-right: 10px; font-weight: bold; color: black;">
                                                الى الساعة
                                            </span>
                                            <input type="time" id="endtime" name="endtime" value="00:00">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group" id="attendessTable"
                                        style="max-height: 200px; overflow: auto;">
                                        <table style="width:100%" class="detailsTB table">
                                            <tr>
                                                <th scope="col">الرجاء اختيار الحضور</th>
                                            </tr>
                                            <tbody id="subTask3">
                                                {{-- <?php $i=1;
                        if(isset($meetingMembers) && !empty($meetingMembers) && count($meetingMembers) > 0){ ?>
                            <?php foreach ($meetingMembers as $key => $value){ ?>
                            <tr class="allmember meeting<?php echo $value->meeting_id; ?>">
                                <td width="20px">
                                    <?php echo $i;
                                    $i++; ?>
                                </td>
                                <td>
                                    <?php echo $value->memername; ?>
                                </td>
                                <td width="40px">
                                    <input type="checkbox" name="attendance[]" class="attendance" value="<?php echo $value->memberID; ?>">
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group" style="text-align:center">
                                    <button type="button" name="beginmeetsubmit" class="btn btn-info modalBtn"
                                        onclick="beginMeeting()">حفظ </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>

@endsection
@section('script')
    @include('dashboard.archive.defineMeeting');
    @include('dashboard.archive.takeADecision');

    <script>
    itopic=1;
    function saveMeeting(){
        //meetingID
        //lastorder
        if($("#meetingTitleName").val()==null){
            $("#meetingTitleName").addClass('error');
            return false;
        }
        
        if($("#agendaNum").val()==''){
            $("#agendaNum").addClass('error');
            return false;
        }
        
        $("#lastorder").val(itopic)
        
        $(".loader").removeClass('hide');
        $(".form-actions").addClass('hide');
        var formData = new FormData($("#formData")[0]);
        $.ajax({
          url: 'C_agenda/ajaxSaveMeeting',
          type: 'POST',
          data: formData,
          dataType:"json",
          async: true,
          success: function (data) {
              if(data.status.success){
                  DisplayMeeting()
                    $(".loader").addClass('hide');
                    $(".alert-danger").addClass("hide");
                    $(".alert-success").removeClass('hide');
                    $("#succMsg").text(data.status.msg)
                    $("#meetingID").val(data.id)
                    $("#topicid"+(itopic-1)).val(data.topicid)
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                    },2000)
                }
                else {
                    $(".loader").addClass('hide');
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    $("#errMsg").text(data.status.msg)
                }
                $(".loader").addClass('hide');
                $(".form-actions").removeClass('hide');
          },
          cache: false,
          contentType: false,
          processData: false
        });
                  
        return true;
    }
    function editSubject(id){
        
        if(confirm('هل تريد تعديل الموضوع')){
            $("#topicToEdit").val(id);
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxEditMeeting',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            
                            setTimeout(function(){
                              $(".alert-danger").addClass("hide");
                              $(".alert-success").addClass("hide");
                          },2000)
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                        
            $(".card"+id).removeAttr('style','border: 2px solid #0000ff !important;')
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
    function deleteSubject(id){
        if( confirm('هل تريد حذف الموضوع')){
        
            topicid=$("#topicid"+id).val();
            if(topicid>0){
                var formData = {'topicid':topicid};
                $.ajax({
                  url: 'C_agenda/ajaxDeleteMeeting',
                  type: 'POST',
                  data: {'topicid':topicid},
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            
                  elemCt1=0;
                  $('.card123').each(function(){
                  if(typeof $(this).attr('style') !== "undefined")
                    elemCt1++
                    });
                    if(elemCt1==0)
                        $(window).unbind('beforeunload');
                    console.log(elemCt1)
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                  },2000)
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                            return true;
                  },
                });
            }
                return true;
        }
                return false;
    }
    function AttachReplay(id){
        //DoAjax
            $("#topicToEdit").val(id);
            $(".allDec").html('');
            
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxReplay',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      $("#descisiontxt").val(data.topicData[0].decision)
                      
                      for(i=0;i<data.topicData[0].agreeList.length;i++){
                        $('.agreedMember').each(function () {
                            if ($(this).val()==data.topicData[0].agreeList[i].memberID) {
                                   $(this).trigger('click')
                               }
                            });
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
        $('.dec'+id).html($("#takeADecision").html());
        $('.dec'+id).toggle()
    }
    function saveDesicion(id){
        
            $("#topicToEdit").val(id);
        if(confirm('هل تريد حفظ التعديلات')){
            //$("#topicToEdit").val(id);
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxSaveDesicion',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            $("#row"+id).removeAttr('style')
                            
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                  },2000)
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
    
    function DisplayMeeting(){
        
        if($("#meetingTitleName").val()==null){
            return false;
        }
        
        if($("#agendaNum").val()==''){
            return false;
        }
        
                $(".loader").removeClass('hide');
        var formData =  new FormData($("#formData")[0]);;
        $.ajax({
          url: 'C_agenda/ajaxDisplayMeeting',
          type: 'POST',
          data: formData,
          dataType:"json",
          async: true,
          success: function (data) {
            $("#topicAppend").html('')
                $("#recList").html('')
                itopic=data.topicData.length;
                console.log(itopic)
              if(data.agendaData.length>0){
                $("#meetingID").val(data.agendaData[0].pk_i_id)
                $("#agendaDate").val(data.agendaData[0].agendastartdate)
                $("#beginAgendaDate").val(data.agendaData[0].agendastartdate)
                $("#starttime").val(data.agendaData[0].starttime)
                $("#endtime").val(data.agendaData[0].endtime)
                $(".startMeeting").show()
                $("#topicAppend").html('')
                for(i=0;i<data.topicData.length;i++)
                    $("#recList").append(data.topicData[i].html)
                console.log(data.attendData)
                for(i=0;i<data.attendData.length;i++){
                    $('.attendance').each(function () {
                       if ($(this).val()==data.attendData[i].memberid) {
                           $(this).trigger('click')
                       }
                    });
                }
                $(".group").colorbox({rel:'group'});
                $(".form-actions").removeClass('hide');
                if(data.agendaData[0].endtime != null && data.agendaData[0].endtime.length>4)
                    $(".ft-check").show()
                else 
                    $(".ft-check").hide()
                    
                $('a[data-action="expand"]').on('click',function(e){
                    e.preventDefault();
                    $(this).closest('.card').find('[data-action="expand"] i').toggleClass('ft-maximize ft-minimize');
                    $(this).closest('.card').toggleClass('card-fullscreen');
                });
                
                if(data.agendaData[0].is_closed==1){
                    
                    $('.fa-times').hide()   
                    $('.attach-close1').hide()
                    $('.fa-save').hide() 
                    $('.ft-x').hide() 
                    $('.attach-icon').hide() 
                }else
                
                addTopicTemplate()
              }else
                addTopicTemplate()
              
            $(".loader").addClass('hide');
    
          },
          cache: false,
          contentType: false,
          processData: false
        });
        return true;
    }
    
        function startMeeting(){
    
        if( $('#meetingTitle').val() != '' ){
            if( $('#agendaNum').val() != 0){
                //$("#startMeet").hide();
    
    
                $(".loader").removeClass('hide');
                $("#beginAgendaDate").val($("#agendaDate").val());
                $("#BeginMeeting").modal('show');
                //DrawEmployee($("#meetingTitleID").val());
                $(".loader").addClass('hide');
    
                $('#repeat').css({"display":"none"});
                /*$('#mainbutton').css({"display":"none"});
                $('#startMeet').css({"display":"none"});*/
    
            $(".showDec").show()
                for(var i=0;i<=itopic;i++){
                    $('#decision'+i).css({"display":"block"});
                  }
            }
            else {
                alert('الرجاء ادخال رقم الاجتماع');
                $('#agendaNum').val('');
            }
        }
        else{
            alert('الرجاء ادخال اسم الاجتماع');
            $('#meetingTitle').val('');
        }
    
    }
    
    function beginMeeting(){
        if(confirm('هل تريد إضافة الحضور')){
            //$("#topicToEdit").val(id);
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxSaveAttendance',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            $("#BeginMeeting").modal('hide')
                            
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                  },2000)
                            $(".ft-check").show()
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
    
    function endMeeting(){
        if(confirm('عند إنهاء الجلسة لن تتمكن من تعديل أي محتوى\r\n هل تريد بالفعل إنهاء الجلسة')){
            //$("#topicToEdit").val(id);
                var formData =  new FormData($("#formData")[0]);;
                $.ajax({
                  url: 'C_agenda/ajaxEndMeeting',
                  type: 'POST',
                  data: formData,
                  dataType:"json",
                  async: true,
                  success: function (data) {
                      if(data.status.success){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").removeClass('hide');
                            $("#succMsg").text(data.status.msg)
                            $("#BeginMeeting").modal('hide')
                            
                            
                    $('.fa-times').hide()   
                    $('.attach-close1').hide()
                    $('.fa-save').hide() 
                    $('.ft-x').hide() 
                    $('.attach-icon').hide() 
                    //$('.fa-paperclip').remove()
                    setTimeout(function(){
                      $(".alert-danger").addClass("hide");
                      $(".alert-success").addClass("hide");
                  },2000)
                            
                        }
                        else {
                            $(".alert-success").addClass("hide");
                            $(".alert-danger").removeClass('hide');
                            $("#errMsg").text(data.status.msg)
                        }
                        $(".loader").addClass('hide');
                        $(".form-actions").removeClass('hide');
                  },
                  cache: false,
                  contentType: false,
                  processData: false
                });
                return true;
        }
        return false;
    }
        $(document).ready(function(){
            
            $( ".ccac" ).autocomplete({
                source: "generalSearch",
                minLength: 2,
                select: function( event, ui ) {
                    $(this).next().val(ui.item.category+''+ui.item.id)
                    $("#applicantName").val(ui.item.label)
                }
            });
            /*
            $( ".ccac" ).autocomplete({
                source: "searchAllCustomerCitizenByName",
                minLength: 2,
                select: function( event, ui ) {
                    $(this).next().val(ui.item.contact_id)
                    $("#applicantName").val(ui.item.label)
                }
            })*/
        } );
        
        function doUploadAttachNew(frmid){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $("#fromname").val('subject'+frmid)
            $("#startUpload").val(frmid)
            $(".loader").removeClass('hide');
            $(".form-actions").addClass('hide');
            var formData = new FormData($("#formData")[0]);

            $.ajax({
                url: 'agendaAttach',
                type: 'POST',
                data: formData,
                dataType:"json",
                async: true,
                success: function (data) {
                    row='';
                    row1='';
                    if(data.status.success){
                        DrawBorder(frmid)
                        for(j=imgCounter;j<data.img.length;j++){
                            if(data.img[j].type==1 ) {
                                shortCutName=data.img[j].orgname;
                                shortCutName=shortCutName.substring(0, 40)
                                row+='<div id="attach" class=" col-sm-12 ">' +
                                    '   <div class="attach" onmouseover="$(this).children().first().next().show()">'
                                    +'		<span class="attach-text">'+shortCutName+'</span>'
                                    +'		<a class="attach-close1" href="'+'uploads/'+data.img[j].name+'" style="color: #74798D; float:left;" target="_blank"><i class="fa fa-eye"></i></a>'
                                    +'		<a class="attach-close1" style="color: #74798D; float:left;" onclick="$(this).parent().parent().remove()">×</a>'
                                    +'      <input type="hidden" id="subject'+frmid+'imgUploads[]" name="subject'+frmid+'imgUploads[]" value="'+data.img[j].name+'">'
                                    +'             <input type="hidden" id="subject'+frmid+'orgNameList[]" name="subject'+frmid+'orgNameList[]" value="'+data.img[j].orgname+'">'
                                    +'		</div>'
                                    +'	</div>' +
                                    '</div>'
                            }
                            if(data.img[j].type==2 ) {
                                row1+='<div  class="col-sm-3" id="i'+(j+1)+'">'
                                    +'	   <div class="row"  onmouseover="$(this).children().first().children().first().next().show()"  onmouseout="$(this).children().first().children().first().next().hide()">'
                                    +'	       <div class="col-sm-12">'
                                    +'			   <a class="group" href="'+'uploads/'+data.img[j].name+'" title="'+data.img[j].orgname+'" style="color: #74798D" >' +
                                    '                <img src="'+'uploads/'+data.img[j].name+'" title="'+data.img[j].orgname+'" id="imgSlider'+(j+1)+'" width="100%"/></a>'
    
                                    +'		       <a class="attach-close" style="color: #74798D" onclick="$(this).parent().parent().parent().remove()" ><i class="fa fa-times"></i></a>'
                                    +'             <input type="hidden" id="subject'+frmid+'imgUploads[]" name="subject'+frmid+'imgUploads[]" value="'+data.img[j].name+'">'
                                    +'             <input type="hidden" id="subject'+frmid+'orgNameList[]" name="subject'+frmid+'orgNameList[]" value="'+data.img[j].orgname+'">'
                                    +'	       </div>'
                                    +'	   </div>'
                                    +'</div>'
                            }
                        }
                        //$(".attachs-carousel-container").html(row)
                        $(".alert-danger").addClass("hide");
                        $(".alert-success").removeClass('hide');
                        $("#succMsg").text(data.status.msg)
                        $(".subject"+frmid+"FilesArea").append(row)
                        console.log(".subject"+frmid+"FilesArea") 
                        $(".subject"+frmid+"ImagesArea").append(row1)
                        $(".loader").addClass('hide');
    
                        $(".group").colorbox({rel:'group'+frmid});
                        setTimeout(function(){
                            $(".alert-danger").addClass("hide");
                            $(".alert-success").addClass("hide");
                        },2000)
                    }
                    else {
                        $(".alert-success").addClass("hide");
                        $(".alert-danger").removeClass('hide');
                        $("#errMsg").text(data.status.msg)
                    }
                    $(".form-control-file").val('')
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                },
                error:function(){
                    $(".alert-success").addClass("hide");
                    $(".alert-danger").removeClass('hide');
                    $("#errMsg").text(data.status.msg)
                    $(".loader").addClass('hide');
                    $(".form-actions").removeClass('hide');
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
        itopic=1;
        function addTopicTemplate(){
            $('.loader').addClass('hide');
            $('.hasLabel').addClass('hide');
            $("#fromname").remove()
            itopic++
            console.log('New rec: '+itopic)
            $("#lastorder").val(itopic)
            template='<tr class="card123" id="row'+itopic+'">'
            +'                    <td scope="col">'
            +'                         '+itopic
            +'                    </td>'
            +'                    <td scope="col">'
            +'                        <textarea class="form-control" onchange="DrawBorder('+itopic+')" placeholder="أدخل نص الموضوع هنا" id="topicTitle'+itopic+'" name="topicTitle'+itopic+'" style="text-align: right;"></textarea>'
            +'                        <input type="hidden" id="topicid" name="topicid[]" value="'+itopic+'">'
            +'                        <input type="hidden" id="topicid'+itopic+'" name="topicid'+itopic+'" value="'+itopic+'">'
            +'                    </td>'
            +'                    <td scope="col">'
            +'                        <input id="applicantName'+itopic+'" onchange="DrawBorder('+itopic+')" name="applicantName'+itopic+'" class="form-control ccac"  placeholder="مقدم الطلب" style="text-align: right; border:0px solid #000000;">'
            +'                        <input type="hidden" id="applicantID" name="applicantID'+itopic+'" class="form-control" style="text-align: center;">'
            +'                                        <input type="hidden" name="fromname" id="fromname" value="subject'+itopic+'">'
            +'                                        <input type="file" class="form-control-file" id="subject'+itopic+'UploadFile[]" multiple="" name="subject'+itopic+'UploadFile[]" onchange="doUploadAttachNew('+itopic+')" style="display: none">'
            +'                                        <input type="file" class="form-control-file" id="subject'+itopic+'UploadImage[]" multiple="" name="subject'+itopic+'UploadImage[]" onchange="doUploadAttachNew('+itopic+')" accept="image/*" style="display: none">'
            
            +'                    </td>'
            +'                    <td scope="col">'
            +'<textarea  type="text" class="form-control" onchange="DrawBorder('+itopic+')" rows="2" id="descisiontxt'+itopic+'" name="descisiontxt'+itopic+'"></textarea>'
            +'                        '
            +'                                        <div class="row subject'+itopic+'ImagesArea">'
            +'                                        </div>'
            +'                                        <div class="row subject'+itopic+'FilesArea" style="margin-left: 0px;">'
            +'                                        </div>'
            +'                    </td>'
            +'                    <td scope="col"style="width: 106px;">'
            +'                            <span class="attach-header" >'
            +'                                <span id="attach-required">*</span>'
            +'                                <span class="attach-icons" style="margin-left: 0px;">'
            +' <button type="button" name="mainbutton" id="mainbutton" style="border:0px; background:#ffffff; " onclick="if (saveMeeting()){addTopicTemplate();$(this).hide()}">'
            +'                                                     <img src="/images/floppy-icon.png" style="height: 32px;">'
            +'                                                 </button>'
            +'                                    <a href="#" onclick="document.getElementById(\'subject'+itopic+'UploadFile[]\').click(); return false" class="attach-icon">'
            +'                                        <img src="/images/upload.png" style="height: 32px;">'
            +'                                    </a>'
            +'                                </span>'
            +'                            </span>'
            +'                    </td>'
            +'                </tr>';
            $("#recList").prepend(template);
            
            $( ".ccac" ).autocomplete({
                source: "generalSearch",
                minLength: 2,
                select: function( event, ui ) {
                    $(this).next().val(ui.item.category+''+ui.item.id)
                    $("#applicantName").val(ui.item.label)
                }
            });
        }
        
        $(document).ready(function(){
            $("#TopicSrch").on("keydown",function(){
                var txt = $("#TopicSrch").val();
                console.log(txt)
                $('.card123').each(function(){
                   if($(this).html().indexOf(txt) != -1){
                       $(this).show();
                   }
                else
                       $(this).hide();
                });
            })
        })
            
        function DrawBorder(id){
            $("#row"+id).attr('style','border: 2px solid #0000ff !important;')
            
            window.onbeforeunload = confirmExit;
        }
        
        var elemCt =0;
      function confirmExit()
      {
          //return ;
        $('.card123').each(function(){
          if(typeof $(this).attr('style') !== "undefined")
            elemCt++
        });
        if(elemCt>0)
            return "هل تريد مغادرة الصفحة دون الحفظ؟";
            
       $(window).unbind('beforeunload');
        return
      }
    </script>

@endsection
