<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Group;
use App\Models\JobTitle;
use App\Models\Address;
use App\Models\User;
use App\Models\Area;
use App\Models\Region;
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\SubscribertRequest;
use Yajra\DataTables\DataTables;
use App\Models\Archive;
use App\Models\CopyTo;
use Yajra\DataTables\Services\DataTable;
class SubscriberController extends Controller
{
    public function index(){
        $city = City::get();
        $groups = Group::get();
        $jobTitle = JobTitle::get();
        $type="subscriber";
        return view('dashboard.subscriber.index',compact('city','groups','jobTitle','type'));    
    }

    public function store_subscriber (SubscribertRequest $request){

        if($request->subscriber_id == null){
            $address = new Address();
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $user = new User();
            $user->model = "App\Models\User";
            $user->name = $request->formDataNameAR;
            $user->phone_one = $request->formDataMobileNo1;
            $user->phone_two = $request->formDataMobileNo2;
            $user->national_id = $request->formDataNationalID;
            $user->cutomer_num = $request->formDataCutomerNo;
            $user->bussniess_name = $request->formDataBussniessName;
            $user->email  = $request->formDataEmailAddress;
            $user->username = $request->username;
            $user->password = $request->password ? bcrypt($request->password) : null;
            $user->group_id  = $request->formDataIndustryID;
            $user->job_title_id  = $request->formDataProfessionID;
            $user->addresse_id   = $address->id;
            $user->save();
         }else{
            $user = User::find($request->subscriber_id);
            $address = Address::where('id',$user->addresse_id)->first();
            $address->area_id = $request->area_data;
            $address->city_id = $request->CityID;
            $address->region_id = $request->region_data;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            $user->name = $request->formDataNameAR;
            $user->phone_one = $request->formDataMobileNo1;
            $user->phone_two = $request->formDataMobileNo2;
            $user->national_id = $request->formDataNationalID;
            $user->cutomer_num = $request->formDataCutomerNo;
            $user->bussniess_name = $request->formDataBussniessName;
            $user->email  = $request->formDataEmailAddress;
            $user->username = $request->username;
            if($request->password){
                $user->password = bcrypt($request->password);
            }else{
                $user->password = $user->password;
            }
            $user->group_id  = $request->formDataIndustryID;
            $user->job_title_id  = $request->formDataProfessionID;
            $user->save();
         }
         if ($user) {

            return response()->json(['success'=>trans('admin.subscriber_added')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function subscribe_auto_complete(Request $request){
        $subscriber_data = $request['term'];
        $names = User::where('name', 'like', '%' . $subscriber_data . '%')->select('*', 'name as label')->get();
        //$html = view('dashboard.component.auto_complete', compact('names'))->render();
        //dd($names);
        return response()->json($names);
    }

    public function subscribe_info(Request $request)
    {
        $user['info'] = User::find($request['subscribe_id']);
        $model = $user['info']->model;
        $ArchiveCount = count(Archive::where('model_id',$request['subscribe_id'])
        ->where('model_name',$model)->get());
        $Archive =Archive::where('model_id',$request['subscribe_id'])
        ->where('model_name',$model)->with('copyTo')->get();
        $user['Archive'] = $Archive;
        $CopyTo = CopyTo::where('model_id',$request['subscribe_id'])
        ->where('model_name',$model)->with('archive')->get();
        $user['copyTo'] = $CopyTo;
        $CopyToCount = count(CopyTo::where('model_id',$request['subscribe_id'])
        ->where('model_name',$model)->get());
        $user['ArchiveCount'] = $ArchiveCount + $CopyToCount;
        $user['job_title'] = JobTitle::where('id',$user['info']->job_title_id)->first()->name;
        $user['group'] = Group::where('id',$user['info']->group_id)->first()->name;
        $user['address'] = Address::where('id', $user['info']['addresse_id'])->first();

        if($user['address']->city_id){
            $user['city'] =City::where('id',$user['address']->city_id)->first()->name;
        }
        if($user['address']->area_id){
            $user['area'] =Area::where('id',$user['address']->area_id)->first()->name;
        }
        if($user['address']->region_id){
            $user['region'] =Region::where('id',$user['address']->region_id)->first()->name;
        }
        return response()->json($user);

    }
    public function subscribe_info_all()
    {
        $users= User::select('users.*','addresses.notes','addresses.region_id','addresses.area_id',
        'addresses.city_id','addresses.details','regions.name as region_name','cities.name as city_name',
        'areas.name as area_name','job_titles.name as job_title_name','groups.name as group_name')
        ->leftJoin('job_titles','job_titles.id','users.job_title_id')
        ->leftJoin('groups','groups.id','users.group_id')
        ->leftJoin('addresses','addresses.id','users.addresse_id')
        ->leftJoin('regions','addresses.region_id','regions.id')
        ->leftJoin('cities','addresses.city_id','cities.id')
        ->leftJoin('areas','addresses.area_id','areas.id')->orderBy('users.id', 'DESC');
        return DataTables::of($users)
                            ->addIndexColumn()
                            ->make(true);
    }
    




}
