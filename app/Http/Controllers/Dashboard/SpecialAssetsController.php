<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;
use App\Models\Region;
use App\Models\Admin;
use App\Models\AssetStatus;
use App\Models\SpecialAsset;
use App\Models\Address;
use App\Http\Requests\AssetRequest;

class SpecialAssetsController extends Controller
{
    public function buildings(){
        $city = City::get();
        $assetStatus = AssetStatus::get();
        $type = 'buildings';
        $assetStatus = AssetStatus::get();
        $admins = Admin::get();
        return view('dashboard.specialAssets.index',compact('type','city','assetStatus','admins'));
    }
    public function Gardens_lands(){
        $city = City::get();
        $type = 'Gardens_lands';
        $assetStatus = AssetStatus::get();
        $assetStatus = AssetStatus::get();
        $admins = Admin::get();
        return view('dashboard.specialAssets.index',compact('type','city','assetStatus','admins'));
    }
    public function warehouses(){
        $city = City::get();
        $type = 'warehouses';
        $assetStatus = AssetStatus::get();
        $admins = Admin::get();
        return view('dashboard.specialAssets.index',compact('type','city','assetStatus','admins'));
    }

    public function store_assets(AssetRequest $request){
        if($request->special_id == null){
            $specialAsset = new SpecialAsset();
            $address = new Address();
            $address->area_id = $request->TownID;
            $address->city_id = $request->CityID;
            $address->region_id = $request->AreaID;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = '';
            }
            $specialAsset->name = $request->BName;
            $specialAsset->price = $request->OrgSalary;
            $specialAsset->notes = $request->NoteAR;
            $specialAsset->currency = $request->OrgCurrencyID;
            $specialAsset->admin_id  = $request->pich;
            $specialAsset->asset_statuses_id = $request->ownType;
            $specialAsset->addresse_id  = $address->id;
            $specialAsset->type = $request->type;
            $specialAsset->image  = $path;
            $specialAsset->save();
         }else{
            $specialAsset = SpecialAsset::find($request->special_id);
            $address = Address::where('id',$specialAsset->addresse_id)->first();
            $address->area_id = $request->TownID;
            $address->city_id = $request->CityID;
            $address->region_id = $request->AreaID;
            $address->details = $request->AddressDetails;
            $address->notes = $request->Note;
            $address->save();
            if ($request->file('imgPic')) {
                $imagePath = $request->file('imgPic');
                $imageName = $imagePath->getClientOriginalName();
                $path = $request->file('imgPic')->storeAs('uploads', $imageName, 'public');
            }else{
                $path = $specialAsset->image;
            }
            $specialAsset->name = $request->BName;
            $specialAsset->price = $request->OrgSalary;
            $specialAsset->notes = $request->NoteAR;
            $specialAsset->currency = $request->OrgCurrencyID;
            $specialAsset->admin_id  = $request->pich;
            $specialAsset->asset_statuses_id = $request->ownType;
            $specialAsset->addresse_id  = $address->id;
            $specialAsset->type = $request->type;
            $specialAsset->image  = $path;
            $specialAsset->save();
         }
         if ($specialAsset) {
            return response()->json(['success'=>trans('admin.equpment_added')]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function asset_auto_complete(Request $request)
    {
        $asset_data = $request['request']['term'];
        $type = $request['type'];
        $names = SpecialAsset::where('name', 'like', '%' . $asset_data . '%')->where('type',$type)->select('*','name as label')->get();
        return response()->json($names);
    } 
    public function asset_info(Request $request)
    {
        $special['info'] = SpecialAsset::find($request['asset_id']);
        $special['admin'] = Admin::where('id',$special['info']->admin_id)->first()->name;

        $special['asset_status'] = AssetStatus::where('id',$special['info']->asset_statuses_id )->first()->name;
        $special['address'] = Address::where('id', $special['info']['addresse_id'])->first();
       

        if($special['address']->city_id){
            $special['city'] =City::where('id',$special['address']->city_id)->first()->name;
        }
        if($special['address']->area_id){
            $special['area'] =Area::where('id',$special['address']->area_id)->first()->name;
        }
        if($special['address']->region_id){
            $special['region'] =Region::where('id',$special['address']->region_id)->first()->name;
        }
        $special['Currency'] = trans('admin.'.$special['info']->currency);


        return response()->json($special);

    }

    public function asset_info_all(Request $request)
    {
        $special['info'] = SpecialAsset::all();
        
        return response()->json($special);

    }
    
    


}
