<div class="content-body resultTblaa">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="images/report32.png" />  نتائج البحث</h4>
                        
                    </div>
                    <div class="card-body">

                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                        @if ($type=="outArchive")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th  >
                                                    #
                                                </th>
                                                <th  >
                                                    {{trans('admin.address')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.type')}}
                                                </th>
                                                <th  >
                                                    {{trans('admin.number')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.related_to')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.copy_to')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.date_con')}}
                                                </th>
                                                <th style="width: 300px;">
                                                    {{trans('assets.archive')}}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                    
                                        @elseif ($type=="subscriber")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                             {{trans('admin.subscriber_name')}}
                                                </th>
                                                <th>
                                                    رقم الجوال
                                                </th>
                                                <th>
                                                    {{trans('admin.emp_id')}} 
                                                </th>
                                                <th>
                                                    المنطقة
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type=="employee")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('admin.user_name')}}
                                                </th>
                                                <th>
                                                    رقم الجوال
                                                </th>
                                                <th>
                                                    {{trans('admin.emp_id')}}  
                                                </th>
                                                <th>
                                                    المنطقة
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type=="depart")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('admin.department')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.manager')}}
                                                </th>
                                                <th>
                                                    
                                                    {{trans('admin.related_to')}}   
                                                </th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type=="project")
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('admin.project_name')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.project_num')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.manager')}}   
                                                </th>
                                                <th>
                                                    {{trans('assets.datestart')}}   
                                                </th>
                                                <th>
                                                    {{trans('assets.dateend')}}   
                                                </th>
                                                <th>
                                                    {{trans('assets.dept')}}   
                                                </th>
                                                <th>
                                                    {{trans('admin.project_cost')}}   
                                                </th>
                                                <th>
                                                    {{trans('admin.region')}}   
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'Gardens_lands')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.Gardens_lands_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.actual_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.region')}}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'buildings')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.buildings_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.actual_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.region')}}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'warehouses')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.warehouses_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.actual_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.region')}}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'org')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('admin.orgnization_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.phone')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.job_title')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.region')}}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'equip')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.equp_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.dept')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.brand')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.equp_type')}} 
                                                </th>
                                                <th>
                                                    {{trans('assets.all_price')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.status')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.count')}}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @elseif ($type == 'vehicle')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th width="50px">
                                                #
                                                </th>
                                                <th>
                                                    {{trans('assets.vehicles_name')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.manager')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.vehicles_type')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.brand')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.fuel')}} 
                                                </th>
                                                <th>
                                                    {{trans('assets.all_price')}}
                                                </th>
                                                <th>
                                                    {{trans('assets.date_sale')}}
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        @endif
                                        
                                        <tbody id="recListaa">
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
</div>


