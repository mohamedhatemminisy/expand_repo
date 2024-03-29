<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equpment;
use App\Models\Admin;
use App\Models\Archive;
use App\Models\Department;
use App\Models\Orgnization;
use App\Models\Project;
use App\Models\SpecialAsset;
use App\Models\ArchiveLicense;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\CopyTo;
use App\Models\ArchiveType;
use App\Models\jobLicArchieve;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    
    public function full_search(Request $request){
        $emp_data = $request['term'];
        $equip = Equpment::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(اجهزه و معدات)' )AS label"))->get();
        $vehicle = Vehicle::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(المركبات)' )AS label"))->get();
        $project = Project::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(المشاريع)' )AS label"))->get();
        $admin = Admin::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(الموظفين)' )AS label"))->get();
        $department = Department::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(الاقسام)' )AS label"))->get();
        $orgnization = Orgnization::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(الموسسات)' )AS label"))->get();
        $specialAsset = SpecialAsset::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(المباني و المستودعات و الاراضي)' )AS label"))->get();
        $user = User::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name  )AS label"))->get();
        $archive =  Archive::where('title', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(title , '(الارشيف)' )AS label"))->get();
        $archiveLicense =  ArchiveLicense::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(رخص البناء ,التراخيص)' )AS label"))->get();
        $jobLicArchieve =  jobLicArchieve::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(رخص الحرف و الصناعات)' )AS label"))->get();
        
        $names = $equip->merge($vehicle)->merge($project)
        ->merge($admin)->merge($department)->merge($archive)
        ->merge($orgnization)->merge($specialAsset)
        ->merge($archiveLicense)->merge($user)->merge($jobLicArchieve);

        return response()->json($names);
    }
}
