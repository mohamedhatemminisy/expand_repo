<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\City;
use App\Models\Area;
use App\Models\Region;
use App\Models\Address;
use App\Models\SettingTranslation;
use Illuminate\Http\Request;
use DB;
use App\Models\Archive;
use App\Models\CopyTo;

class SettingsController extends Controller
{
    public function updateOrganization()
    {
        $setting = Setting::first();
        $address = Address::where('id',$setting->address_id)->first();
        $city = City::get();

        

        return view('dashboard.setting.index',compact('setting','city','address')); 
    }

    public function state(Request $request){
        $areas = Area::where('city_id',$request['val'])->get();
        $arr = [];
        foreach($areas as $area){
            $arr['id'] = $area->id;
            $arr['name'] = $area->name;
            $data[] = $arr;
        }
        return response()->json($data);
    }

    public function area(Request $request){
        $regions = Region::where('area_id',$request['val'])->get();
        $arr = [];
        foreach($regions as $region){
            $arr['id'] = $region->id;
            $arr['name'] = $region->name;
            $data[] = $arr;
        }
        return response()->json($data);
    }

    public function store_settings(Request $request){
        $address = new Address();
        $address->area_id = $request->area_data;
        $address->city_id = $request->CityID;
        $address->region_id = $request->region_data;
        $address->details = $request->AddressDetails;
        $address->notes = $request->Note;
        $address->save();
        $setting = Setting::first();
        if($setting){
            if ($request->file('logo')) {
                $path = upload_image($request->file('logo'), 'emp_');
            }else{
                $path = '';
            }
            $setting->logo = url($path);
            $setting->phone_one = $request->phone_one;
            $setting->phone_two = $request->phone_two;
            $setting->email = $request->email;
            $setting->fax = $request->fax;
            $setting->website = $request->website;
            $setting->storage_path = $request->storage_path;
            $setting->max_upload = $request->max_upload;
            $setting->WorkinghoursFrom = $request->WorkinghoursFrom;
            $setting->WorkinghoursTo = $request->WorkinghoursTo;
            $setting->Holidays = $request->Holidays;
            $setting->from1 = $request->from1;
            $setting->to1 = $request->to1;
            $setting->from2 = $request->from2;
            $setting->to2 = $request->to2;        
            $setting->from3 = $request->from3;
            $setting->to3 = $request->to3;        
            $setting->from4 = $request->from4;
            $setting->to4 = $request->to4;        
            $setting->from5 = $request->from5;
            $setting->to5 = $request->to5;       
            $setting->from6 = $request->from6;
            $setting->to6 = $request->to6;
            $setting->from7 = $request->from7;
            $setting->to7 = $request->to7;
            $setting->address_id  = $address->id;
            $setting->name_en = $request->name_en;
            $setting->name_ar  = $request->name_ar;
            $setting->save();

        }else{
            $setting =new Setting();
            if ($request->file('logo')) {
                $path = upload_image($request->file('logo'), 'emp_');
            }else{
                $path = public_path('assets/images/ico/user.png');
            }
            $setting->logo = url($path);
            $setting->phone_one = $request->phone_one;
            $setting->phone_two = $request->phone_two;
            $setting->email = $request->email;
            $setting->fax = $request->fax;
            $setting->website = $request->website;
            $setting->storage_path = $request->storage_path;
            $setting->max_upload = $request->max_upload;
            $setting->WorkinghoursFrom = $request->WorkinghoursFrom;
            $setting->WorkinghoursTo = $request->WorkinghoursTo;
            $setting->Holidays = $request->Holidays;
            $setting->from1 = $request->from1;
            $setting->to1 = $request->to1;
            $setting->from2 = $request->from2;
            $setting->to2 = $request->to2;        
            $setting->from3 = $request->from3;
            $setting->to3 = $request->to3;        
            $setting->from4 = $request->from4;
            $setting->to4 = $request->to4;        
            $setting->from5 = $request->from5;
            $setting->to5 = $request->to5;       
            $setting->from6 = $request->from6;
            $setting->to6 = $request->to6;
            $setting->from7 = $request->from7;
            $setting->to7 = $request->to7;
            $setting->address_id  = $address->id;
            $setting->name_ar = $request->name_ar;
            $setting->name_en = $request->name_en;
            $setting->save();

        }
        return response()->json($setting);
    }
    
    public function Organization_info(Request $request)
    {

        $ArchiveCount = count(Archive::where('type','munArchive')->get());
        $Archive =Archive::where('type','munArchive')->get();
        $Archivelist['Archive'] = $Archive;
        $Archivelist['ArchiveCount'] = $ArchiveCount;
        return response()->json($Archivelist);
    }

}
