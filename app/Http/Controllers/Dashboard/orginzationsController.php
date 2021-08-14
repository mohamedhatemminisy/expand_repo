<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Address;
use App\Models\JobTitle;
use App\Models\Area;
use App\Models\Region;
use App\Models\Orgnization;
use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\OrgnizationRequest;

class orginzationsController extends Controller
{
    public function index(){
        $city = City::get();
        $jobTitle = JobTitle::get();
        $type = 'orginzation';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type'));    
    }

    public function enginering(){
        $city = City::get();
        $jobTitle = JobTitle::get();
        $type = 'enginering';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type'));  
    }

    public function space(){
        $city = City::get();
        $jobTitle = JobTitle::get();
        $type = 'space';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type'));  
    }
    public function banks(){
        $city = City::get();
        $jobTitle = JobTitle::get();
        $type = 'banks';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type'));  
    }

    public function suppliers(){
        $city = City::get();
        $jobTitle = JobTitle::get();
        $type = 'suppliers';
        return view('dashboard.orginzation.index',compact('city','jobTitle','type'));  
    }
    public function store_orginzation (OrgnizationRequest $request){
        $address = new Address();
        $address->area_id = $request->area_data;
        $address->city_id = $request->CityID;
        $address->region_id = $request->region_data;
        $address->details = $request->AddressDetails;
        $address->notes = $request->Note;
        $address->save();
        if($request->orgnization_id == null){
            $orgnization = new Orgnization();
            $orgnization->name = $request->SponsorName;
            $orgnization->phone_one = $request->MobileNo1;
            $orgnization->phone_two = $request->MobileNo2;
            $orgnization->zepe_code = $request->LisenceNo;
            $orgnization->manager_name = $request->personInCharge;
            $orgnization->job_title_id  = $request->PositionID;
            $orgnization->fax  = $request->faxNo;
            $orgnization->email = $request->EmailAddress;
            $orgnization->whatsapp_one = $request->phone1;
            $orgnization->whatsapp_two  = $request->phone2;
            $orgnization->website  = $request->website;
            $orgnization->org_type  = $request->type;
            $orgnization->addresse_id   = $address->id;
            $orgnization->save();
         }else{
            $orgnization = Orgnization::where('org_type',$request->type)->
            where('id',$request->orgnization_id)->first();
            $orgnization->name = $request->SponsorName;
            $orgnization->phone_one = $request->MobileNo1;
            $orgnization->phone_two = $request->MobileNo2;
            $orgnization->zepe_code = $request->LisenceNo;
            $orgnization->manager_name = $request->personInCharge;
            $orgnization->job_title_id  = $request->PositionID;
            $orgnization->fax  = $request->faxNo;
            $orgnization->email = $request->EmailAddress;
            $orgnization->whatsapp_one = $request->phone1;
            $orgnization->whatsapp_two  = $request->phone2;
            $orgnization->website  = $request->website;
            $orgnization->org_type  = $request->type;
            $orgnization->addresse_id   = $address->id;
            $orgnization->save();
         }
         if ($orgnization) {

            return response()->json(['success'=>trans('admin.orgnization_added')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function orginzation_auto_complete(Request $request){
        $orginzation_data = $request->get('orginzation');
        $type = $request->get('type');

        $names = Orgnization::where('name', 'like', '%' . $orginzation_data . '%')->where('org_type',$type)->get();
        $html = view('dashboard.component.auto_complete', compact('names'))->render();
        return response()->json($html);
    }

    public function orgnization_info(Request $request)
    {
        $orginzation['info'] = Orgnization::find($request['orginzation_id']);
        $orginzation['job_title'] = JobTitle::where('id',$orginzation['info']->job_title_id)->first()->name;
        $orginzation['address'] = Address::where('id', $orginzation['info']['addresse_id'])->first();

        if($orginzation['address']->city_id){
            $orginzation['city'] =City::where('id',$orginzation['address']->city_id)->first()->name;
        }
        if($orginzation['address']->area_id){
            $orginzation['area'] =Area::where('id',$orginzation['address']->area_id)->first()->name;
        }
        if($orginzation['address']->region_id){
            $orginzation['region'] =Region::where('id',$orginzation['address']->region_id)->first()->name;
        }
        return response()->json($orginzation);

    }
    




}
