<style>
    .detailsTB th{
        color:#ffffff;
    }
      .detailsTB th,.detailsTB td{
        text-align:right !important;
        
    }
    .recList>tr>td{
        font-size:12px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding-bottom: 5px !important;
}
.dataTables_filter{
    margin-top:-15px;
}
.even{
    background-color:#D7EDF9 !important;
}
.dt-buttons
{
    margin-bottom: 20px;
    text-align: left;
    
}

</style>

<input type="hidden" id="type" name="type" value="{{$type}}">
<div class="content-body resultTblaa">
    <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header" style="direction: rtl;">
                        <h4 class="card-title"><img src="{{asset('assets/images/ico/report32.png')}}" /> 
                            @if ($type=="outArchive")
                            {{ trans('archive.sending_out') }}
                            @elseif ($type=="inArchive")
                            {{ trans('archive.sending_in') }}
                            @else
                            {{ trans('archive.search_result') }}
                             @endif
                            </h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row" id="resultTblaa">
                                <div class="col-xl-12 col-lg-12">
                                    <table style="width:100%; margin-top: -10px;direction: rtl;text-align: right" class="detailsTB table wtbl">
                                        @if ($type=="outArchive"||$type=="inArchive"||$type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='assetsArchive'||$type=='citArchive'||$type=='depArchive')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th  >
                                                    #
                                                </th>
                                                <th  >
                                                    {{trans('admin.number')}}
                                                </th>
                                                <th  >
                                                    {{trans('admin.address')}}
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
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>
                                        @elseif($type=='licArchive'||$type=='licFileArchive')
                                        <thead>
                                            <tr style="text-align:center !important;background: #00A3E8;">
                                                <th  >
                                                    #
                                                </th>
                                                @if($type=='licArchive')
                                                <th  >
                                                    {{trans('archive.lic_num')}}
                                                </th>
                                                @elseif($type=='licFileArchive')
                                                <th  >
                                                    {{trans('archive.licfile_num')}}
                                                </th>
                                                @endif
                                                <th  >
                                                    {{trans('archive.subs')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.lic_type')}}
                                                </th>
                                                <th>
                                                    {{trans('archive.build_type')}}
                                                </th>
                                                <th style="width: 300px;">
                                                    {{trans('archive.attach')}}
                                                </th>
                                                <th>
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
                                                    {{trans('admin.phone')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.emp_id')}} 
                                                </th>
                                                <th>
                                                    {{trans('admin.region')}}
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
                                                    {{trans('admin.phone')}}
                                                </th>
                                                <th>
                                                    {{trans('admin.emp_id')}}  
                                                </th>
                                                <th>
                                                    {{trans('admin.region')}}
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
                                                    {{trans('admin.department')}}
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


<script>/*
    $( document ).ready(function() {
        $('.wtbl').DataTable().ajax.reload();
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
    
        }*/
        var types=$('#type').val();
        $( function(){
            var table=$('.wtbl').DataTable({
            processing:true,
            serverSide:true,
            info:true,
            @if ($type=="employee")
            ajax:"{{ route('emp_info_all') }}",
            @elseif ($type=="subscriber")
            ajax:"{{ route('subscribe_info_all') }}",
            @elseif ($type=="depart")
            ajax:"{{ route('dep_info_all') }}",
            @elseif ($type == 'org')
            ajax: {
                url: '{{ route('orgnization_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type == 'vehicle')
            ajax:"{{ route('vehcile_info_all') }}",
            @elseif($type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands')
            ajax: {
                url: '{{ route('asset_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif ($type == 'equip')
            ajax:"{{ route('equip_info_all') }}",
            @elseif ($type == 'project')
            ajax:"{{ route('project_info_all') }}",
            @elseif($type=="outArchive"||$type=="inArchive"||$type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='assetsArchive'||$type=='citArchive'||$type=='depArchive')
            ajax: {
                url: '{{ route('archieve_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @elseif($type=='licArchive'||$type=='licFileArchive')
            ajax: {
                url: '{{ route('archievelic_info_all') }}',
                data: function (d) {
                    d.type = $('#type').val();
                }
            },
            @endif
            @if($type == 'org')
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data: null, 
                        render:function(data,row,type){
                            $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                                return $actionBtn;
                        },
                        name:'name',
                    
                    },
                    {data:'manager_name',name:'admins.name'},
                    {data:'phone_one'},
                    {data:'job_title_name' ,name:'job_titles.name'},
                    {data:'region_name',name:'regions.name'},
                ],
            @elseif($type == 'depart')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
                {data:'manager_name',name:'admins.name'},//manager_name
                {data:'department_id'},
            ],
            @elseif($type == 'buildings'||$type == 'warehouses'||$type == 'Gardens_lands')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                { 
                   data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
                {data:'manager_name',name:'admins.name'},//manager_name
                {data:'price'},
                {data:'region_name',name:'regions.name'},
            ],
            @elseif($type=="employee"||$type=="subscriber")
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'phone_one'},
                @if ($type=="employee")
                {data:'identification'},
                @elseif ($type=="subscriber")
                {data:'national_id'},
                @endif
                {data:'region_name',name:'regions.name'},
            ],
            @elseif($type == 'vehicle')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'manager_name',name:'admins.name'},
                {data:'department_name',name:'departments.name'},
                {data:'type_name',name:'vehicle_types.name'},
                {data:'brand_name',name:'vehicle_brands.name'},//brand
                {data:'oiltype'},
                {data:'price'},
                {data:'selling_date'},
            ],
            @elseif($type == 'project')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'ProjectNo'},
                {data:'manager_name',name:'admins.name'},
                {data:'dateStart'},
                {data:'dateEnd'},
                {data:'department_name',name:'departments.name'},//department
                {data:'Projectcost'},
                {data:'region_name',name:'regions.name'},
            ],
            @elseif($type == 'equip')
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {
                        data: null, 
                        render:function(data,row,type){
                            $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                                return $actionBtn;
                        },
                        name:'name',
                
                     },
                {data:'manager_name',name:'admins.name'},
                {data:'department_name',name:'departments.name'},
                {data:'brand_name',name:'brands.name'},//brand
                {data:'type_name',name:'equpment_types.name'},
                {data:'price'},
                {data:'status',name:'equpment_statuses.name'},
                {data:'count'},
            ],
            @elseif($type=="outArchive"||$type=="inArchive"||$type=='projArchive'||$type=='munArchive'||$type=='empArchive'||$type=='assetsArchive'||$type=='citArchive'||$type=='depArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data:'serisal'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.title+'</a>';
                            return $actionBtn;
                    },
                    name:'title',
                
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.id+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {data:'model_id'},
                {data:'date'},
                {
                    data: null,
                    
                    render:function(data,row,type){
                        if(data.fileIDS&&typeof(data.fileIDS)=="object"){ 
                            var i=1;
                            $actionBtn="<div class='row' style='margin-left:0px;'>";
                            data.fileIDS.forEach(file => {
                                $actionBtn += '<div id="attach" class=" col-sm-6 ">'
                                    +'<div class="attach">'
                                      +'  <span class="attach-text">مرفق '+i+'</span>'
                                       +' <a class="attach-close1" href="'+file+'" style="color: #74798D; float:left;" target="_blank">'
                                        +'    <i class="fa fa-eye"> </i>'
                                        +'</a>'
                                    +'</div>'
                                    +'</div>'; 
                                    i++;
                            });
                            $actionBtn += '</div>';
                            return $actionBtn;
                        }
                        else{return '';}
                    },
                    name:'fileIDS',                    
                },
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @elseif ($type=='licArchive'||$type=='licFileArchive')
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data:'licNo'},
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.name+')">'+data.name+'</a>';
                            return $actionBtn;
                    },
                    name:'name',
                
                },
                {
                    data: null, 
                    render:function(data,row,type){
                        $actionBtn = '<a ondblclick="update('+data.license_type+')">'+data.license_type+'</a>';
                            return $actionBtn;
                    },
                    name:'license_type',
                
                },
                {data:'licn'},
                {data:'attachment_id'},
                
                {
                data: null, 
                render:function(data,row,type){
                        $actionBtn = '<a onclick="update('+data.id+')" class="btn btn-info"><i style="color:#ffffff" class="fa fa-edit"></i> </a>';
                            return $actionBtn;
                    },
                    name:'name',
                },
            ],
            @endif   
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
        
        })
</script>    
