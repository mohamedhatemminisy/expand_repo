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

class ProjectController extends Controller
{
    public function index(){
        $city = City::get();
        $admins = Admin::get();
        $users = User::get();
        $departments = Department::get();
        $sponsers = Orgnization::where('org_type','orginzation')->get();
        $Contractor = Orgnization::where('org_type','suppliers')->get();
        return view('dashboard.project.index',compact('city','admins','users','Contractor',
        'departments','sponsers'));    
    }

    public function depart_manger_project(Request $request){
        $department = Department::where('admin_id',$request['val'])->first()->name;
        return response()->json($department);
    }

    public function store_project (ProjectRequest $request){
        $address = new Address();
        $address->area_id = $request->area_data;
        $address->city_id = $request->CityID;
        $address->region_id = $request->region_data;
        $address->details = $request->AddressDetails;
        $address->notes = $request->Note;
        $address->save();
        if($request->project_id == null){
            $project = new Project();
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
        $project_data = $request->get('project');
        $names = Project::where('name', 'like', '%' . $project_data . '%')->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($html);
    }

    public function project_info(Request $request)
    {
        $project['info'] = Project::find($request['project_id']);
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
    




}
