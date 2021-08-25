<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Equpment;
use App\Models\Admin;
use App\Models\Archive;
use App\Models\Department;
use App\Models\Orgnization;
use App\Models\Project;
use App\Models\SpecialAsset;
use App\Models\User;
use App\Models\Vehicle;

class ArchieveController extends Controller
{
    public function out_archieve(){
        $type= 'outArchive';
        return view('dashboard.archive.outArchive',compact('type'));
    }

    public function archive_auto_complete(Request $request){
        $emp_data = $request['term'];
        $equip = Equpment::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        $vehicle = Vehicle::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        $project = Project::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        $admin = Admin::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        $department = Department::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        $orgnization = Orgnization::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        $specialAsset = SpecialAsset::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        $user = User::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        
        $names = $equip->merge($vehicle)->merge($project)
        ->merge($admin)->merge($department)
        ->merge($orgnization)->merge($specialAsset)->merge($user);

        return response()->json($names);
    }
    public function in_archieve(){
        $type= 'inArchive';
        
        return view('dashboard.archive.outArchive',compact('type'));
    }
}
