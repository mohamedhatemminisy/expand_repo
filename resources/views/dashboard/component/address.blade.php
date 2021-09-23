<div class="row">
    <div class="col-md-4" style="padding-left:0px;">
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
                    @foreach($city as $cit)
                        <option  value="{{$cit->id}}">  {{$cit->name}} </option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(10,'PositionID','City')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
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
            <div class="input-group-append col-2" onclick="QuickAdd(33,$('#CityID').find(':selected').val(),'Area')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
                <span class="input-group-text input-group-text2">
                    <i class="fa fa-external-link"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="padding-left:0px;">
        <div class="row">  
            <div class="form-group col-10" style="padding-left:0px;">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            {{trans('admin.area')}}
                        </span>
                    </div>  
                    <select id="region_data" name="AreaID" type="text" class="form-control selectFullCorner" onchange="doGetChild($(this).val(),10,'NeighborID')">
                        <option value=""> -- {{trans('admin.area')}} --  </option>                                                                         
                        </select>
                    
                </div>
            </div>
            <div class="input-group-append col-2" onclick="QuickAdd(77,$('#area_data').find(':selected').val(),'Resion')" style="max-width:15px; margin-left:0px !important;padding-left:0px !important;padding-right:0px !important;padding-bottom: 18px;">
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

                       				