<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Area;
use App\Models\User;
use App\Models\Department;
use App\Models\Region;
use App\Models\Project;
use App\Models\Orgnization;
use App\Http\Requests\ProjectRequest;
use Yajra\DataTables\DataTables;
use App\Models\Archive;
use App\Models\CopyTo;

class ProjectController extends Controller
{
    public function index(){
        $city = City::get();
        $admins = Admin::get();
        $users = User::get();
        $departments = Department::get();
        $sponsers = Orgnization::where('org_type','orginzation')->get();
        $Contractor = Orgnization::where('org_type','suppliers')->get();
        $type="project";
        return view('dashboard.project.index',compact('city','admins','users','Contractor','type',
        'departments','sponsers'));    
    }

    public function depart_manger_project(Request $request){
        $department = Department::where('admin_id',$request['val'])->first()->name;
        return response()->json($department);
    }

    public function store_project (ProjectRequest $request){

        if($request->project_id == null){
            $project = new Project();
            $address = new Address();
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $project->model = "App\Models\Project";
            $project->name = $request->ProjectName;
            $project->ProjectNo = $request->ProjectNo;
            $project->dateStart = $request->dateStart;
            $project->dateEnd = $request->dateEnd;
            $project->admin_id = $request->pinc6;
            $project->department_id  = $request->Department;
            $project->user_id    = json_encode($request->subscribers);
            $project->Projectcost   = $request->Projectcost;
            $project->currency = $request->CurrencyID;
            $project->sponser   = $request->sponsor;
            $project->addresse_id   = $address->id;
            $project->contract    = $request->Contractor;
            $project->pinc8   = $request->pinc8;
            $project->cost1   = $request->cost1;
            $project->save();
         }else{
            $project = Project::find($request->project_id);
            $address = Address::where('id',$project->addresse_id)->first();
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $project->name = $request->ProjectName;
            $project->ProjectNo = $request->ProjectNo;
            $project->dateStart = $request->dateStart;
            $project->dateEnd = $request->dateEnd;
            $project->admin_id = $request->pinc6;
            $project->department_id  = $request->Department;
            $project->Projectcost   = $request->Projectcost;
            $project->currency = $request->CurrencyID;
            $project->sponser   = $request->sponsor;
            $project->addresse_id   = $address->id;
            $project->contract    = $request->Contractor;
            $project->pinc8   = $request->pinc8;
            $project->cost1   = $request->cost1;
            $project->save();
         }
         if ($project) {

            return response()->json(['success'=>trans('admin.project_added')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function project_auto_complete(Request $request){
        $project_data = $request['term'];
        $names = Project::where('name', 'like', '%' . $project_data . '%')->select('*','name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($names);
    }

    public function project_info(Request $request)
    {
        $project['info'] = Project::find($request['project_id']);
        $model = $project['info']->model;
        $ArchiveCount = count(Archive::where('model_id',$request['project_id'])
        ->where('model_name',$model)->get());
        $Archive =Archive::where('model_id',$request['project_id'])
        ->where('model_name',$model)->get();
        $project['Archive'] = $Archive;
        $CopyToCount = count(CopyTo::where('model_id',$request['project_id'])
        ->where('model_name',$model)->get());
        $project['ArchiveCount'] = $ArchiveCount + $CopyToCount;
        $project['admin'] = Admin::where('id',$project['info']->admin_id)->first()->name;
        $project['department'] = Department::where('id',$project['info']->department_id)->first()->name;
        $project['address'] = Address::where('id', $project['info']['addresse_id'])->first();
        $project['sponsers'] = Orgnization::where('org_type','orginzation')->where('id', $project['info']->sponser)->first()->name;
        $project['contract'] = Orgnization::where('org_type','suppliers')->where('id', $project['info']->contract)->first()->name;
        $users = json_decode($project['info']->user_id);
        $project['users'] = User::whereIn('id', $users)->get();

        if($project['address']->city_id){
            $project['city'] =City::where('id',$project['address']->city_id)->first()->name;
        }
        if($project['address']->area_id){
            $project['area'] =Area::where('id',$project['address']->area_id)->first()->name;
        }
        if($project['address']->region_id){
            $project['region'] =Region::where('id',$project['address']->region_id)->first()->name;
        }
        $project['Currency'] = trans('admin.'.$project['info']->currency);


        return response()->json($project);

    }

    public function project_info_all(Request $request)
    {
        $project= Project::select('projects.*','addresses.notes','addresses.region_id','addresses.area_id',
        'addresses.city_id','addresses.details','regions.name as region_name','cities.name as city_name',
        'areas.name as area_name','admins.name as manager_name','departments.name as department_name')
        ->leftJoin('admins','admins.id','projects.admin_id')
        ->leftJoin('departments','departments.id','projects.department_id')
        ->leftJoin('addresses','addresses.id','projects.addresse_id')
        ->leftJoin('regions','addresses.region_id','regions.id')
        ->leftJoin('cities','addresses.city_id','cities.id')
        ->leftJoin('areas','addresses.area_id','areas.id')->orderBy('id', 'DESC');
        return DataTables::of($project)
                            ->addIndexColumn()
                            ->make(true);

    }
    




}
