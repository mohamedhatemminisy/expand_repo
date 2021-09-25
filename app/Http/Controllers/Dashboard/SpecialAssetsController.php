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
use Yajra\DataTables\DataTables;
use App\Models\Archive;
use App\Models\CopyTo;

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
                $path = upload_image($request->file('imgPic'), 'special_asset_');
            }else{
                $path = '';
            }
            $specialAsset->model = "App\Models\SpecialAsset";
            $specialAsset->name = $request->BName;
            $specialAsset->price = $request->OrgSalary;
            $specialAsset->notes = $request->NoteAR;
            $specialAsset->currency = $request->OrgCurrencyID;
            $specialAsset->admin_id  = $request->pich;
            $specialAsset->asset_statuses_id = $request->ownType;
            $specialAsset->addresse_id  = $address->id;
            $specialAsset->type = $request->type;
            $specialAsset->add_by = Auth()->user()->id;
            $specialAsset->url =  $request->type;
            $specialAsset->image  = url($path);
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
                $path = upload_image($request->file('imgPic'), 'special_asset_');
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
            $specialAsset->image  = url($path);
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
        $model = $special['info']->model;
        $ArchiveCount = count(Archive::where('model_id',$request['asset_id'])
        ->where('model_name',$model)->get());
        $CopyToCount = count(CopyTo::where('model_id',$request['asset_id'])
        ->where('model_name',$model)->get());
        $Archive =Archive::where('model_id',$request['asset_id'])
        ->where('model_name',$model)->with('files')->get();
        $special['Archive'] = $Archive;
        $special['ArchiveCount'] = $ArchiveCount + $CopyToCount;

        $CopyTo = CopyTo::where('model_id',$request['asset_id'])
        ->where('model_name',$model)->with('archive','archive.files')->get();
        $special['copyTo'] = $CopyTo;

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
        $type=$request['type'];
        $special = SpecialAsset::select('special_assets.*','addresses.notes as address_note','addresses.region_id','addresses.area_id',
        'addresses.city_id','addresses.details','regions.name as region_name','cities.name as city_name',
        'areas.name as area_name','admins.name as manager_name')
        ->leftJoin('admins','admins.id','special_assets.admin_id')
        ->leftJoin('addresses','addresses.id','special_assets.addresse_id')
        ->leftJoin('regions','addresses.region_id','regions.id')
        ->leftJoin('cities','addresses.city_id','cities.id')
        ->leftJoin('areas','addresses.area_id','areas.id')->where('type',$type)->orderBy('id', 'DESC');
        return DataTables::of($special)
                ->addIndexColumn()
                ->make(true);

    }
    function upload_image($file, $prefix){
        if($file){
            $files = $file;
            $imageName = $prefix.rand(3,999).'-'.time().'.'.$files->extension();
            $image = "storage/".$imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }  

}
