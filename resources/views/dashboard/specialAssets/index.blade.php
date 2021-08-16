@extends('layouts.admin')
@section('content')

<section id="hidden-label-form-layouts">
<form method="post" id="special_asset" enctype="multipart/form-data">
        @csrf
<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card rightSide" style="min-height:485.375px">
            <div class="card-header">
                <h4 class="card-title">
                    <img src="https://db.expand.ps/images/park.png" width="32" height="32">
                    معلومات الحدائق والأراضي

                    </h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 ">
                            <div class="form-group">
                                <div class="input-group w-s-87">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            الحدائق والأراضي
                                        </span>
                                    </div>
                                    <input type="text" id="BName" class="form-control ac ui-autocomplete-input" placeholder="اسم الحديقة , الأرض" name="BName" autocomplete="off">
                                </div>
                                <div id="auto-complete-barcode" class="divKayUP barcode-suggestion "></div>


                                <input type="hidden" id="special_id" name="special_id" value="">
                                <input type="hidden" id="type" name="type" value="{{$type}}">

                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        الشخص المسؤول
                                        </span>
                                    </div>
                                    <select type="text" id="pich" name="pich" class="form-control">
                                    <optgroup label=" ">
                                            @foreach($admins as $admin)
                                              <option value="{{$admin->id}}"> {{$admin->name}} </option>
                                            @endforeach
                                        </select>
                                    <div class="input-group-append">
                                        <a class="input-group-text input-group-text2">
                                        <i class="fa fa-external-link-alt" style="color:#ffffff"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group validate">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            نوع الملكية
                                        </span>
                                    </div>
                                    <select id="ownType" name="ownType" type="text" class="form-control valid" style="" aria-invalid="false">
                                    <optgroup label=" ">
                                            @foreach($assetStatus as $status)
                                              <option value="{{$status->id}}"> {{$status->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append" onclick="QuickAdd(30,'ownType','Own type')">
                                            <span class="input-group-text input-group-text2">
                                                <i class="fa fa-external-link"></i>
                                            </span>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group" style="display: none;" id="fixedassetdvtext1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        اسم المُؤجر
                                        </span>
                                    </div>
                                    <select onchange="getSupplierInfo($(this).val(),'formData3 #PHnum1')" type="text" id="Lessor" name="Lessor" class="form-control">
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
                                        <i class="fa fa-external-link-alt" style="color:#ffffff"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group validate" id="orgCurr">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                التكلفة الفعلية
                                            </span>
                                        </div>
                                        <input id="OrgSalary4" name="OrgSalary" class="form-control numFeild " placeholder="00.00" style="    border-radius: 0rem !important;">
                                            <select id="OrgCurrencyID" name="OrgCurrencyID" type="text" class="form-control" style=" height: 37px !important;">
                                                <option> - </option>
                                                <option value="shekel" selected=""> {{trans('admin.shekel')}} </option>
                                                <option value="dollar"> {{trans('admin.dollar')}} </option>
                                                <option value="dinar">{{trans('admin.dinar')}}  </option>
                                                <option value="euro">{{trans('admin.euro')}}  </option>
                                            </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="col-lg-12">
                                <img id="wareHouseImg" src="https://db.expand.ps/images/park.png" style="cursor: pointer;" width="150" height="100" onclick="document.getElementById('formDataimgPic5').click(); return false">


                                <input type="hidden" id="warehouseimgpath" name="warehouseimgpath">
                                <input type="file" class="form-control-file" id="formDataimgPic5" name="imgPic" style="display: none" onchange="doUploadPic1('formData4','wareHouseImg','warehouseimgpath')">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group" style="margin-top: 8%; display: none; width: 112%;" id="warehousedvtext2">
                                    <div class="input-group" style="width: 100% !important;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-text1" id="basic-addon1">
                                            <img src="https://db.expand.ps/images/jawwal35.png">
                                            </span>
                                        </div>
                                        <input type="text" maxlength="10" id="PHnum1" name="PHnum1" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group" style="width: 99% !important;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        ملاحظات
                                        </span>
                                    </div>
                                    <textarea type="text" id="NoteAR" class="form-control" placeholder="ملاحظات" name="NoteAR" style="height: 35px;"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 0">
                        <div class="form-group col-md-4 mb-2" id="realestatedvtext5" style="display:none">
                            <label class="sr-only" for="dateinput1"></label>
                            تاريخ بدء الايجار :<br>
                            <input type="text" id="Basedateinput1" name="Basedateinput1" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                        </div>
                        <div class="form-group col-md-4 mb-2" id="realestatedvtext6" style="display:none">
                            <label class="sr-only" for="dateinput2"></label>
                            تاريخ نهاية الايجار :<br>
                            <input type="text" id="Basedateinput2" onblur="SubtractDates($('#Basedateinput1').val(),$(this).val(),'Basedateinput3')" name="Basedateinput2" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                        </div>
                        <div class="form-group col-md-4 mb-2" id="realestatedvtext7" style="display:none">
                            <label class="sr-only" for="dateinput3"> </label>
                            مدة التأجير :<br>
                            <input type="text" id="Basedateinput3" name="Basedateinput3" class="form-control  numFeild" style="border-radius: 3px !important;height:36px;">
                        </div>
                    </div>

                    <div class="row" style="margin-left: 0">
                        <div class="form-group col-md-4 mb-2" id="realestatedvtext8" style="display:none">
                            <label class="sr-only" for="dateinput1"></label>
                            تكلفة الايجار :<br>
                            <div class="row">
                                <div class="col-lg-6" style="border-radius:3px!important;width: 98px; height: 34px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">

                                            <input id="BaseCost" name="BaseCost" class="form-control numFeild" placeholder="00.00" style="border-radius:3px!important;width: 98px; height: 34px;">

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select id="BaseCurrencyID" name="BaseCurrencyID" type="text" class="form-control" style="border-radius: 3px !important;padding:0 !important;">
                                                <option> - </option>
                                                                                                                        <option value="26" selected="">شيكل</option>
                                                                                                                        <option value="27">دولار</option>
                                                                                                                        <option value="28">دينار</option>
                                                                                                                        <option value="31">يورو</option>
                                                                                                                </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mb-2" id="realestatedvtext9" style="display:none">
                            <label class="sr-only" for="dateinput2"></label>
                            دورية كل :<br>
                            <select type="text" id="Baseperiodinput" name="Baseperiodinput" class="form-control" style="border-radius: 3px !important;">
                                <option>  -  </option>
                                                                                        <option value="131">يوميا </option>
                                                                                        <option value="132">اسبوعي</option>
                                                                                        <option value="133">شهري</option>
                                                                                        <option value="134" selected="">سنوي</option>
                                                                                </select>
                        </div>
                        <div class="form-group col-md-4 mb-2" id="realestatedvtext10" style="display:none">
                            <label class="sr-only" for="dateinput4"> </label>
                            يدفع كل :<br>
                            <select type="text" id="Basepaymentinput" name="Basepaymentinput" class="form-control" style="border-radius: 3px !important;">
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


                    <div class="EnabledItem" style="direction: rtl;border:1px solid #ff0000; color:#ff0000; text-align: center;display: none">المستخدم معطل</div>



                    <div class="card-header" style="padding-top:0px;display:none;" id="realestatedvtext3">
                        <h4 class="card-title" style="    margin-left: 16px;">
                            <img src="https://db.expand.ps/images/sponsor.png" width="32" height="32">المتعاقد / الكفيل</h4>


                    </div>
                    <div class="card-content collapse show" style="display: none;" id="realestatedvtext4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group w-s-87" style="width: 270px !important;">
                                                <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
مستخدم منذ
</span>

                                                </div>

                                                <input type="text" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" id="dateuse" name="dateuse">
                                                <!--  <label class="">5</label>  -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="text-align: center">

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group" style="width: 260px !important;padding-right:0px!important;/* width:99% !important; */">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
مكتب الهندسة
</span>
                                                </div>
                                                <select type="text" id="EngOffice" name="EngOffice" class="form-control">
                                                    <option> - </option>
                                                                                                                                <option value="5"> مكتب x </option>
                                                                                                                                <option value="14"> مكتب الحنبلي  </option>
                                                                                                                                <option value="10"> مكتب السلام الهندسي  </option>
                                                                                                                                <option value="8"> مكتب المهندس وائل  </option>
                                                                                                                                <option value="11"> مكتب النجاح الهندسي  </option>
                                                                                                                                <option value="3"> مكتب الهدى الهندسي </option>
                                                                                                                                <option value="13"> مكتب الوفاء الهندسي  </option>
                                                                                                                                <option value="16"> مكتب عتمة الهندسي  </option>
                                                                                                                                <option value="6"> مكتب فلسطين للمساحة والهندسة والخدمات العقارية  </option>
                                                                                                                                <option value="1"> مكتب كنان الهندسي </option>
                                                                                                                        </select>
                                                <div class="input-group-append">
                                                    <a class="input-group-text input-group-text2">
                                                    <i class="fa fa-external-link-alt" style="color: #ffffff;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="input-group w-s-87" style="width: 270px !important;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    المتعاقد
                                                    </span>
                                                </div>

                                                <select type="text" id="Contractor[]" name="Contractor[]" class="form-control Contractor">
                                                    <option> - </option>
                                                                                                                                <option value="1">بلدية اذنا</option>
                                                                                                                                <option value="2">شركة اكسباند </option>
                                                                                                                                <option value="3">شركة طميزكوللمحروقات</option>
                                                                                                                                <option value="4">دفنة </option>
                                                                                                                                <option value="5">مطبعة خويرة </option>
                                                                                                                                <option value="6">بلدية بيت فوريك </option>
                                                                                                                                <option value="7">شركة المتحدون العرب للتوريدات </option>
                                                                                                                                <option value="8">شركة الفا ون للتوريدات الكهربائية </option>
                                                                                                                                <option value="9">شركة عالم المستقبل</option>
                                                                                                                                <option value="10">مجلس الخدمات المشترك للنفايات الصلبة </option>
                                                                                                                                <option value="11">ساتكو</option>
                                                                                                                                <option value="12">اوفتك </option>
                                                                                                                                <option value="13">شركة سنديان </option>
                                                                                                                                <option value="14">وزارة الزراعة </option>
                                                                                                                                <option value="15">شركة القناطر</option>
                                                                                                                                <option value="16">الفيحاء</option>
                                                                                                                                <option value="17">شركة السماح </option>
                                                                                                                                <option value="18">شركة النبراس للتكنلوجيا </option>
                                                                                                                                <option value="19">شركة الامل </option>
                                                                                                                                <option value="20">شركة bci</option>
                                                                                                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ContactorOther"></div>
                                </div>
                                <div class="col-lg-6" style="text-align: center">


                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group" style="width: 260px !important;padding-right:0px!important;/* width:99% !important; */">
                                            <div class="input-group w-s-87">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    الكفيل
                                                    </span>
                                                </div>

                                                <select type="text" id="sponsor[]" name="sponsor[]" class="form-control sponsor">
                                                    <option> - </option>
                                                                                                                                <option value="1">وزارة الحكم المحلي </option>
                                                                                                                                <option value="2">test</option>
                                                                                                                                <option value="3">السيد مدير ضريبة الاملاك جنوب الخليل  المحترم</option>
                                                                                                                                <option value="4">لمن يهمة الامر</option>
                                                                                                                                <option value="5">الاخ محمود المصري حفظه الله مدير مكتب عمل ترقوميا </option>
                                                                                                                                <option value="6">مؤسسة الاغا</option>
                                                                                                                                <option value="7">صندوق تطوير و اقراض البلديات </option>
                                                                                                                                <option value="8">وزارة العمل </option>
                                                                                                                                <option value="9">وزارة الصناعة</option>
                                                                                                                                <option value="10">مديرية الحكم المحلي  الخليل </option>
                                                                                                                                <option value="11">مديرية الحكم المحلي</option>
                                                                                                                                <option value="12">الحكم المحلي </option>
                                                                                                                                <option value="13">التربيه والتعليم </option>
                                                                                                                                <option value="14">أمانة السر</option>
                                                                                                                                <option value="15">وزارة الزراعه </option>
                                                                                                                                <option value="16">مجلس تنظيم قطاع الكهرباء </option>
                                                                                                                                <option value="17">محافظ جنين </option>
                                                                                                                                <option value="18">شركة توزيع كهرباء الشمال </option>
                                                                                                                                <option value="19">وزارة الصحة </option>
                                                                                                                                <option value="20">الحكم المحلي  جنين </option>
                                                                                                                                <option value="21">بلدية برقين </option>
                                                                                                                                <option value="22">وزارة المالية </option>
                                                                                                                                <option value="23">فاتن </option>
                                                                                                                                <option value="24">الامل </option>
                                                                                                                                <option value="25">وزارة الداخلية </option>
                                                                                                                                <option value="26">وزارة التنميه </option>
                                                                                                                                <option value="27">مؤسسة عبد الحميد قطان </option>
                                                                                                                                <option value="28">بلدية بيتا </option>
                                                                                                                                <option value="29">وزارة الشؤون الاجتماعية</option>
                                                                                                                                <option value="30">وزارة التربية والتعليم </option>
                                                                                                                                <option value="31">مؤسسة الحق </option>
                                                                                                                                <option value="32">جمعيه الائتلاف </option>
                                                                                                                                <option value="33">مؤسسة المانحون العرب </option>
                                                                                                                        </select>
                                                <span class="input-group-text input-group-text2" style="margin-top: -16%;">
<i class="fas fa-plus-circle" id="plusElement"></i>
</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="other"></div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="card-header" style="padding-top:0px;display:none;" id="realestatedvtext3">
                        <h4 class="card-title" style="    margin-left: 16px;">
                            <img src="https://db.expand.ps/images/rent.png" width="32" height="32">
                            <span onclick="ShowLog('t_building')" style="cursor: pointer">تأجير الأصول</span>
                            <span style="color: #ff0000" id="isrented"></span>
                        </h4>

                    </div>
                    <div class="card-content collapse show" style="display: none;" id="realestatedvtext4">
                            <div class="card-body">
                                <div class="row" style="margin-top: -3%;margin-left: 2%;padding-bottom: 4%;">
                                    <button type="button" class="rent-btn" onclick="ShowHiderent('Startrent-div','End-rent');">
                                        <img src="https://db.expand.ps/images/start-rent.jpeg" width="100" height="50"></button>
                                    <button style="display: none" type="button" class="rent-btn" onclick="ShowHiderent2('End-rent','Startrent-div');"><img src="https://db.expand.ps/images/end-rent.jpeg" width="100" height="50"></button>
                                </div>
                                <div id="Startrent-div" style="display: none;">
                                    <div class="row" style="margin-left: 0;">


                                        <div class="col-lg-4" style="text-align: center">

                                            <div class="form-group">
                                                <div class="input-group" style="width: 100% !important;">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text1" id="basic-addon1">
                                                        <img src="https://db.expand.ps/images/jawwal35.png">
                                                        </span>
                                                    </div>
                                                    <input type="text" id="PHnum1" name="PHnum1" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1" maxlength="10">
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
                                            تاريخ بدء التأجير :<br>
                                            <input type="text" id="dateinput11" name="dateinput11" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                                        </div>
                                        <div class="form-group col-md-4 mb-2" id="realestatedvtext6" style="display: block;">
                                            <label class="sr-only" for="dateinput2"></label>
                                            تاريخ نهاية العقد :<br>
                                            <input type="text" id="dateinput12" name="dateinput12" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;" onblur="SubtractDates($('#dateinput11').val(),$(this).val(),'dateinput13')">
                                        </div>
                                        <div class="form-group col-md-4 mb-2" id="realestatedvtext7" style="display: block;">
                                            <label class="sr-only" for="dateinput3"> </label>
                                            مدة الايجار :<br>
                                            <input type="text" id="dateinput13" class="form-control  numFeild" name="dateinput13" style="border-radius: 3px !important;height:36px;">
                                        </div>
                                    </div>

                                    <div class="row" style="margin-left: 0">
                                        <div class="form-group col-md-4 mb-2" id="realestatedvtext8" style="display: block;">
                                            <label class="sr-only" for="dateinput1"></label>
                                            تكلفة الايجار<br>
                                            <div class="row">
                                                <div class="col-lg-6" style="padding-right: 0px !important;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <input id="Cost" name="cost" class="form-control numFeild" placeholder="00.00" style="height: 34px;border-radius: 3px !important;width: 99px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <select id="CurrencyID" name="CurrencyID" type="text" class="form-control" style="border-radius: 3px !important;padding:0 !important;z-index: 1000;">
                                                                <option> $ </option>
                                                                                                                                                        <option value="26" selected="">شيكل</option>
                                                                                                                                                        <option value="27">دولار</option>
                                                                                                                                                        <option value="28">دينار</option>
                                                                                                                                                        <option value="31">يورو</option>
                                                                                                                                                </select>
                                                            <div class="input-group-append hidden-xs hidden-sm" onclick="QuickAdd(8,'CurrencyID','Currency')">
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
                                            دورية كل :<br>
                                            <div class="input-group-prepend">
                                                <select type="text" id="periodinput" name="periodinput" class="form-control" style="border-radius: 3px !important;z-index: 1000;">
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
                                            يدفع كل :<br>
                                            <div class="input-group-prepend">
                                            <select type="text" id="paymentinput" name="paymentinput" class="form-control" style="border-radius: 3px !important;">
                                                <option>  -  </option>
                                                                                                                        <option value="135">يوميا</option>
                                                                                                                        <option value="136">اسبوعيا</option>
                                                                                                                        <option value="137">شهريا</option>
                                                                                                                        <option value="138">نصف سنوي</option>
                                                                                                                        <option value="139">سنوي</option>
                                                                                                                        <option value="140">كل 10 ايام </option>
                                                

                                            </select>
                                            <div class="input-group-append hidden-xs hidden-sm" onclick="QuickAdd(21,'paymentinput','Payment each')">
                                                                <span class="input-group-text input-group-text2">
                                                                <i class="fa fa-external-link-alt"></i>
                                                                </span>
                                            </div>
                                        </div></div>
                                    </div>

                                    <div class="row" style="margin-left: 0;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 100% !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        ملاحظات التأجير
                                                        </span>
                                                    </div>
                                                    <textarea type="text" id="NoteRent" class="form-control" placeholder="ملاحظات" name="NoteRent" style="height: 35px;"></textarea>

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
                                                    <input type="text" id="PHnum2" name="PHnum2" class="form-control noleft numFeild" placeholder="050000000" aria-describedby="basic-addon1" maxlength="10">
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
                                                تاريخ بدء العقد :<br>
                                            <input type="text" id="dateinput21" name="dateinput21" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label class="sr-only" for="dateinput22"></label>
                                            تاريخ نهاية العقد<br>
                                            <input type="text" id="dateinput2" name="dateinput22" data-mask="00/00/0000" maxlength="10" class="form-control singledate valid" placeholder="dd/mm/yyyy" autocomplete="off" aria-required="true" style="border-radius: 3px !important;height:36px;">
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <label class="sr-only" for="dateinput23"> </label>
                                            فترة العقد<br>
                                            <input type="text" id="dateinput23" class="form-control  numFeild" name="dateinput23" style="border-radius: 3px !important;height:36px;">
                                        </div>
                                    </div>

                                    <div class="row" style="margin-left: 0">
                                        <div class="form-group col-md-4 mb-2" id="realestatedvtext8" style="display: block;">
                                            <label class="sr-only" for="dateinput1"></label>
                                            تكلفة العقد<br>
                                            <div class="row">
                                                <div class="col-lg-6" style="padding-right: 0px !important;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <input id="Cost1" name="cost1" class="form-control numFeild" placeholder="00.00" style="height: 35px;border-radius: 3px !important;width: 99px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <select id="CurrencyID1" name="CurrencyID1" type="text" class="form-control" style="border-radius: 3px !important;padding:0 !important;z-index: 1000;">
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
                                                <select type="text" id="periodinput1" name="periodinput1" class="form-control" style="border-radius: 3px !important;z-index: 1000;">
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
                                                <select type="text" id="paymentinput1" name="paymentinput1" class="form-control" style="border-radius: 3px !important;">
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
                                            </div></div>
                                    </div>
                                    <div class="row" style="margin-left: 0;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group" style="width: 100% !important;">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                        ملاحظات التأجير
                                                        </span>
                                                    </div>
                                                    <textarea type="text" id="NoteRent1" class="form-control" placeholder="ملاحظات" name="NoteRent1" style="height: 35px;"></textarea>
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
        <div class="card leftSide">
            <div class="card-header">
                <h4 class="card-title">
                    <img src="https://db.expand.ps/images/maps-icon.png" width="32" height="32">
                    العنوان
                </h4>
            </div>
            <div class="card-body">
                
            <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="form-group col-10">

                                    <select id="CityID" name="CityID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),8,'TownID')">
                                        <option disabled> -- {{trans('admin.city')}} --</option>     
                                        @foreach($city as $cit)
                                            <option  value="{{$cit->id}}">  {{$cit->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group-append col-2" onclick="QuickAdd(17,'PositionID','Position')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                                    <span class="input-group-text input-group-text2">
                                        <i class="fa fa-external-link"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="form-group col-10">
                                    <select id="area_data" name="TownID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),9,'AreaID')">
                                        <option disabled>   {{trans('admin.area')}} </option>
                                    </select>
                                </div>
                                <div class="input-group-append col-2" onclick="QuickAdd(17,'PositionID','Position')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                                    <span class="input-group-text input-group-text2">
                                        <i class="fa fa-external-link"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">  
                                <div class="form-group col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select id="region_data" name="AreaID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),10,'NeighborID')">
                                            <option value="0" disabled>   {{trans('admin.region')}}  </option>                                                                         
                                            </select>
                                    </div>
                                </div>
                                <div class="input-group-append col-2" onclick="QuickAdd(17,'PositionID','Position')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                                    <span class="input-group-text input-group-text2">
                                        <i class="fa fa-external-link"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group" style="width: 98% !important;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                {{trans('admin.address_details')}}
                                </span>
                            </div>
                            <textarea type="text" id="AddressDetails" class="form-control" 
                            placeholder="{{trans('admin.address_details')}}" name="AddressDetails"
                                style="height: 40px;"></textarea>
                            <div class="input-group-append hidden-xs hidden-sm">
                            <span class="input-group-text input-group-text2" style="color:#ffffff">
                            <i class="fa fa-external-link-alt"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group" style="width: 98% !important;">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                    {{trans('admin.notes')}}
                                    </span>
                            </div>
                            <textarea type="text" id="Note" class="form-control"
                                placeholder="{{trans('admin.notes')}}" name="Note" 
                                style="height: 40px;"></textarea>
                            <div class="input-group-append hidden-xs hidden-sm">
                                <span class="input-group-text input-group-text2" style="color:#ffffff">
                                <i class="fa fa-external-link-alt"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

                <div class="row" style="display:none">
                    <div class="col-md attachs-section">
                        <img src="https://db.expand.ps/images/upload.png" width="40" height="40">
                        <span class="attach-header">مرفقات
                        <span id="attach-required">*</span>
                        <span class="attach-icons">
                            <a href="#" onclick="document.getElementById('formDataupload-file[]').click(); return false" class="attach-icon"><i class="fas fa-paperclip"></i></a>
                            <a href="#" onclick="document.getElementById('formDataupload-image[]').click(); return false" class="attach-icon"><i class="far fa-image"></i></a>
                            <a onclick="showLinkModal('formData')" class="attach-icon"><i class="fas fa-link"></i></a>
                        </span>
                    </span>
                    </div>
                </div>
                <div class="row attachs-body" style="display:none">
                    <div class="form-group col-12 mb-2">
                        <input type="hidden" name="fromname" value="formData">
                        <input type="file" class="form-control-file" id="formDataupload-file[]" multiple="" name="formDataUploadFile[]" onchange="doUploadAttach('formData')" style="display: none" accept=".doxc, .xlsx, .pptx, application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                        <input type="file" class="form-control-file" id="formDataupload-image[]" multiple="" name="formDataUploadImage[]" onchange="doUploadAttach('formData')" accept="image/*" style="display: none">
                        <div class="row formDataImagesArea">
                        </div>
                        <div class="row formDataFilesArea" style="margin-left: 0px;">
                        </div>
                        <div class="row formDataLinkArea" style="margin-left: 0px;">
                        </div>
                    </div>
                </div>

                    <div class="card-header" style="padding-top:0px;">
                        <h4 class="card-title">
                            <img src="/images/msg.png" width="32" height="32"> 
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
                                        <img src="/images/msg.png" onclick="$('#msgModal').modal('show')" style="cursor:pointer">
                                        <div class="form-group">
                                            <a onclick="$('#msgModal').modal('show')" style="color:#000000">الأرشيف
                                            <span id="msgStatic" style="color:#1E9FF2"><b>(0)</b></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-actions" style="border-top:0px;padding: 0px 0; margin-top: 0px;">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="saveBtn">حفظ <i class="ft-thumbs-up position-right"></i></button>
                        <button type="button" class="btn btn-primary" id="updateBtn" style="display: none" onclick="UpdateForm3()">تعديل <i class="ft-thumbs-up position-right"></i></button>
                        <button type="button" onclick="redirectURL('activeIcon1-tab1')" class="btn btn-warning">إعادة تعيين <i class="ft-refresh-cw position-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</form>

</section>


@endsection

@section('script')
<script>

$(".ui-autocomplete-input").keyup(function () {
            if ($(this).val().length >= 1) {
                // auto complete with Ajax Function :-
                var url = 'asset_auto_complete';
                let type = $("input[name=type]").val();

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        employee: $(this).val(),
                        type : type

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
            let asset_id = $(this).data("id");
            $.ajax({
            type: 'get', // the method (could be GET btw)
            url: "asset_info",
            data: {
                asset_id: asset_id,
            },
            success:function(response){
                console.log(response);
            $('#special_id').val(response.info.id);
            $('#BName').val(response.info.name);
            $("select#pich option")
                 .each(function() { this.selected = (this.text == response.admin); 
            });

            $("select#ownType option")
                 .each(function() { this.selected = (this.text == response.asset_status); 
            });

            $("select#OrgCurrencyID option")
                 .each(function() { this.selected = (this.text == response.Currency); 
            });
            $('#OrgSalary4').val(response.info.price);
            $('#NoteAR').val(response.info.notes);
            $('#AddressDetails').val(response.address.details);
            $('#Note').val(response.address.notes);
            $("select#CityID option")
                 .each(function() { this.selected = (this.text == response.city); 
            });
            $("select#TownID option")
                 .each(function() { this.selected = (this.text == response.area); 
            });
            $("select#region_data option")
                 .each(function() { this.selected = (this.text == response.region); 
            });
                    },
                    });
        });





$("#CityID").change(function () {
        $("#area_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "state",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var state_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#area_data").append(state_details);
            }
         },
        });
    });

    $("#area_data").change(function () {
        $("#region_data").empty();
        var val = $(this).val();

$.ajax({
   type: 'post', // the method (could be GET btw)
   url: "area",
   data: {
        val: val,
        _token: '{{csrf_token()}}',
   },
   success:function(response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var name = response[i].name;
                var id = response[i].id;
                    var region_details = '<option value="'+id +'">'
                    +name+' </option>'
                    $("#region_data").append(region_details);
            }
         },
        });
    });




$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#special_asset').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
     $( "#BName" ).removeClass( "error" );
     $( "#pich" ).removeClass( "error" );
       $.ajax({
          type:'POST',
          url: "store_assets",
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
             }
           },
           error: function(response){
            if(response.responseJSON.errors.pich){
                $( "#pich" ).addClass( "error" );
            }
            if(response.responseJSON.errors.BName){
                $( "#BName" ).addClass( "error" );
            }
           }
       });
  });


</script>

@endsection