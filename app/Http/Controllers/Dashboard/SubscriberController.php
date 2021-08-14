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

class SubscriberController extends Controller
{
    public function index(){
        $city = City::get();
        $groups = Group::get();
        $jobTitle = JobTitle::get();
        return view('dashboard.subscriber.index',compact('city','groups','jobTitle'));    
    }

    public function store_subscriber (SubscribertRequest $request){
        $address = new Address();
        $address->area_id = $request->area_data;
        $address->city_id = $request->CityID;
        $address->region_id = $request->region_data;
        $address->details = $request->AddressDetails;
        $address->notes = $request->Note;
        $address->save();
        if($request->subscriber_id == null){
            $user = new User();
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
            $user->addresse_id   = $address->id;
            $user->save();
         }
         if ($user) {

            return response()->json(['success'=>trans('admin.subscriber_added')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function subscribe_auto_complete(Request $request){
        $subscriber_data = $request->get('subscriber');
        $names = User::where('name', 'like', '%' . $subscriber_data . '%')->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($html);
    }

    public function subscribe_info(Request $request)
    {
        $user['info'] = User::find($request['subscribe_id']);
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
    




}
