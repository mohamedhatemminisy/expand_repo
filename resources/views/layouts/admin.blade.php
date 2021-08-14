<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Dashboard eCommerce - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    + Bitcoin Dashboard</title>
  <link rel="apple-touch-icon" href="{{asset('assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/line-awesome/css/line-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/weather-icons/climacons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/meteocons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/chartist.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">

@if(app() -> getLocale() === 'ar')

  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/custom-rtl.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/pages/timeline.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css-rtl/pages/dashboard-ecommerce.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
  <!-- END Custom CSS-->

@elseif(app() -> getLocale() === 'en')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors.css')}}">

  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/timeline.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/dashboard-ecommerce.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <!-- END Custom CSS-->
@endif

</head>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded"
data-open="click" data-menu="horizontal-menu" data-col="2-columns">
<!-- fixed-top-->
<!-- modals -->
<style>
  .modal-header{
      background-color: #0073AA;
  }
  .modal-title{
      color:#ffffff;
  }
  .hide{
      display:none;
  }
  .lds-dual-ring {
display: inline-block;
width: 80px;
height: 80px;
}
.lds-dual-ring:after {
content: " ";
display: block;
width: 64px;
height: 64px;
margin: 8px;
border-radius: 50%;
border: 6px solid #fff;
border-color: #0084FF transparent #0084FF transparent;
animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
0% {
  transform: rotate(0deg);
}
100% {
  transform: rotate(360deg);
}
}
th{
  background-color:#0073AA; 
}
</style>
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
<div class="modal fade text-left" id="smsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog" STYLE="max-width: 40%!important;"  role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel1">إرسالة رسالة نصية قصيرة</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-body">
                    <form id="SMSFormData" >
                        <table width="100%" class="detailsTB table engTbl">
        						<tr>
        							<td>
أدخل رقم الموبايل
        							</td>
        						
        						</tr>
        						
        						<tr>
        							<td>
        							    <input type="text" name="smsNo" id="smsNo" class="form-control"  />
        							</td>
        						</tr>
        						<tr>
        							<td>
        							    أدخل نص الرسالة
        							</td>
        						
        						</tr>
        						
        						<tr>
        							<td>
        							    <input type="text" name="smsText" id="smsText" class="form-control" />
        							</td>
        						</tr>
        						
        						<tr>
        							<th colspan="4" style="text-align: center;">
        							    <button type="button" class="btn btn-primary" id="" style="" onclick="sendSMS()">
        							    حفظ    
        							    </button>
        							</th>
        						</tr>
        					</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="loader hide " style="z-index: 10000;">
    
	<div class="lds-dual-ring"></div>
</div>
<div class="alert alert-danger mb-2 hide" onclick="$(this).toggle()" style="cursor:pointer" role="alert">
  <span id="errMsg"></span>
</div>
<div class="alert alert-success mb-2 hide" onclick="$(this).toggle()" style="cursor:pointer" role="alert">
  <span id="succMsg"></span>
</div>

<!-- begin header -->
@include('dashboard.includes.header')
<!-- end header -->
<!-- begin sidebar -->
@include('dashboard.includes.navbar')
<!-- end sidebar -->
<div class="app-content content">
  <div class="content-wrapper">
@yield('content')
  </div>
</div>
<!-- begin footer html -->
@include('dashboard.includes.footer')

<!-- end footer -->
<!-- modals -->
<div class="modal fade text-left" id="QuickAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
aria-hidden="true">
	<div class="modal-dialog modal-dialog2" role="document">
	  <div class="modal-content">
		<div class="modal-header modal-header2">
		  <h4 class="modal-title" id="myModalLabel1" style="color: #ffffff;"><span id="ModalTitle"></span></h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff;">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="form-body">
			<div class="form-group">
				<div class="input-group" style="max-height: 200px; overflow: auto;">
					<table style="width:100%" class="detailsTB table">
						<tr>
							<th scope="col">#</th>
							<th scope="col">العنوان</th>
							<th scope="col"></th>
						</tr>
						<tbody id="subTaskpop">

						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group" style="color:#EB844C">
				New <span id="ModalTitle1"></span>:
			</div>
		  <div class="form-group">
			  <input type="text" id="s_name_ar1" class="form-control" placeholder="" name="s_name_ar1">
			  <input type="hidden" id="s_name_en1" class="form-control" placeholder="" name="s_name_en1">
			  <input type="hidden" id="fk_i_constant_id1" class="form-control" placeholder="Label (En)" name="fk_i_constant_id1">
			  <input type="hidden" id="fk_i_constantdet_id1" class="form-control" placeholder="Label (En)" name="fk_i_constantdet_id1">
			  <input type="hidden" id="ctrlToRefresh" class="form-control" placeholder="Label (En)" name="ctrlToRefresh">
		  </div>
		  <div class="form-group" style="text-align:center">
				  <button type="button" class="btn btn-info modalBtn" onclick="addConstant()">حفظ </button>
			  </div>
		  </div>
		</div>
	  </div>
	</div>
</div>


<div class="modal fade text-left" id="addLingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel1">إضافة رابط</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-body">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">
						العنوان:
					</span>
							</div>
							<input type="text" id="URLTxt" class="form-control" placeholder="Label (Ar)" name="URLTxt">
							<input type="hidden" id="URLForm" class="form-control" placeholder="Label (Ar)" name="URLForm">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">
						الرابط:
					</span>
							</div>
							<input type="text" id="URLref" class="form-control" placeholder="Label (En)" name="URLref">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
				<button type="button" class="btn btn-outline-primary" onclick="addUrlToList('formData')">حفظ</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade text-left" id="getCompainByTiket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel1">الموظفين   </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-body" id="compainList">
					<div class="form-group">

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  @yield('script')
  <script type="text/javascript" src="{{asset('assets/vendors/js/ui/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}"
  type="text/javascript"></script>
  <script src="{{asset('assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('assets/js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script>
<script>
  function QuickAdd(contid,ctrl,title){

$(".loader").removeClass('hide');
//$(".form-actions").addClass('hide');

DrawTable(contid)
$("#fk_i_constant_id1").val(contid);
$("#ctrlToRefresh").val(ctrl);
$("#ModalTitle").html(title);
$("#ModalTitle1").html(title);
$("#QuickAdd").modal('show');

$(".loader").addClass('hide');
}



  $(document).ready(function() {
    
  //$(".sticky-wrapper").css("display", "none");
  $("#nav_hover").click(function() {

   /* if ( $('#nav_expanded_nav').css('display') == 'none' || $('#nav_expanded_nav').css("visibility") == "hidden"){
             // $("#nav_expanded_nav").css("display", "block");
              //$("#nav_expanded_nav").css("visibility", "visible");
              //$(".sticky-wrapper").css("display", "block");
              //$(".sticky-wrapper").css("height", "70px");

    }else{
            //  $("#nav_expanded_nav").css("display", "none");
              //$("#nav_expanded_nav").css("visibility", "hidden");
              //$(".sticky-wrapper").css("display", "none");
    } */
     
  });
                                                            
});

</script>

  <!-- END PAGE LEVEL JS-->
</body>
</html>

