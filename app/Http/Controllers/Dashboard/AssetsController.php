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
use Yajra\DataTables\DataTables;
use App\Models\Archive;
use App\Models\CopyTo;

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
        $type="equip";
        return view('dashboard.assets.index',compact('admins','brand','equp_types','equp_status','type',
        'departments','sponsers','suppliers'));    
    }

    public function store_equpment(EquipentRequest $request){

        if($request->equpiment_id == null){
            $equpment = new Equpment();
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'quipent_');
            }else{
                $path = '';
            }
            $equpment->name = $request->Equipment;
            $equpment->add_by = Auth()->user()->id;
            $equpment->url = "dev_equp";
            $equpment->model = "App\Models\Equpment";
            $equpment->serial_number = $request->SerialNo;
            $equpment->internal_number = $request->InternalNo;
            $equpment->count = $request->PiceCnt;
            $equpment->selling_date = $request->dateinput;
            $equpment->image  = url($path);
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
                $path = upload_image($request->file('imgPic'), 'quipent_');
            }else{
                $path = '';
            }
            $equpment->name = $request->Equipment;
            $equpment->serial_number = $request->SerialNo;
            $equpment->internal_number = $request->InternalNo;
            $equpment->count = $request->PiceCnt;
            $equpment->selling_date = $request->dateinput;
            $equpment->image  = url($path);
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
        $model = $equipment['info']->model;
        $ArchiveCount = count(Archive::where('model_id',$request['equip_id'])
        ->where('model_name',$model)->get());
        $CopyToCount = count(CopyTo::where('model_id',$request['equip_id'])
        ->where('model_name',$model)->get());
        $equipment['ArchiveCount'] = $ArchiveCount + $CopyToCount;
        $Archive =Archive::where('model_id',$request['equip_id'])
        ->where('model_name',$model)->with('files')->get();
        $equipment['Archive'] = $Archive;
        $CopyTo = CopyTo::where('model_id',$request['equip_id'])
        ->where('model_name',$model)->with('archive','archive.files')->get();
        $equipment['copyTo'] = $CopyTo;
        if($equipment['info']->admin_id){
            $equipment['admin'] = Admin::where('id',$equipment['info']->admin_id)->first()->name;
        }if($equipment['info']->department_id){
            $equipment['department'] = Department::where('id',$equipment['info']->department_id)->first()->name;
        }
        if($equipment['info']->sponser){
            $equipment['sponser'] = Orgnization::where('org_type','orginzation')
            ->where('id', $equipment['info']->sponser)->first()->name;
        }
        if($equipment['info']->supplyer){
            $equipment['supplyer'] = Orgnization::where('org_type','suppliers')->
            where('id', $equipment['info']->supplyer)->first()->name;
        }
        if($equipment['info']->brand_id){
            $equipment['brand'] = Brand::where('id',$equipment['info']->brand_id)->first()->name;
        }
        if($equipment['info']->equpment_type_id){
            $equipment['type'] = EqupmentType::where('id',$equipment['info']->equpment_type_id)->first()->name;
        }
        if($equipment['info']->equpment_status_id){
            $equipment['status'] = EqupmentStatus::where('id',$equipment['info']->equpment_status_id)->first()->name;
        }
        $equipment['Currency'] = trans('admin.'.$equipment['info']->currency);

        return response()->json($equipment);

    }
    public function equip_info_all(Request $request)
    {
        $equipment= Equpment::select('equpments.*','admins.name as manager_name','departments.name as department_name','brands.name as brand_name','equpment_types.name as type_name','equpment_statuses.name as status')
        ->leftJoin('admins','admins.id','equpments.admin_id')
        ->leftJoin('departments','departments.id','equpments.department_id')
        ->leftJoin('brands','brands.id','equpments.brand_id')
        ->leftJoin('equpment_types','equpment_types.id','equpments.equpment_type_id')
        ->leftJoin('equpment_statuses','equpment_statuses.id','equpments.equpment_status_id')->orderBy('id', 'DESC');
        
        return DataTables::of($equipment)
                        ->addIndexColumn()
                        ->make(true);

    }
    function upload_image($file, $prefix){
        if($file){
            $files = $file;
            $imageName = $prefix.rand(3,999).'-'.time().'.'.$files->extension();
            $image = "storage/".$imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }  
}
