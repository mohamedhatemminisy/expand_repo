<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Admin;
use App\Models\Orgnization;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Http\Requests\VehcileRequest;
use Yajra\DataTables\DataTables;
class vehicleController extends Controller
{
    public function index(){
        $departments = Department::get();
        $sponsers = Orgnization::where('org_type','orginzation')->get();
        $suppliers = Orgnization::where('org_type','suppliers')->get();
        $admins = Admin::get();
        $vehicleBrands = VehicleBrand::get();
        $vehicleTypes = VehicleType::get();
        $type = 'vehicle';
        return view('dashboard.vehicle.index',compact('departments','sponsers','suppliers','type'
        ,'admins','vehicleBrands','vehicleTypes'));
    }

    public function store_vehcile(VehcileRequest $request){

        if($request->vehicle_id == null){
            $vehicle = new Vehicle();
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = '';
            }
            $vehicle->name = $request->Vehiclename;
            $vehicle->serial_number = $request->plateNo;
            $vehicle->selling_date = $request->dateinput21;
            $vehicle->image = $path;
            $vehicle->price = $request->OrgSalary;
            $vehicle->currency = $request->OrgCurrencyID3;
            $vehicle->supply_phone = $request->PHnum1;
            $vehicle->sponsor_phone = $request->PHnum2;
            $vehicle->licensedate = $request->licensedate;
            $vehicle->Inshurencedate = $request->Inshurencedate;
            $vehicle->oiltype = $request->oiltype;
            $vehicle->sponser  = $request->Sponsor;
            $vehicle->wdateinput = $request->Wdateinput22;
            $vehicle->supplyer = $request->Supplier;
            $vehicle->admin_id = $request->pinc2;
            $vehicle->admin_two  = $request->pinc3;
            $vehicle->department_id = $request->Department;
            $vehicle->brand_id = $request->vehiclebrand;
            $vehicle->type_id = $request->vehicletype;
            $vehicle->save();
         }else{
            $vehicle = Vehicle::find($request->vehicle_id);
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = $vehicle->image;
            }
            $vehicle->name = $request->Vehiclename;
            $vehicle->serial_number = $request->plateNo;
            $vehicle->selling_date = $request->dateinput21;
            $vehicle->image = $path;
            $vehicle->price = $request->OrgSalary;
            $vehicle->currency = $request->OrgCurrencyID3;
            $vehicle->supply_phone = $request->PHnum1;
            $vehicle->sponsor_phone = $request->PHnum2;
            $vehicle->licensedate = $request->licensedate;
            $vehicle->Inshurencedate = $request->Inshurencedate;
            $vehicle->oiltype = $request->oiltype;
            $vehicle->sponser  = $request->Sponsor;
            $vehicle->wdateinput = $request->Wdateinput22;
            $vehicle->supplyer = $request->Supplier;
            $vehicle->admin_id = $request->pinc2;
            $vehicle->admin_two  = $request->pinc3;
            $vehicle->department_id = $request->Department;
            $vehicle->brand_id = $request->vehiclebrand;
            $vehicle->type_id = $request->vehicletype;
            $vehicle->save();
         }
         if ($vehicle) {
            return response()->json(['success'=>trans('admin.vehicle_added')]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function vehicle_auto_complete(Request $request)
    {
        $vehicle_data = $request['term'];
        $names = Vehicle::where('name', 'like', '%' . $vehicle_data . '%')->select('*', 'name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    } 
    public function vehcile_info(Request $request)
    {
        $vehicle['info'] = Vehicle::find($request['vehcile_id']);
        $vehicle['admin'] = Admin::where('id',$vehicle['info']->admin_id)->first()->name;
        $vehicle['admin_two'] = Admin::where('id',$vehicle['info']->admin_two)->first()->name;
        $vehicle['department'] = Department::where('id',$vehicle['info']->department_id)->first()->name;
        $vehicle['sponser'] = Orgnization::where('org_type','orginzation')
        ->where('id', $vehicle['info']->sponser)->first()->name;
        $vehicle['supplyer'] = Orgnization::where('org_type','suppliers')->
        where('id', $vehicle['info']->supplyer)->first()->name;
        $vehicle['brand'] = VehicleBrand::where('id',$vehicle['info']->brand_id )->first()->name;
        $vehicle['type'] = VehicleType::where('id',$vehicle['info']->type_id)->first()->name;
        $vehicle['Currency'] = trans('admin.'.$vehicle['info']->currency);
        $vehicle['oiltype'] = trans('admin.'.$vehicle['info']->oiltype);

        return response()->json($vehicle);

    }
    public function vehcile_info_all(Request $request)
    {
        $vehicle= Vehicle::select('vehicles.*','admins.name as manager_name','departments.name as department_name','vehicle_brands.name as brand_name','vehicle_types.name as type_name')
        ->leftJoin('admins','admins.id','vehicles.admin_id')
        ->leftJoin('departments','departments.id','vehicles.department_id')
        ->leftJoin('vehicle_brands','vehicle_brands.id','vehicles.brand_id')
        ->leftJoin('vehicle_types','vehicle_types.id','vehicles.type_id')->orderBy('id', 'DESC');
        

        return DataTables::of($vehicle)
                            ->addIndexColumn()
                            ->make(true);

    }
    

    
    
}
