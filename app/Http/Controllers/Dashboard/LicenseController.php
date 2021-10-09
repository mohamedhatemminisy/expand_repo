<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\LicenseExtention;
use App\Http\Controllers\Controller;
use App\Http\Requests\LicenseRequest;

class LicenseController extends Controller
{
    public function index(){
        $licenseExtention = LicenseExtention::get();
        $type="license_view";  
        return view('dashboard.license.licenseAdd',compact('type','licenseExtention'));    
    }

    public function store_license(Request $request){
        $licenseExtention = new LicenseExtention();
        $licenseExtention->peiceNo = $request->buldingLicNoList;
        $licenseExtention->peiceNoTabo = $request->taboNum;
        $licenseExtention->hodNo = $request->pelvisNum;
        $licenseExtention->licenseArea = $request->licensedSpace;
        $licenseExtention->floorNo = $request->floorCount;
        $licenseExtention->license_date = $request->licensedData;
        $licenseExtention->allArea = $request->LandArea;
        $licenseExtention->building_desc = $request->buldingDesc;
        $licenseExtention->licNo = $request->Lince_num;
        $licenseExtention->fileNo = $request->notebookNum;
        $licenseExtention->use_desc = $request->archive_type;
        $licenseExtention->notes = $request->Notes;
        // $licenseExtention->user_id = $request->;

        dd($request->all());
    }
}
