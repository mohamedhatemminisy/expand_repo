<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Admin;
use App\Models\Address;
use App\Models\Role;
use App\Models\JobType;
use App\Models\JobTitle;
use App\Models\Area;
use App\Models\Region;
use App\Models\AdminDetail;
use App\Models\Department;
use App\Http\Requests\EmployeeRequest;
use DB;

class EmployeeController extends Controller
{
    public function index(){
        $city = City::get();
        $admin = Admin::get();
        $jobType = JobType::get();
        $jobTitle = JobTitle::get();
        $departments = Department::get();
        $type = 'employee';
        return view('dashboard.employee.index',compact('type','city','admin','jobType','jobTitle','departments'));         
    }

    public function store_employee(EmployeeRequest $request){

        DB::beginTransaction();

        $role = new Role();
        $role->permissions = json_encode($request->my_multi_select3);
        $role->save();
        $address = new Address();
        $address->area_id = $request->area_data;
        $address->city_id = $request->CityID;
        $address->region_id = $request->region_data;
        $address->details = $request->AddressDetails;
        $address->notes = $request->Note;
        $address->save();
        if($request->employee_id == null){
            $admin = new Admin();
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = '';
            }

            $admin->image  = $path;
            $admin->name = $request->Name;
            $admin->identification = $request->NationalID;
            $admin->phone_one = $request->MobileNo1;
            $admin->phone_two = $request->MobileNo2;
            $admin->job_Number = $request->JobNumber;
            $admin->nick_name = $request->NickName;
            $admin->salary = $request->Salary;
            $admin->currency = $request->CurrencyID;
            $admin->username = $request->username;
            $admin->start_date = $request->HiringDate;
            $admin->status = '1';
            $admin->email  = $request->EmailAddress;
            $admin->password = bcrypt($request->password);
            $admin->InternalPhone = $request->InternalPhone;
            $admin->admin_id  = $request->DirectManager;
            $admin->role_id = $role->id;
            $admin->save();
            $AdminDetail = new AdminDetail();
            $AdminDetail->admin_id =$admin->id; 
            $AdminDetail->address_id =$address->id; 
            $AdminDetail->job_title_id =$request->Position; 
            $AdminDetail->job_type_id =$request->JobType; 
            $AdminDetail->department_id =$request->DepartmentID; 
            $AdminDetail->year = $request->vac_year;
            $AdminDetail->balance = $request->vac_annual;
            $AdminDetail->emergency = $request->emr_blanace;
            $AdminDetail->save();
        }else{
            $admin = Admin::find($request->employee_id);
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = $equpment->image;
            }
            $admin->image = $path;
            $admin->name = $request->Name;
            $admin->identification = $request->NationalID;
            $admin->phone_one = $request->MobileNo1;
            $admin->phone_two = $request->MobileNo2;
            $admin->job_Number = $request->JobNumber;
            $admin->nick_name = $request->NickName;
            $admin->salary = $request->Salary;
            $admin->currency = $request->CurrencyID;
            $admin->username = $request->username;
            $admin->start_date = $request->HiringDate;
            $admin->status = '1';
            $admin->email  = $request->EmailAddress;
            if($request->password){
                $admin->password = bcrypt($request->password);
            }else{
                $admin->password = $admin->password;
            }
            $admin->InternalPhone = $request->InternalPhone;
            $admin->admin_id  = $request->DirectManager;
            $admin->role_id = $role->id;
            $admin->save();
            $AdminDetail = AdminDetail::where('admin_id',$admin->id)->first();
            $AdminDetail->admin_id =$admin->id; 
            $AdminDetail->address_id =$address->id; 
            $AdminDetail->job_title_id =$request->Position; 
            $AdminDetail->job_type_id =$request->JobType; 
            $AdminDetail->department_id =$request->DepartmentID; 
            $AdminDetail->year = $request->vac_year;
            $AdminDetail->balance = $request->vac_annual;
            $AdminDetail->emergency = $request->emr_blanace;
            $AdminDetail->save();
        }

        DB::commit();
        $admin->address_id =$address->id; 
        $admin->job_title_id =$request->Position; 
        $admin->job_type_id =$request->JobType; 
        $admin->department_id =$request->DepartmentID; 
        $admin->year = $request->vac_year;
        $admin->balance = $request->vac_annual;
        $admin->emergency = $request->emr_blanace;
        if ($AdminDetail) {

            return response()->json(['success'=>trans('admin.employee_added')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function emp_auto_complete(Request $request)
    {
        $emp_data = $request['term'];
        $names = Admin::where('name', 'like', '%' . $emp_data . '%')->select('*','name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }    

    public function emp_info(Request $request)
    {
        $admin['info'] = Admin::find($request['emp_id']);
        $admin['details'] = AdminDetail::where('admin_id',$request['emp_id'])->first();
        $admin['job_title'] = JobTitle::where('id',$admin['details']->job_title_id )->first()->name;
        $admin['job_type'] = JobType::where('id',$admin['details']->job_type_id )->first()->name;
        $admin['department_id'] = JobType::where('id',$admin['details']->job_type_id )->first()->name;
        $admin['address'] = Address::where('id',$admin['details']->address_id  )->first();
        $admin['DirectManager'] = Admin::where('id',$admin['info']->admin_id  )->first()->name;
        $admin['Currency'] = trans('admin.'.$admin['info']->currency);
        if($admin['address']->city_id){
            $admin['city'] =City::where('id',$admin['address']->city_id)->first()->name;
        }
        if($admin['address']->area_id){
            $admin['area'] =Area::where('id',$admin['address']->area_id)->first()->name;
        }
        if($admin['address']->region_id){
            $admin['region'] =Region::where('id',$admin['address']->region_id)->first()->name;
        }

        return response()->json($admin);

    }

    public function emp_info_all()
    {
        $admin['info'] = Admin::all();
        
        return response()->json($admin);

    }
}
