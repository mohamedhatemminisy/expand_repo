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
use App\Models\JobType;
use App\Models\Brand;
use App\Models\EqupmentType;
use App\Models\EqupmentStatus;
use App\Models\VehicleType;
use App\Models\VehicleBrand;
use App\Models\AssetStatus;
use App\Models\ArchiveType;


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
        elseif($request->pk_i_id == '6'){
            $data['data'] = JobType::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '12'){
            $data['data'] = Brand::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '24'){
            $data['data'] = EqupmentType::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '50'){
            $data['data'] = EqupmentStatus::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '25'){
            $data['data'] = VehicleBrand::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '26'){
            $data['data'] = VehicleType::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '30'){
            $data['data'] = AssetStatus::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }

        elseif($request->pk_i_id == '10'){
            $data['data'] = City::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '33'){
            $data['data'] = Area::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '77'){
            $data['data'] = Region::get();
            $data['pj_i_id'] = $request->pk_i_id;
            return response()->json($data);
        }
        elseif($request->pk_i_id == '42'){
            $data['data'] = ArchiveType::get();
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
        elseif($request->fk_i_constant_id == '6'){
            $data = JobType::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '12'){
            $data = Brand::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '24'){
            $data = EqupmentType::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '50'){
            $data = EqupmentStatus::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '25'){
            $data = VehicleBrand::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '26'){
            $data = VehicleType::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '30'){
            $data = AssetStatus::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '10'){
            $data = City::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        
        elseif($request->fk_i_constant_id == '33'){
            $data = Area::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '77'){
            $data = Region::findOrFail($request->pk_i_id)->delete();
            return response()->json($data);
        }
        elseif($request->fk_i_constant_id == '42'){
            $data = ArchiveType::findOrFail($request->pk_i_id)->delete();
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
        elseif($request->fk_i_constant_id1 == '6'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new JobType();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = JobType::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '12'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new Brand();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = Brand::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '24'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new EqupmentType();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = EqupmentType::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '50'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new EqupmentStatus();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = EqupmentStatus::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '25'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new VehicleBrand();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = VehicleBrand::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '26'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new VehicleType();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = VehicleType::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '30'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new AssetStatus();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = AssetStatus::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '10'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new City();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = City::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        elseif($request->fk_i_constant_id1 == '33'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new Area();
                $job->name = $request->s_name_ar1;
                $job->city_id  = $request->ctrlToRefresh;
                $job->save();
            }else{
                $job = Area::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->city_id  = $request->ctrlToRefresh;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);            
        }
        elseif($request->fk_i_constant_id1 == '33'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new Area();
                $job->name = $request->s_name_ar1;
                $job->city_id  = $request->ctrlToRefresh;
                $job->save();
            }else{
                $job = Area::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->city_id  = $request->ctrlToRefresh;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);            
        }
        elseif($request->fk_i_constant_id1 == '77'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new Region();
                $job->name = $request->s_name_ar1;
                $job->area_id   = $request->ctrlToRefresh;
                $job->save();
            }else{
                $job = Region::find($request->fk_i_constantdet_id1);
                $job->name = $request->s_name_ar1;
                $job->area_id   = $request->ctrlToRefresh;
                $job->save();
            }
            if ($job) {
                return response()->json(['success'=>trans('admin.equpment_added')]);
            }
            return response()->json(['error'=>$validator->errors()->all()]);            
        }

        elseif($request->fk_i_constant_id1 == '42'){
            if($request->fk_i_constantdet_id1 == null){
                $job = new ArchiveType();
                $job->name = $request->s_name_ar1;
                $job->save();
            }else{
                $job = ArchiveType::find($request->fk_i_constantdet_id1);
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