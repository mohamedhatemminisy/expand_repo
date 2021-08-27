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
use App\Models\ArchiveType;
use DB;
use App\Http\Requests\ArchiveRequest;

class ArchieveController extends Controller
{
    public function out_archieve(){
        $type= 'outArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
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
        if($request->hasFile('formDataaaUploadFile')){
            $files = $request->file('formDataaaUploadFile');
            foreach($files as $file){
                $new[] = url(upload_image($file, 'file_'));
                // array_push($files_obj, $new);
            }
            $files = json_encode($new);
        }else{
            $files = null;
        }

        $archive = new Archive();
        $archive->model_id =$request->customerid;
        $archive->type_id =$request->archive_type;
        $archive->name =$request->customername;
        $archive->fileIDS =$files;
        $archive->model_name =$request->customerType;
        $archive->date =$request->msgDate;
        $archive->title =$request->msgTitle;
        $archive->type =$request->msgType;
        $archive->serisal =$request->msgid;
        $archive->save();
        if($request->copyToText[0] != null){
            $copyTo = new CopyTo();
            for($i= 0 ; $i< count($request->copyToText) ; $i++){
                $copyTo->archive_id =  $archive->id;
                $copyTo->model_id =  $request->copyToID[$i];
                $copyTo->name =  $request->copyToCustomer[$i];    
                $copyTo->model_name =  $request->copyToType[$i];    
            }
            $copyTo->save();        
        }

        if ($archive) {
            return response()->json(['success'=>trans('admin.archive_added')]);
        }
            return response()->json(['error'=>$validator->errors()->all()]);
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

    public function in_archieve(){
        $type= 'inArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
    }
    public function mun_archieve(){
        $type= 'munArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
    }
    public function proj_archieve(){
        $type= 'projArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
    }
    public function emp_archieve(){
        $type= 'empArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
    }
    public function cit_archieve(){
        $type= 'citArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
    }
    public function dep_archieve(){
        $type= 'depArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
    }
    public function projArchive(){
        $type= 'projArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));    }
    public function munArchive(){
        $type= 'munArchive';
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type'));
    }
    
      public function archieve_info_all(Request $request)
    {
        $archive= Archive::select('archives.*')->orderBy('id', 'DESC');
        
        return DataTables::of($archive)
                        ->addIndexColumn()
                        ->make(true);

    }
}
