<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Department;
use App\Models\AdminDetail;
use App\Http\Requests\DepartmentRequest;
use App\Models\JobTitle;

class DepartmentController extends Controller
{
    public function index(){
        $admins = Admin::get();
        $departments = Department::get();
        return view('dashboard.department.index',compact('admins','departments'));    
    }

    public function depart_manger(Request $request){
        $department = Department::where('id',$request['val'])->first();
        $admin = Admin::where('id',$department->admin_id)->first()->name;
        return response()->json($admin);
    }


    public function store_department(DepartmentRequest $request){

        if($request->department_id == null){
            $department = new Department();
            $department->name = $request->departmentName;
            $department->phone = $request->phone;
            $department->extphone = $request->extphone;
            $department->email = $request->email;
            $department->admin_id = $request->Incharge;
            $department->department_id = $request->LinkDept;
            $department->save();
         }else{
            $department = Department::find($request->department_id);
            $department->name = $request->departmentName;
            $department->phone = $request->phone;
            $department->extphone = $request->extphone;
            $department->email = $request->email;
            $department->admin_id = $request->Incharge;
            $department->department_id = $request->LinkDept;
            $department->save();
         }
         if ($department) {

            return response()->json(['success'=>trans('admin.department_added')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function dept_auto_complete(Request $request)
    {
        $emp_data = $request->get('department');
        $names = Department::where('name', 'like', '%' . $emp_data . '%')->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($html);
    }  

    public function dep_info(Request $request)
    {
        $depaertment['info'] = Department::find($request['dep_id']);
        $depaertment['admin'] = Admin::where('id',$depaertment['info']->admin_id)->first()->name;
        if($depaertment['info']->department_id){
            $depaertment_info = Department::where('id',$depaertment['info']->department_id)->first();
            $depaertment['dep_parent'] = $depaertment_info->name;
            $depaertment['dep_parent_manager'] = Admin::where('id', $depaertment_info->admin_id)->first()->name;

        }

        $employees = AdminDetail::where('department_id',$request['dep_id'])->pluck('admin_id')->toArray();
        $employees_job_titles = AdminDetail::where('department_id',$request['dep_id'])->pluck('job_title_id')->toArray();
        $depaertment['employees'] = Admin::whereIn('id',$employees)->get();
        foreach($employees_job_titles as $title){
            $depaertment['job_title'][] = JobTitle::where('id',$title)->first()->name;
        }
        return response()->json($depaertment);

    }

}
