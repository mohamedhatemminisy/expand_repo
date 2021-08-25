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
use App\Models\CopyTo;
use DB;
use App\Http\Requests\ArchiveRequest;

class ArchieveController extends Controller
{
    public function out_archieve(){
        $type= 'outArchive';
        return view('dashboard.archive.outArchive',compact('type'));
    }

    public function archive_auto_complete(Request $request){
        $emp_data = $request['term'];
        // $equip = Equpment::where('name', 'like', '%' . $emp_data . '%')
        // ->select("CONCAT('name','equip') AS label")->get();
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
        ->select('*',DB::raw("CONCAT(name , '(المشتركين)' )AS label"))->get();
        $names = $equip->merge($vehicle)->merge($project)
        ->merge($admin)->merge($department)
        ->merge($orgnization)->merge($specialAsset)->merge($user);

        return response()->json($names);
    }

    public function store_archive(ArchiveRequest $request){
        $archive = new Archive();
        $archive->model_id =$request->customerid;
        $archive->name =$request->customerName;
        $archive->model_name =$request->customerType;
        $archive->date =$request->msgDate;
        $archive->title =$request->msgTitle;
        $archive->type =$request->msgType;
        $archive->serisal =$request->msgid;
        $archive->save();

        $copyTo = new CopyTo();
        for($i= 0 ; $i< count($request->copyToText) ; $i++){
            $copyTo->archive_id =  $archive->id;
            $copyTo->model_id =  $request->copyToID[$i];
            $copyTo->name =  $request->copyToText[$i];    
            $copyTo->model_name =  $request->copyToType[$i];    
        }
        $copyTo->save();        

        if ($archive) {
            return response()->json(['success'=>trans('admin.archive_added')]);
        }
            return response()->json(['error'=>$validator->errors()->all()]);
    }
    
    public function in_archieve(){
        $type= 'inArchive';
        
        return view('dashboard.archive.outArchive',compact('type'));
    }
}
