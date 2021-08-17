<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Admin;
use App\Models\Orgnization;
use App\Models\Brand;
use App\Models\Equpment;
use App\Models\EqupmentStatus;
use App\Models\EqupmentType;
use App\Http\Requests\EquipentRequest;

class AssetsController extends Controller
{
    public function dev_equp(){
        $admins = Admin::get();
        $brand = Brand::get();
        $equp_types = EqupmentType::get();
        $equp_status = EqupmentStatus::get();
        $departments = Department::get();
        $sponsers = Orgnization::where('org_type','orginzation')->get();
        $suppliers = Orgnization::where('org_type','suppliers')->get();
        return view('dashboard.assets.index',compact('admins','brand','equp_types','equp_status',
        'departments','sponsers','suppliers'));    
    }

    public function store_equpment(EquipentRequest $request){

        if($request->equpiment_id == null){
            $equpment = new Equpment();
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = '';
            }
            $equpment->name = $request->Equipment;
            $equpment->serial_number = $request->SerialNo;
            $equpment->internal_number = $request->InternalNo;
            $equpment->count = $request->PiceCnt;
            $equpment->selling_date = $request->dateinput;
            $equpment->image  = $path;
            $equpment->price   = $request->OrgSalary;
            $equpment->currency = $request->OrgCurrencyID;
            $equpment->notes   = $request->MantinanceNote;
            $equpment->address   = $request->AddressDetailsAR;
            $equpment->wdate_input    = $request->Wdateinput;
            $equpment->supply_phone   = $request->PHnum1;
            $equpment->sponsor_phone   = $request->PHnum2;
            $equpment->sponser    = $request->SponsorName;
            $equpment->supplyer    = $request->Supplier;
            $equpment->admin_id    = $request->pinc3;
            $equpment->department_id     = $request->Department;
            $equpment->brand_id     = $request->brand;
            $equpment->equpment_type_id     = $request->Eqtype;
            $equpment->equpment_status_id     = $request->EqtStatus;
            $equpment->save();
         }else{
            $equpment = Equpment::find($request->equpiment_id);
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = $equpment->image;
            }
            $equpment->name = $request->Equipment;
            $equpment->serial_number = $request->SerialNo;
            $equpment->internal_number = $request->InternalNo;
            $equpment->count = $request->PiceCnt;
            $equpment->selling_date = $request->dateinput;
            $equpment->image  = $path;
            $equpment->price   = $request->OrgSalary;
            $equpment->currency = $request->OrgCurrencyID;
            $equpment->notes   = $request->MantinanceNote;
            $equpment->address   = $request->AddressDetailsAR;
            $equpment->wdate_input    = $request->Wdateinput;
            $equpment->supply_phone   = $request->PHnum1;
            $equpment->sponsor_phone   = $request->PHnum2;
            $equpment->sponser    = $request->SponsorName;
            $equpment->supplyer    = $request->Supplier;
            $equpment->admin_id    = $request->pinc3;
            $equpment->department_id     = $request->Department;
            $equpment->brand_id     = $request->brand;
            $equpment->equpment_type_id     = $request->Eqtype;
            $equpment->equpment_status_id     = $request->EqtStatus;
            $equpment->save();
         }
         if ($equpment) {
            return response()->json(['success'=>trans('admin.equpment_added')]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function equip_auto_complete(Request $request)
    {
        $emp_data = $request['term'];
        $names = Equpment::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        return response()->json($names);
    }  
    public function equip_info(Request $request)
    {
        $equipment['info'] = Equpment::find($request['equip_id']);
        $equipment['admin'] = Admin::where('id',$equipment['info']->admin_id)->first()->name;
        $equipment['department'] = Department::where('id',$equipment['info']->department_id)->first()->name;
        $equipment['sponser'] = Orgnization::where('org_type','orginzation')
        ->where('id', $equipment['info']->sponser)->first()->name;
        $equipment['supplyer'] = Orgnization::where('org_type','suppliers')->
        where('id', $equipment['info']->supplyer)->first()->name;
        $equipment['brand'] = Brand::where('id',$equipment['info']->brand_id)->first()->name;
        $equipment['type'] = EqupmentType::where('id',$equipment['info']->equpment_type_id)->first()->name;
        $equipment['status'] = EqupmentStatus::where('id',$equipment['info']->equpment_status_id)->first()->name;
        $equipment['Currency'] = trans('admin.'.$equipment['info']->currency);

        return response()->json($equipment);

    }
    
}
