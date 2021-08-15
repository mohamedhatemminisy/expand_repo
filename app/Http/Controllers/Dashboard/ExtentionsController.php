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
use App\Models\JobTitle;
use App\Models\Group;
use App\Http\Requests\ExtentionRequest;

class ExtentionsController extends Controller
{

    public function getConstantChildren(Request $request){
        if($request->pk_i_id == '17'){
            $data['data'] = JobTitle::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '9'){
            $data['data'] = Group::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        
        

    }


    public function deleteSubConstant(Request $request){
        if($request->fk_i_constant_id == '17'){
            $data = JobTitle::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '9'){
            $data = Group::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
    }


    public function store_model(ExtentionRequest $request){
        if($request->fk_i_constant_id1 == '17'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new JobTitle();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = JobTitle::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        elseif($request->fk_i_constant_id1 == '9'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new Group();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = Group::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }

    }

}