<script>
    $( document ).ready(function() {
        fetchData();
    });
    
        function fetchData()
        {
            $("#recListaa ").html('');
            $.ajax({
                    type: 'get', // the method (could be GET btw)
                    @if ($type=="employee")
                        url: "emp_info_all",
                    @elseif ($type=="subscriber")
                        url: "subscribe_info_all",
                    @elseif ($type=="depart")
                        url: "dep_info_all",
                    @elseif ($type == 'org')
                        url: "orgnization_info_all",
                    @elseif ($type == 'vehicle')
                        url: "vehcile_info_all",
                    @elseif($type == 'buldings'||$type == 'warehouses'||$type == 'Gardens_lands')
                        url: "asset_info_all",
                    @elseif ($type == 'equip')
                        url: "equip_info_all",
                    @elseif ($type == 'project')
                        url: "project_info_all",
                    @endif
                    success:function(response){
                        var i=1;
                        @if($type == 'org')
                        (response.info).forEach(user => {
    
                            row='<tr>'
                            +
                            '<td>'+i+'</td>'
                            +
                            '<td>'+user.name+'</td>'

                            +
                            '<td>'+user.manager_name+'</td>'

                            +
                            '<td>'+user.phone_one+'</td>'

                            
                            +   '<td></td>'

                            +   '</tr>'
                            ;
                            i++;
                            $("#recListaa ").append(row)
                            });
                        @endif
                        @if($type == 'depart')
                        (response.info).forEach(depart => {
    
                            row='<tr>'
                            +
                            '<td>'+i+'</td>'
                            +
                            '<td>'+depart.name+'</td>'
                            +
                            '<td>'+depart.manager_name+'</td>'                            
                            +   '<td></td>'

                            +   '</tr>'
                            ;
                            i++;
                            $("#recListaa ").append(row)
                            });
                        @endif
                        @if($type == 'buldings'||$type == 'warehouses'||$type == 'Gardens_lands')
                        (response.info).forEach(user => {
    
                            row='<tr>'
                            +
                            '<td>'+i+'</td>'
                            +
                            '<td>'+user.name+'</td>'

                            +
                            '<td>'+user.manager_name+'</td>'

                            +
                            '<td>'+user.price+'</td>'

                            
                            +   '<td></td>'

                            +   '</tr>'
                            ;
                            i++;
                            $("#recListaa ").append(row)
                            });
                        @endif
                        @if($type=="employee"||$type=="subscriber")
                        (response.info).forEach(user => {
    
                            row='<tr>'
                            +
                                '<td>'+i+'</td>'
                            +
                                '<td>'+user.name+'</td>'
                            
                            +
                                '<td>'+user.phone_one+'</td>'
                            
                            +
                            @if ($type=="employee")
                            '<td>'+user.identification+'</td>'
                            @elseif ($type=="subscriber")
                            '<td>'+user.national_id+'</td>'
                            @endif
    
                            +   '<td></td>'
    
                            +   '</tr>'
                            ;
                            i++;
                            $("#recListaa ").append(row)
                        });
                        @endif
                        @if($type == 'vehicle')
                        (response.info).forEach(vehicle => {
    
                            row='<tr>'
                            +   '<td>'+i+'</td>'
                            +   '<td>'+vehicle.name+'</td>'
                            +   '<td>'+vehicle.manager_name+'</td>'
                            +   '<td>'+vehicle.type+'</td>'
                            +   '<td>'+vehicle.brand+'</td>'
                            +   '<td>'+vehicle.oiltype+'</td>'
                            +   '<td>'+vehicle.price+'</td>'
                            +   '<td>'+vehicle.selling_date+'</td>'
                            +   '</tr>'
                            ;
                            i++;
                            $("#recListaa ").append(row)
                            });
                        @endif
                        @if ($type == 'project')
                        (response.info).forEach(project => {
                            row='<tr>'
                            +   '<td>'+i+'</td>'
                            +   '<td>'+project.name+'</td>'
                            +   '<td>'+project.ProjectNo+'</td>'
                            +   '<td>'+project.manager+'</td>'
                            +   '<td>'+project.dateStart+'</td>'
                            +   '<td>'+project.dateEnd+'</td>'
                            +   '<td>'+project.department+'</td>'
                            +   '<td>'+project.Projectcost+'</td>'
                            +   '<td>'+project.region+'</td>'
                            +   '</tr>'
                            ;
                            i++;
                            $("#recListaa ").append(row)
                            });

                        @endif
                        @if ($type == 'equip')
                        (response.info).forEach(equip => {
                            row='<tr>'
                            +   '<td>'+i+'</td>'
                            +   '<td>'+equip.name+'</td>'
                            +   '<td>'+equip.manager_name+'</td>'
                            +   '<td>'+equip.department+'</td>'
                            +   '<td>'+equip.brand+'</td>'
                            +   '<td>'+equip.type+'</td>'
                            +   '<td>'+equip.price+'</td>'
                            +   '<td>'+equip.status+'</td>'
                            +   '<td>'+equip.count+'</td>'
                            +   '</tr>'
                            ;
                            i++;
                            $("#recListaa ").append(row)
                            });
                        @endif   
                    },
                    });
    
        }
</script>    
