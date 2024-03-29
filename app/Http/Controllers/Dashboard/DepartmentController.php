<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Department;
use App\Models\AdminDetail;
use App\Http\Requests\DepartmentRequest;
use App\Models\JobTitle;
use Yajra\DataTables\DataTables;
use App\Models\Archive;
use App\Models\CopyTo;
use App\Models\linkedTo;
use App\Models\ArchiveLicense;

class DepartmentController extends Controller
{
    public function index(){
        $admins = Admin::get();
        $departments = Department::get();
        $type='depart';
        return view('dashboard.department.index',compact('admins','departments','type'));    
    }

    public function depart_manger(Request $request){
        $department = Department::where('id',$request['val'])->first();
        $admin = Admin::where('id',$department->admin_id)->first()->nick_name;
        return response()->json($admin);
    }


    public function store_department(DepartmentRequest $request){
        if($request->department_id == null){
            $department = new Department();
            $department->name = $request->departmentName;
            $department->model = "App\Models\Department";
            $department->add_by = Auth()->user()->id;
            $department->url = 'department';
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
        $emp_data = $request['term'];
        $names = Department::where('name', 'like', '%' . $emp_data . '%')->select('*','name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }  

    public function dep_info(Request $request)
    {
        $depaertment['info'] = Department::find($request['dep_id']);
        if($depaertment['info']->admin_id){
            $depaertment['admin'] = Admin::where('id',$depaertment['info']->admin_id)->first()->nick_name;
        }

        if($depaertment['info']->department_id){
            $depaertment_info = Department::where('id',$depaertment['info']->department_id)->first();
            $depaertment['dep_parent'] = $depaertment_info->name;
            if(sizeof(Admin::where('id', $depaertment_info->admin_id)->get())==0)
                $depaertment['dep_parent_manager']=array();
            else
                $depaertment['dep_parent_manager'] = Admin::where('id', $depaertment_info->admin_id)->first()->nick_name;
        }
        $model = $depaertment['info']->model;

        $depaertment['outArchiveCount'] = count(Archive::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->where('type','outArchive')->get());
        $depaertment['inArchiveCount']  = count(Archive::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->where('type','inArchive')->get());
        $depaertment['otherArchiveCount']  = count(Archive::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->whereNotIn('type', ['outArchive','inArchive'])->get());
        $depaertment['licArchiveCount'] = 0;
        $depaertment['licFileArchiveCount'] = 0;
        $depaertment['copyToCount']  = count(CopyTo::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->get());
        $depaertment['linkToCount']  = count(linkedTo::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->get());

        $ArchiveCount = count(Archive::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->get());
        $CopyToCount = count(CopyTo::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->get());
        $Archive =Archive::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->with('files')->get();
        $CopyTo = CopyTo::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->with('archive','archive.files')->get();
        $depaertment['copyTo'] = $CopyTo;
        $depaertment['Archive'] = $Archive;

        $jalArchive = linkedTo::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->with('archive','archive.files')->get();
        $depaertment['jalArchive'] = $jalArchive;
        $jalArchiveCount = count(linkedTo::where('model_id',$request['dep_id'])
        ->where('model_name',$model)->get());
        $depaertment['ArchiveCount'] = $ArchiveCount + $CopyToCount+$jalArchiveCount;

        $employees = AdminDetail::where('department_id',$request['dep_id'])->pluck('admin_id')->toArray();
        $employees_job_titles = AdminDetail::where('department_id',$request['dep_id'])->pluck('job_title_id')->toArray();
        $depaertment['employees'] = Admin::whereIn('id',$employees)->get();
        foreach($employees_job_titles as $title){
            $depaertment['job_title'][] = JobTitle::where('id',$title)->first()->name;
        }
        return response()->json($depaertment);

    }
    public function dep_info_all(Request $request)
    {
        $depaertment = Department::select('departments.*','admins.name as manager_name')
        ->leftJoin('admins','admins.id','departments.admin_id');
        return DataTables::of($depaertment)
                            ->addIndexColumn()
                            ->make(true);


    }
}
