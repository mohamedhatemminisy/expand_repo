<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\volunteer;
use App\Models\Address;
use App\Models\Role;
// use App\Models\JobType;
use App\Models\JobTitle;
use App\Models\Area;
use App\Models\Region;
use App\Models\Volunteer_Courses;
use App\Models\Department;
use App\Http\Requests\VolunteerRequest;
use Yajra\DataTables\DataTables;
use DB;

class VolunteerController extends Controller
{
    public function index(){
        $city = City::get();
        $admin = Volunteer::get();
        // $jobType = JobType::get();
        $jobTitle = JobTitle::get();
        $departments = Department::get();
        $type = 'volunteer';
        return view('dashboard.volunteer.index',compact('type','city','admin','jobTitle','departments'));
    }

    public function store_volunteer(VolunteerRequest $request){
        // dd($request->all());
        // print_r();
        DB::beginTransaction();
        $role = new Role();
        $role->permissions = json_encode($request->my_multi_select3);
        $role->save();

        if($request->volunteer_id == null){
            $volunteer = new Volunteer();
            $address = new Address();
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'volunteer_');
            }else{
                $path = '';
            }
            $volunteer->model = "App\Models\volunteer";
            $volunteer->image  = url($path);
            $volunteer->name = $request->Name;
            $volunteer->identification = $request->NationalID;
            $volunteer->phone_one = $request->MobileNo1;
            $volunteer->phone_two = $request->MobileNo2;
            $volunteer->nick_name = $request->NickName;
            $volunteer->joining_date = $request->JoiningDate;
            $volunteer->status = '1';
            $volunteer->added_by = Auth()->user()->id;
            $volunteer->url = 'volunteer';
            $volunteer->email  = $request->EmailAddress;
            $volunteer->marital_status  = $request->MaritalStatus;
            $volunteer->address_id  = $request->AddressId;
            $volunteer->job_title_id  = $request->JobTitleID;
            $volunteer->department_id  = $request->DepartmentID;
            $volunteer->license_types_id  = $request->LicenseTypesID;
            $volunteer->birthdate  = $request->Birthdate;
            $volunteer->blood_type  = $request->BloodType;
            $volunteer->save();
            for($i=0 ; $i< count($request->education) ; $i++){
                // dd(count($request->education));
                // print_r();
                $VolunteerCourses = new Volunteer_Courses();
                $VolunteerCourses->volunteer_id =$volunteer->id;
                $VolunteerCourses->name =$request->education[$i];
                $VolunteerCourses->institution =$request->institution1[$i];
                $VolunteerCourses->type ='qulification';
                $VolunteerCourses->completion_date = $request->graduation_date[$i];
                $VolunteerCourses->save();
            }
            for($i=0 ; $i< count($request->courses) ; $i++){
                $VolunteerCourses = new Volunteer_Courses();
                $VolunteerCourses->volunteer_id =$volunteer->id;
                $VolunteerCourses->name =$request->courses[$i];
                $VolunteerCourses->institution =$request->institution2[$i];
                $VolunteerCourses->type ='course';
                $VolunteerCourses->completion_date = $request->completion_date[$i];
                $VolunteerCourses->save();
            }


        }else{
            $volunteer = Volunteer::find($request->volunteer_id);
            if ($request->file('imgPic')) {
                $path = upload_image($request->file('imgPic'), 'emp_');
            }else{
                $path = '';
            }
            $volunteer->image = url($path);
            $volunteer->name = $request->Name;
            $volunteer->identification = $request->NationalID;
            $volunteer->phone_one = $request->MobileNo1;
            $volunteer->phone_two = $request->MobileNo2;
            // $volunteer->job_Number = $request->JobNumber;
            $volunteer->nick_name = $request->NickName;
            // $volunteer->salary = $request->Salary;
            // $volunteer->currency = $request->CurrencyID;
            // $volunteer->username = $request->username;
            $volunteer->joining_date = $request->JoiningDate;
            $volunteer->status = '1';
            $volunteer->email  = $request->EmailAddress;
            // if($request->password){
            //     $volunteer->password = bcrypt($request->password);
            // }else{
            //     $volunteer->password = $volunteer->password;
            // }
            // $volunteer->InternalPhone = $request->InternalPhone;
            // $volunteer->admin_id  = $request->DirectManager;
            // $volunteer->role_id = $role->id;

            $volunteer->marital_status  = $request->MaritalStatus;
            $volunteer->address_id  = $request->AddressId;
            $volunteer->job_title_id  = $request->JobTitleID;
            $volunteer->department_id  = $request->DepartmentID;
            $volunteer->license_types_id  = $request->LicenseTypesID;
            $volunteer->birthdate  = $request->Birthdate;
            $volunteer->blood_type  = $request->BloodType;

            $volunteer->save();
            $volunteerCourses = Volunteer_Courses::where('volunteer_id',$volunteer->id)->first();
            $address = Address::where('id',$volunteer->address_id)->first();
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $volunteerCourses->volunteer_id =$volunteer->id;
            $volunteerCourses->name =$request->CourseName;
            $volunteerCourses->institution =$request->Institution;
            $volunteerCourses->job_type_id =$request->JobType;
            $volunteerCourses->type =$request->Type;
            $volunteerCourses->completion_date = $request->CompletionDate;
            $volunteerCourses->save();
        }

        DB::commit();
        $volunteer->address_id =$address->id;
        $volunteer->job_title_id =$request->Position;
        // $volunteer->job_type_id =$request->JobType;
        $volunteer->department_id =$request->DepartmentID;
        // $volunteer->year = $request->vac_year;
        // $volunteer->balance = $request->vac_annual;
        // $volunteer->emergency = $request->emr_blanace;
        if ($volunteer) {

            return response()->json(['success'=>trans('admin.employee_added')]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function emp_auto_complete(Request $request)
    {
        // $vol_data = $request['term'];
        // $names = Volunteer::where('name', 'like', '%' . $vol_data . '%')->select('*','name as label')->get();
        // //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        // return response()->json($names);
    }

    public function emp_info(Request $request)
    {
        // $admin['info'] = Volunteer::find($request['emp_id']);
        // // $admin['details'] = AdminDetail::where('admin_id',$request['emp_id'])->first();
        // $admin['job_title'] = JobTitle::where('id',$admin['details']->job_title_id )->first()->name;
        // // $admin['job_type'] = JobType::where('id',$admin['details']->job_type_id )->first()->name;
        // $admin['department_id'] = JobType::where('id',$admin['details']->job_type_id )->first()->name;
        // $admin['address'] = Address::where('id',$admin['details']->address_id  )->first();
        // $admin['DirectManager'] = Volunteer::where('id',$admin['info']->admin_id  )->first()->name;
        // $admin['Currency'] = trans('admin.'.$admin['info']->currency);
        // if($admin['address']->city_id){
        //     $admin['city'] =City::where('id',$admin['address']->city_id)->first()->name;
        // }
        // if($admin['address']->area_id){
        //     $admin['area'] =Area::where('id',$admin['address']->area_id)->first()->name;
        // }
        // if($admin['address']->region_id){
        //     $admin['region'] =Region::where('id',$admin['address']->region_id)->first()->name;
        // }

        // return response()->json($admin);

    }

    public function emp_info_all()
    {
        // $admin= Volunteer::select('admins.*','addresses.notes','addresses.region_id','addresses.area_id',
        // 'addresses.city_id','addresses.details','regions.name as region_name','cities.name as city_name',
        // 'areas.name as area_name','job_types.name as job_type_name','job_titles.name as job_title_name')
        // ->leftJoin('admin_details','admins.id','admin_details.admin_id')
        // ->leftJoin('job_types','job_types.id','admin_details.job_type_id')
        // ->leftJoin('job_titles','job_titles.id','admin_details.job_title_id')
        // ->leftJoin('addresses','addresses.id','admin_details.address_id')
        // ->leftJoin('regions','addresses.region_id','regions.id')
        // ->leftJoin('cities','addresses.city_id','cities.id')
        // ->leftJoin('areas','addresses.area_id','areas.id')->orderBy('id', 'DESC');
        // return DataTables::of($admin)
        //                     ->addIndexColumn()
        //                     ->make(true);

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
