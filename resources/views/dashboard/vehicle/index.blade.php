@extends('layouts.admin')
@section('content')

<section id="hidden-label-form-layouts">
<form method="post" id="vehicle-form" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card leftSide" style="min-height:544.562px">
                <div class="card-header">
                    <h4 class="card-title">
                        <img src="https://db.expand.ps/images/car.png" width="32" height="32"> معلومات المركبة
                    </h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 ">
                                <div class="form-group">
                                    <div class="input-group w-s-87">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                            اسم المركبة
                                            </span>
                                        </div>

                                        <input type="text" id="Vehiclename" class="form-control ac ui-autocomplete-input" placeholder="" name="Vehiclename" autocomplete="off">
                                        <input type="hidden" id="vehicle_id" name="vehicle_id" value="">
                                    </div>
                                    <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>

                                </div>
                                <div class="form-group">
                                    <div class="input-group w-s-87">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                رقم اللوحة .
                                            </span>
                                        </div>
                                        <input type="text" id="plateNo" class="form-control" placeholder="" name="plateNo">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                العلامة التجارية للمركبة
                                                </span>
                                            </div>
                                            <select type="text" id="vehiclebrand" name="vehiclebrand" class="form-control">
                                            <optgroup label=" ">
                                            @foreach($vehicleBrands as $bra)
                                              <option value="{{$bra->id}}"> {{$bra->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                            <div class="input-group-append" onclick="QuickAdd(25,'vehiclebrand','Vehicle Brand')">
                                                <span class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <img src="https://db.expand.ps/images/car.png" id="carimg" width="150" height="100" style="cursor: pointer;" onclick="document.getElementById('formDataimgPic3').click(); return false">


                                <input type="hidden" id="carimgpath" name="carimgpath">
                                <input type="file" class="form-control-file" id="formDataimgPic3" name="imgPic" style="display: none" onchange="doUploadPic1('formData2','carimg','carimgpath')">

                            </div>

                            <div class="col-lg-8 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            نوع المركبة
                                        </span>
                                        </div>
                                        <select type="text" id="vehicletype" name="vehicletype" class="form-control">
                                        <optgroup label=" ">
                                            @foreach($vehicleTypes as $type)
                                              <option value="{{$type->id}}"> {{$type->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                        <div class="input-group-append" onclick="QuickAdd(26,'vehicletype','Vehicle Type')">
                                            <span class="input-group-text input-group-text2">
                                            <i class="fa fa-external-link"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12" style="padding: 0 !important;">
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="https://db.expand.ps/images/gas-station.png" width="15px" height="15px">
                                                    نوع الوقود
                                                </span>
                                            </div>
                                        

                                            <select type="text" id="oiltype" name="oiltype" class="form-control">
                                                <option> - </option>
                                                <option value="petrol">{{trans('admin.petrol')}}  </option>
                                                <option value="diesel"> {{trans('admin.diesel')}}  </option>
                                        </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 0">
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext5" style="display:none">
                                <label class="sr-only" for="dateinput1"></label>
                                    تاريخ بدء الايجار<br>
                                <input type="text" id="dateinputv1" name="dateinput1" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;
">
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext6" style="display:none">
                                <label class="sr-only" for="dateinput2"></label>
                                تاريخ نهاية الايجار :<br>
                                <input type="text" id="dateinputv2" onblur="SubtractDates($('#dateinputv1').val(),$(this).val(),'dateinputv3')" name="dateinput2" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext7" style="display:none">
                                <label class="sr-only" for="dateinput3"> </label>
                                مقدة الايجار<br>
                                <input type="text" id="dateinputv3" class="form-control numFeild" name="dateinput3" style="border-radius: 3px !important;height:36px;">
                            </div>
                        </div>

                        <div class="row" style="margin-left: 0">
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext8" style="display:none">
                                <label class="sr-only" for="dateinput1"></label>
                                تكلفة الايجار<br>
                                <div class="row">
                                    <div class="col-lg-6" style="padding-right: 0px !important;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">

                                                <input id="Cost" name="cost" class="form-control numFeild" placeholder="00.00" style="height: 34px;border-radius: 3px !important;width: 95px;">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <select id="CurrencyID" name="CurrencyID" type="text" class="form-control" style="width: 85px;margin-left: 6%;height: 33px !important;">
                                                                <option> - </option>
                                                                <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>
                                                                <option value="dollar"> {{trans('admin.dollar')}} </option>
                                                                <option value="dinar">{{trans('admin.dinar')}}  </option>
                                                                <option value="euro">{{trans('admin.euro')}}  </option>
                                                            </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext9" style="display:none">
                                <label class="sr-only" for="dateinput2"></label>
                                دوري كل :<br>
                                <select type="text" id="periodinput2" name="periodinput2" class="form-control" style="border-radius: 3px !important;">
                                    <option>  -  </option>
                                                                                            <option value="131">يوميا </option>
                                                                                            <option value="132">اسبوعي</option>
                                                                                            <option value="133">شهري</option>
                                                                                            <option value="134" selected="">سنوي</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext10" style="display:none">
                                <label class="sr-only" for="dateinput4"> </label>
                                يدفع كل :<br>
                                <select type="text" id="paymentinput4" name="paymentinput4" class="form-control" style="border-radius: 3px !important;">
                                    <option>  -  </option>
                                                                                            <option value="135">يوميا</option>
                                                                                            <option value="136">اسبوعيا</option>
                                                                                            <option value="137">شهريا</option>
                                                                                            <option value="138">نصف سنوي</option>
                                                                                            <option value="139">سنوي</option>
                                                                                            <option value="140">كل 10 ايام </option>
                                                                                    </select>

                            </div>
                        </div>
                        <div class="row" style="   margin-left: 0px;">
                            <div class="form-group col-lg-12" id="vehicledvtext11" style="display:none">
                                <div class="input-group" style="width:100% !important;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        الشخص المسؤول عن الدفع
                                        </span>
                                    </div>
                                    <select type="text" id="pinc4" name="pinc4" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($admins as $admin)
                                              <option value="{{$admin->id}}"> {{$admin->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                    <div class="input-group-append">
                                        <a class="input-group-text input-group-text2">
                                        <i class="fa fa-external-link-alt" style="color:#ffffff"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">UserDisable</div>

                        <div class="row" style="margin-left: 0">
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext1" style="display: block">
                                <label class="sr-only" for="dateinput21">تاريخ الشراء</label>
                                تاريخ الشراء :<br>
                                <input type="text" id="dateinput21" name="dateinput21" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext2" style="display: block">
                                <label class="sr-only" for="Wdateinput22">تاريخ انتهاء الكفالة</label>
                                تاريخ انتهاء الكفالة<br>
                                <input type="text" id="Wdateinput22" name="Wdateinput22" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                            </div>
                            <div class="form-group col-md-4 mb-2" id="vehicledvtext3" style="display: block;padding-left: 0px;">
                                <label class="sr-only" for="CW">التكلفة الفعلية</label>
                                التكلفة الكلية :<br>

                                <input id="OrgSalary3" name="OrgSalary" class="form-control numFeild " placeholder="00.00" style="border-radius: 0rem !important;height: 38px;width: 50%;float: right;">
                                <select id="OrgCurrencyID3" name="OrgCurrencyID3" type="text" class="form-control" style="height: 38px !important;width: 50%;float: right;">
                                    <option> - </option>
                                    <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>
                                    <option value="dollar"> {{trans('admin.dollar')}} </option>
                                    <option value="dinar">{{trans('admin.dinar')}}  </option>
                                    <option value="euro">{{trans('admin.euro')}}  </option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 0">
                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext4" style="display: block">
                                                            <label class="sr-only" for="licensedate"></label>
                                                            تاريخ انتهاء الرخصة :<br>
                                                            <input type="text" id="licensedate" name="licensedate" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext12" style="display: block">
                                                            <label class="sr-only" for="Inshurencedate"></label>
                                                            تاريخ انتهاء التأمين :<br>
                                                            <input type="text" id="Inshurencedate" name="Inshurencedate" data-mask="00/00/0000" maxlength="10" class="form-control  valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius:3px !important;height:36px;">
                                                        </div>
                                                        <div class="form-group col-md-4 mb-2" id="vehicledvtext13" style="display: block;padding-left: 0px;">
                                                            <label class="sr-only" for="pinc2"></label>
                                                            الشخص المسؤول<br>
                                                            <select id="pinc2" name="pinc2" class="form-control" style="border-radius:3px !important;height:36px !important;">
                                                            <optgroup label=" ">
                                                                @foreach($admins as $admin)
                                                                <option value="{{$admin->id}}"> {{$admin->name}} </option>
                                                                @endforeach
                                                            </select>
                                                            </optgroup>
                                                        </div>
                                                    </div>
                                                    
                        <div class="card-content collapse show">
                            <div class="card-header" style="padding-top:0px;display:none;" id="realestatedvtext3">
                                <h4 class="card-title" style="    margin-left: 16px;">
                                    <img src="https://db.expand.ps/images/rent.png" width="32" height="32">
                                    <span onclick="ShowLog('t_vehicles')" style="cursor: pointer">تاجير الأصول</span>
                                    <span style="color: #ff0000" id="isrented"></span>
                                </h4>

                            </div>
                            <div class="card-content collapse show" style="display: none;">
                                <div class="card-body">
                                    <div class="row" style="margin-top: -3%;margin-left: 2%;padding-bottom: 4%;">
                                        <button type="button" class="rent-btn" onclick="$('.vichalRent').toggle()">
                                            <img src="https://db.expand.ps/images/start-rent.jpeg" width="100" height="50"></button>
                                        <button style="display: none" type="button" class="rent-btn" onclick="ShowHiderent2('End-rent','Startrent-div');"><img src="https://db.expand.ps/images/end-rent.jpeg" width="100" height="50"></button>
                                    </div>
                                    <div id="Startrent-div" class="vichalRent" style="display: none;">
                                        <div class="row" style="margin-left: 0;">

                                            
                                            <div class="col-lg-4" style="text-align: center">

                                                <div class="form-group">
                                                    <div class="input-group" style="width: 100% !important;">

                                                        <div class="input-group-prepend">
                                                                <span class="input-group-text input-group-text1" id="basic-addon1">
                                                                <img src="https://db.expand.ps/images/jawwal35.png">
                                                                </span>
                                                        </div>
                                                        <input type="text" id="cPHnum1" name="cPHnum1" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1" maxlength="10">
                                                        <div class="input-group-append hidden-xs hidden-sm">
                                                                <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-external-link-alt" style="color:#ffffff"></i>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 0">
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext5" style="display: block;">
                                                <label class="sr-only" for="dateinput1"></label>
                                                تاريخ بدء الايجار :<br>
                                                <input type="text" id="cdateinput11" name="cdateinput11" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                                            </div>
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext6" style="display: block;">
                                                <label class="sr-only" for="dateinput2"></label>
                                                تاريخ انتهاء الايجار :<br>
                                                <input type="text" id="cdateinput12" name="cdateinput12" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;" onblur="SubtractDates($('#cdateinput11').val(),$(this).val(),'cdateinput13')">
                                            </div>
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext7" style="display: block;">
                                                <label class="sr-only" for="dateinput3"> </label>
                                                مدة التأجير<br>
                                                <input type="text" id="cdateinput13" class="form-control  numFeild" name="cdateinput13" style="border-radius: 3px !important;height:36px;">
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 0">
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext8" style="display: block;">
                                                <label class="sr-only" for="dateinput1"></label>
                                                تكلفة ايجار الإجار<br>
                                                <div class="row">
                                                    <div class="col-lg-6" style="padding-right: 0px !important;">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <input id="cCost" name="ccost" class="form-control numFeild" placeholder="00.00" style="height: 35px;border-radius: 3px !important;width: 99px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <select id="cCurrencyID" name="cCurrencyID" type="text" class="form-control" style="border-radius: 3px !important;padding:0 !important;z-index: 1000;">
                                                                    <option> $ </option>
                                                                                                                                                            <option value="26" selected="">شيكل</option>
                                                                                                                                                            <option value="27">دولار</option>
                                                                                                                                                            <option value="28">دينار</option>
                                                                                                                                                            <option value="31">يورو</option>
                                                                                                                                                    </select>
                                                                <div class="input-group-append hidden-xs hidden-sm" onclick="QuickAdd(8,'cCurrencyID','Currency')">
        <span class="input-group-text input-group-text2">
        <i class="fa fa-external-link-alt"></i>
        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext9" style="display: block;">
                                                <label class="sr-only" for="dateinput2"></label>
                                                دوري كل :<br>
                                                <div class="input-group-prepend">
                                                    <select type="text" id="cperiodinput" name="cperiodinput" class="form-control" style="border-radius: 3px !important;z-index: 1000;">
                                                        <option> - </option>
                                                                                                                                    <option value="131">يوميا </option>
                                                                                                                                    <option value="132">اسبوعي</option>
                                                                                                                                    <option value="133">شهري</option>
                                                                                                                                    <option value="134" selected="">سنوي</option>
                                                                                                                            </select>
                                                    <div class="input-group-append hidden-xs hidden-sm">
<span class="input-group-text input-group-text2">
<i class="fa fa-external-link-alt" onclick="QuickAdd(20,'periodinput','periodical')"></i>
</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext10" style="display: block;">
                                                <label class="sr-only" for="dateinput4"> </label>
                                                يدفع كل <br>
                                                <div class="input-group-prepend">
                                                    <select type="text" id="cpaymentinput" name="cpaymentinput" class="form-control" style="border-radius: 3px !important;">
                                                        <option>  -  </option>
                                                                                                                                    <option value="135">يوميا</option>
                                                                                                                                    <option value="136">اسبوعيا</option>
                                                                                                                                    <option value="137">شهريا</option>
                                                                                                                                    <option value="138">نصف سنوي</option>
                                                                                                                                    <option value="139">سنوي</option>
                                                                                                                                    <option value="140">كل 10 ايام </option>
                                                                                                                            </select>
                                                    <div class="input-group-append hidden-xs hidden-sm" onclick="QuickAdd(21,'cpaymentinput','Payment each')">
<span class="input-group-text input-group-text2">
<i class="fa fa-external-link-alt"></i>
</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 0;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group" style="width: 100% !important;">
                                                        <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
ملاحظات التأجير :
</span>
                                                        </div>
                                                        <textarea type="text" id="cNoteRent" class="form-control" placeholder="ملاحظات" name="cNoteRent" style="height: 35px;"></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left:15px;">
                                            <div class="form-group">
<span class="hide">
عقد الايجار 
<a href="#" onclick="document.getElementById('upload-file[]').click(); return false" class="attach-icon"><i class="fas fa-paperclip"></i></a>
<input type="file" class="form-control-file" id="upload-file[]" multiple="" name="uploadfile[]" style="display: none">

</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="End-rent" style="display: none">
                                        <div class="row" style="margin-left: 0;">


                                            <div class="col-lg-4" style="text-align: center">
                                                <div class="form-group">
                                                    <div class="input-group" style="width:100% !important;">
                                                        <div class="input-group-prepend">
<span class="input-group-text input-group-text1" id="basic-addon1">
<img src="https://db.expand.ps/images/jawwal35.png">
</span>
                                                        </div>
                                                        <input type="text" id="ePHnum2" name="ePHnum2" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1" maxlength="10">
                                                        <div class="input-group-append hidden-xs hidden-sm">
<span class="input-group-text input-group-text2" onclick="QuickAdd(19,'NameOfTenant1','NameOfTenant')">
<i class="fa fa-external-link-alt"></i>
</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 0">
                                            <div class="form-group col-md-4 mb-2">
                                                <label class="sr-only" for="dateinput21"></label>
                                                تاريخ بدء الإيجار :<br>
                                                <input type="text" id="edateinput21" name="edateinput21" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                                            </div>
                                            <div class="form-group col-md-4 mb-2">
                                                <label class="sr-only" for="dateinput22"></label>
                                                تاريخ نهاية الأيجار :<br>
                                                <input type="text" id="edateinput2" name="edateinput22" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                                            </div>
                                            <div class="form-group col-md-4 mb-2">
                                                <label class="sr-only" for="dateinput23"> </label>
                                                مدة الإيجار :<br>
                                                <input type="text" id="edateinput23" class="form-control  numFeild" name="edateinput23" style="border-radius: 3px !important;height:36px;">
                                            </div>
                                        </div>

                                        <div class="row" style="margin-left: 0">
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext8" style="display: block;">
                                                <label class="sr-only" for="dateinput1"></label>
                                                تكلفة الإيجار :<br>
                                                <div class="row">
                                                    <div class="col-lg-6" style="padding-right: 0px !important;">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <input id="eCost1" name="ecost1" class="form-control numFeild" placeholder="00.00" style="height: 35px;border-radius: 3px !important;width: 99px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <select id="eCurrencyID1" name="eCurrencyID1" type="text" class="form-control" style="border-radius: 3px !important;padding:0 !important;z-index: 1000;">
                                                                    <option> $ </option>
                                                                                                                                                            <option value="26">شيكل</option>
                                                                                                                                                            <option value="27">دولار</option>
                                                                                                                                                            <option value="28">دينار</option>
                                                                                                                                                            <option value="31">يورو</option>
                                                                                                                                                    </select>
                                                                <div class="input-group-append hidden-xs hidden-sm" onclick="QuickAdd(8,'CurrencyID1','Currency')">
        <span class="input-group-text input-group-text2">
        <i class="fa fa-external-link-alt"></i>
        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext9" style="display: block;">
                                                <label class="sr-only" for="dateinput2"></label>
                                                دوري كل :<br>
                                                <div class="input-group-prepend">
                                                    <select type="text" id="eperiodinput1" name="eperiodinput1" class="form-control" style="border-radius: 3px !important;z-index: 1000;">
                                                        <option> - </option>
                                                                                                                                    <option value="131">يوميا </option>
                                                                                                                                    <option value="132">اسبوعي</option>
                                                                                                                                    <option value="133">شهري</option>
                                                                                                                                    <option value="134">سنوي</option>
                                                                                                                            </select>
                                                    <div class="input-group-append hidden-xs hidden-sm" onclick="QuickAdd(20,'periodical1','periodical')">
<span class="input-group-text input-group-text2">
<i class="fa fa-external-link-alt"></i>
</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 mb-2" id="realestatedvtext10" style="display: block;">
                                                <label class="sr-only" for="dateinput4"> </label>
                                                يدفع كل :<br>
                                                <div class="input-group-prepend">
                                                    <select type="text" id="epaymentinput1" name="epaymentinput1" class="form-control" style="border-radius: 3px !important;">
                                                        <option>  -  </option>
                                                                                                                                    <option value="135">يوميا</option>
                                                                                                                                    <option value="136">اسبوعيا</option>
                                                                                                                                    <option value="137">شهريا</option>
                                                                                                                                    <option value="138">نصف سنوي</option>
                                                                                                                                    <option value="139">سنوي</option>
                                                                                                                                    <option value="140">كل 10 ايام </option>
                                                                                                                            </select>
                                                    <div class="input-group-append hidden-xs hidden-sm" onclick="QuickAdd(21,'paymentinput1','Payment each')">
<span class="input-group-text input-group-text2">
<i class="fa fa-external-link-alt"></i>
</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 0;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group" style="width: 100% !important;">
                                                        <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
ملاحظات الإيجار
</span>
                                                        </div>
                                                        <textarea type="text" id="eNoteRent1" class="form-control" placeholder="ملاحظات" name="eNoteRent1" style="height: 35px;"></textarea>
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
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card rightSide">
                <div class="card-header">
                    <h4 class="card-title">
                        <img src="https://db.expand.ps/images/sponsor.png" width="32" height="32">القسم/المانح/المورد
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
اسم القسم
</span>
                                    </div>
                                    <select type="text" id="Department" name="Department" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($departments as $department)
                                              <option value="{{$department->id}}"> {{$department->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" style="    padding-left: 10px;">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
الشخص المسؤول
</span>
                                    </div>
                                    <select type="text" id="pinc3" name="pinc3" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($admins as $admin)
                                              <option value="{{$admin->id}}"> {{$admin->name}} </option>
                                            @endforeach
                                        </select>
                                        </optgroup>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="display:none">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group" style="width: 99% !important;">
                                    <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
تفاصيل العنوان
</span>
                                    </div>
                                    <textarea type="text" id="AddressDetailsAR" class="form-control" placeholder="تفاصيل العنوان" name="AddressDetailsAR" style="height: 35px;"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group" id="vehicledvtext14" style="display:block;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        الشركة الموردة
                                        </span>
                                    </div>

                                    <select onchange="getSupplierInfo($(this).val(),'formData2 #PHnum1')" type="text" id="Supplier" name="Supplier" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}"> {{$supplier->name}}  </option>
                                            @endforeach
                                        </optgroup>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group" id="vehicledvtext15" style="display:none;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                    المُأجر
                                    </span>
                                    </div>

                                    <select onchange="getSupplierInfo($(this).val(),'formData2 #PHnum1')" type="text" id="Lessor" name="Lessor" class="form-control">
                                        <option> - </option>
                                                                                                    <option value="1"> بلدية اذنا </option>
                                                                                                    <option value="2"> شركة اكسباند  </option>
                                                                                                    <option value="3"> شركة طميزكوللمحروقات </option>
                                                                                                    <option value="4"> دفنة  </option>
                                                                                                    <option value="5"> مطبعة خويرة  </option>
                                                                                                    <option value="6"> بلدية بيت فوريك  </option>
                                                                                                    <option value="7"> شركة المتحدون العرب للتوريدات  </option>
                                                                                                    <option value="8"> شركة الفا ون للتوريدات الكهربائية  </option>
                                                                                                    <option value="9"> شركة عالم المستقبل </option>
                                                                                                    <option value="10"> مجلس الخدمات المشترك للنفايات الصلبة  </option>
                                                                                                    <option value="11"> ساتكو </option>
                                                                                                    <option value="12"> اوفتك  </option>
                                                                                                    <option value="13"> شركة سنديان  </option>
                                                                                                    <option value="14"> وزارة الزراعة  </option>
                                                                                                    <option value="15"> شركة القناطر </option>
                                                                                                    <option value="16"> الفيحاء </option>
                                                                                                    <option value="17"> شركة السماح  </option>
                                                                                                    <option value="18"> شركة النبراس للتكنلوجيا  </option>
                                                                                                    <option value="19"> شركة الامل  </option>
                                                                                                    <option value="20"> شركة bci </option>
                                                                                            </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text input-group-text2">
                                        <i class="fa fa-external-link-alt" style="color: #ffffff;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                        <img src="https://db.expand.ps/images/jawwal35.png">
                                        </span>
                                    </div>
                                    <input type="text" id="PHnum1" name="PHnum1" maxlength="10" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                المؤسسة المانحة
                                        </span>
                                    </div>
                                    <select onchange="getSponserInfo($(this).val(),'formData2 #PHnum2')" type="text" id="Sponsor" name="Sponsor" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($sponsers as $sponser)
                                            <option value="{{$sponser->id}}"> {{$sponser->name}}  </option>
                                            @endforeach
                                        </optgroup>
                                        </select>                                    <div class="input-group-append hide">
                                        <a class="input-group-text input-group-text2" href="https://db.expand.ps/addSponsor">
                                        <i class="fa fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                        <img src="https://db.expand.ps/images/jawwal35.png">
                                        </span>
                                    </div>
                                    <input type="text" id="PHnum2" name="PHnum2" maxlength="10" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" style="display: none">
                        <div class="col-md attachs-section">
                            <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
                            <span class="attach-header">المرفقات
                            <span id="attach-required">*</span>
                            <span class="attach-icons">
                                <a href="#" onclick="document.getElementById('formData2upload-file[]').click(); return false" class="attach-icon"><i class="fas fa-paperclip"></i></a>
                                <a href="#" onclick="document.getElementById('formData2upload-image[]').click(); return false" class="attach-icon"><i class="far fa-image"></i></a>
                                <a onclick="showLinkModal('formData2')" class="attach-icon"><i class="fas fa-link"></i></a>
                            </span>
                        </span>
                        </div>
                    </div>
                    <div class="row attachs-body" style="display: none">
                        <div class="form-group col-12 mb-2">
                            <input type="hidden" name="fromname" value="formData2">
                            <input type="file" class="form-control-file" id="formData2upload-file[]" multiple="" name="formData2UploadFile[]" onchange="doUploadAttach('formData2')" style="display: none" accept=".doxc, .xlsx, .pptx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                            <input type="file" class="form-control-file" id="formData2upload-image[]" multiple="" name="formData2UploadImage[]" onchange="doUploadAttach('formData2')" accept="image/*" style="display: none">
                            <div class="row formData2ImagesArea">
                            </div>
                            <div class="row formData2FilesArea" style="margin-left: 0px;">
                            </div>
                            <div class="row formData2LinkArea" style="margin-left: 0px;">
                            </div>
                        </div>
                    </div>
                    
                        <div class="card-header" style="padding-top:0px;">
                            <h4 class="card-title">
                                <img src="{{asset('assets/images/ico/msg.png')}}" width="32" height="32"> 
                            الأرشيف
                        </h4>
                            <!--  <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a> -->
                            <div class="heading-elements" style="display: none">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="row" style="text-align: center">
                                    <div class="col-md-2 w-s-50" style="padding: 0px;">
                                        <div class="form-group">
                                            <img src="{{asset('assets/images/ico/msg.png')}}" onclick="$('#msgModal').modal('show')" style="cursor:pointer">
                                            <div class="form-group">
                                                <a onclick="$('#msgModal').modal('show')" style="color:#000000">الأرشيف
                                                <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-actions" style="border-top:0px;">
                        <div class="text-right">
                            
                        <button type="submit" class="btn btn-primary">{{trans('admin.save')}} <i class="ft-thumbs-up position-right"></i></button>
                                                                        <button type="button" onclick="self.location='/c_assets/addCar'" class="btn btn-warning">إعادة  تعيين<i class="ft-refresh-cw position-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>


@stop

@section('script')
<script>
$( function() {
    $( ".ac" ).autocomplete({
            source: 'vehicle_auto_complete',
            minLength: 1,
            
            select: function( event, ui ) {
                let vehcile_id = (ui.item.id);
                $.ajax({
                type: 'get', // the method (could be GET btw)
                url: "vehcile_info",
                data: {
                    vehcile_id: vehcile_id,
                },
                success:function(response){
                $('#vehicle_id').val(response.info.id);

                $('#Vehiclename').val(response.info.name);
                $('#plateNo').val(response.info.serial_number);
                $('#dateinput21').val(response.info.selling_date);
                $('#Wdateinput22').val(response.info.wdateinput);
                $('#licensedate').val(response.info.licensedate);
                $('#OrgSalary3').val(response.info.price);
                $('#Inshurencedate').val(response.info.Inshurencedate);
                $("#PHnum2").val(response.info.sponsor_phone);
                $("#PHnum1").val(response.info.supply_phone);

                $("select#vehiclebrand option")
                    .each(function() { this.selected = (this.text == response.brand); 
                });
                $("select#vehicletype option")
                    .each(function() { this.selected = (this.text == response.type); 
                });

                $("select#EqtStatus option")
                    .each(function() { this.selected = (this.text == response.status); 
                });
                $("select#Department option")
                    .each(function() { this.selected = (this.text == response.department); 
                });
                $("select#pinc2 option")
                    .each(function() { this.selected = (this.text == response.admin); 
                });
                $("select#pinc3 option")
                    .each(function() { this.selected = (this.text == response.admin_two); 
                });
                $("select#OrgCurrencyID3 option")
                    .each(function() { this.selected = (this.text == response.Currency); 
                });
                $("select#oiltype option")
                    .each(function() { this.selected = (this.text == response.oiltype); 
                });
                

                $("select#Supplier option")
                    .each(function() { this.selected = (this.text == response.supplyer); 
                });
                $("select#SponsorName option")
                    .each(function() { this.selected = (this.text == response.sponser); 
                });

            },
        });
            }
        });
} );

/*
$(".ui-autocomplete-input").keyup(function () {
	if ($(this).val().length >= 1) {
		// auto complete with Ajax Function :-
		var url = 'vehicle_auto_complete';
		$.ajax({
			type: 'GET',
			url: url,
			data: {
				vehicle: $(this).val()
			},
			success: function (barcodes) {
				$('.divKayUP').html(barcodes);
				$(".divKayUP").css("display", "block");
			}
		});
	} else {
		$(".ui-autocomplete").css("display", "none");
	}
});


  $(document).on('click', '.select_name', function () {
            $("#barcode").val('');
            $(".divKayUP").css("display", "none");
            // get product details :-
            let vehcile_id = $(this).data("id");
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "vehcile_info",
            data: {
                vehcile_id: vehcile_id,
            },
            success:function(response){
            $('#vehicle_id').val(response.info.id);

            $('#Vehiclename').val(response.info.name);
            $('#plateNo').val(response.info.serial_number);
            $('#dateinput21').val(response.info.selling_date);
            $('#Wdateinput22').val(response.info.wdateinput);
            $('#licensedate').val(response.info.licensedate);
            $('#OrgSalary3').val(response.info.price);
            $('#Inshurencedate').val(response.info.Inshurencedate);
            $("#PHnum2").val(response.info.sponsor_phone);
            $("#PHnum1").val(response.info.supply_phone);

            $("select#vehiclebrand option")
                 .each(function() { this.selected = (this.text == response.brand); 
            });
            $("select#vehicletype option")
                 .each(function() { this.selected = (this.text == response.type); 
            });

            $("select#EqtStatus option")
                 .each(function() { this.selected = (this.text == response.status); 
            });
            $("select#Department option")
                 .each(function() { this.selected = (this.text == response.department); 
            });
            $("select#pinc2 option")
                 .each(function() { this.selected = (this.text == response.admin); 
            });
            $("select#pinc3 option")
                 .each(function() { this.selected = (this.text == response.admin_two); 
            });
            $("select#OrgCurrencyID3 option")
                 .each(function() { this.selected = (this.text == response.Currency); 
            });
            $("select#oiltype option")
                 .each(function() { this.selected = (this.text == response.oiltype); 
            });
            

            $("select#Supplier option")
                 .each(function() { this.selected = (this.text == response.supplyer); 
            });
            $("select#SponsorName option")
                 .each(function() { this.selected = (this.text == response.sponser); 
            });

         },
     });

    });
*/

$('#vehicle-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
     $( "#Vehiclename" ).removeClass( "error" );
     $( "#plateNo" ).removeClass( "error" );
     $( "#vehiclebrand" ).removeClass( "error" );
     $( "#oiltype" ).removeClass( "error" );
       $.ajax({
          type:'POST',
          url: "store_vehcile",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
             }
           },
           error: function(response){
            if(response.responseJSON.errors.Vehiclename){
                $( "#Vehiclename" ).addClass( "error" );
            }
            if(response.responseJSON.errors.plateNo){
                $( "#plateNo" ).addClass( "error" );
            }
            if(response.responseJSON.errors.vehiclebrand){
                $( "#vehiclebrand" ).addClass( "error" );
            }
            if(response.responseJSON.errors.oiltype){
                $( "#oiltype" ).addClass( "error" );
            }
           }
       });
  });



</script>

@stop
