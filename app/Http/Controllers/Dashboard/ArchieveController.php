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
use App\Models\AttachmentType;
use App\Models\LicenseType;
use App\Models\ArchiveLicense;
use App\Models\CraftType;
use App\Models\jobLicArchieve;
use App\Models\LicenseRating;
use App\Models\LimitNumber;
use Illuminate\Support\Facades\DB as FacadesDB;

class ArchieveController extends Controller
{
    public function out_archieve(){
        $type= 'outArchive';
        $url = "out_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }

    public function archive_auto_complete(Request $request){
        $emp_data = $request['term'];
        // $equip = Equpment::where('name', 'like', '%' . $emp_data . '%')
        // ->select("CONCAT('name','equip') AS label")->get();
        $inArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','inArchive')
        ->select('*',DB::raw("CONCAT(name , '( أرشيف الوارد )' )AS label"))->get();
        $outArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','outArchive')
        ->select('*',DB::raw("CONCAT(name , '(  أرشيف الصادر  )' )AS label"))->get();
        $munArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','munArchive')
        ->select('*',DB::raw("CONCAT(name , '(  أرشيف عنوان الوثيقة  )' )AS label"))->get();
        $projArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','projArchive')
        ->select('*',DB::raw("CONCAT(name , '(  أرشيف المشاريع   )' )AS label"))->get();
        $empArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','empArchive')
        ->select('*',DB::raw("CONCAT(name , '(  أرشيف الموظفين   )' )AS label"))->get();
        $depArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','depArchive')
        ->select('*',DB::raw("CONCAT(name , '(  أرشيف الاقسام   )' )AS label"))->get();
        $citArchive =  Archive::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','citArchive')
        ->select('*',DB::raw("CONCAT(name , '(  أرشيف المواطنين   )' )AS label"))->get();

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
        ->merge($admin)->merge($department)->merge($inArchive)
        ->merge($outArchive)->merge($munArchive)->merge($projArchive)
        ->merge($empArchive)->merge($depArchive)->merge($citArchive)
        ->merge($orgnization)->merge($specialAsset)->merge($user);

        return response()->json($names);
    }

    public function Linence_auto_complete(Request $request){
        $emp_data = $request['term'];
      
        $licArchive= ArchiveLicense::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','licArchive')
        ->select('*',DB::raw("CONCAT(name , '( أرشيف رخص البناء)' )AS label"))->get();
        $licFileArchive= ArchiveLicense::where('name', 'like', '%' . $emp_data . '%')
        ->where('type','licFileArchive')
        ->select('*',DB::raw("CONCAT(name , '(أرشيف ملف الترخيص)' )AS label"))->get();
        $users = User::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(المشتركين)' )AS label"))->get();

        $names =$licArchive->merge($users)->merge($licFileArchive);

        return response()->json($names);
    
    }
    public function store_lince_archive(Request $request){
        $archive = ArchiveLicense::where('id',$request->customerid)
        ->where('model_name','App\Models\ArchiveLicense')
        ->where('type',$request->type)->first();
        if($archive){
            $archive->name =$request->customername;
            $archive->licn =$request->licn;
            $archive->licnfile =$request->licnfile;        
            $archive->licNo =$request->licNo;
            $archive->license_type =$request->BuildingData;
            $archive->license_id =$request->BuildingTypeData;
            $archive->attachment_id =$request->AttahType;
            $archive->save();  
        }else{
        $archive = new ArchiveLicense();
        $archive->url =  $request->url;
        $archive->add_by = Auth()->user()->id;
        $archive->name =$request->customername;
        $archive->model_id =$request->customerid;
        $archive->model_name =$request->customerType;
        $archive->licn =$request->licn;
        $archive->licnfile =$request->licnfile;        
        $archive->licNo =$request->licNo;
        $archive->license_type =$request->BuildingData;
        $archive->type =$request->type; 
        $archive->license_id =$request->BuildingTypeData;
        $archive->attachment_id =$request->AttahType;
        $archive->save();
        }
        if ($archive) {
            return response()->json(['success'=>trans('admin.archive_added')]);
        }
    }

    public function store_jobLic_archieve(Request $request){

        $archive = jobLicArchieve::where('id',$request->customerid)
        ->where('model_name','App\Models\jobLicArchieve')->first();
        if($archive){
            $archive->name =$request->customerName;
            $archive->region =$request->cityData;
            $archive->license_number =$request->licNo;        
            $archive->trade_name =$request->businessName;
            $archive->start_date =$request->startAt;
            $archive->expiry_ate =$request->endAt; 
            $archive->craft_type_id  =$request->licType;
            $archive->limit_number_id  =$request->LicBorder;
            $archive->attachment_id   =$request->AttahType;
            $archive->license_rating_id  =$request->lic_cat;
            $archive->save();  
        }else{
        
        $archive = new jobLicArchieve();
        $archive->url =  $request->url;
        $archive->added_by  = Auth()->user()->id;
        $archive->name =$request->customerName;
        $archive->model_id =$request->customerid;
        $archive->model_name =$request->customerType;
        $archive->region =$request->cityData;
        $archive->license_number =$request->licNo;        
        $archive->trade_name =$request->businessName;
        $archive->start_date =$request->startAt;
        $archive->expiry_ate =$request->endAt; 
        $archive->craft_type_id  =$request->licType;
        $archive->limit_number_id  =$request->LicBorder;
        $archive->attachment_id   =$request->AttahType;
        $archive->license_rating_id  =$request->lic_cat;
        $archive->save();
        }
        if ($archive) {
            return response()->json(['success'=>trans('admin.archive_added')]);
        }
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
        $archive->url =  $request->url;
        $archive->add_by = Auth()->user()->id;
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
        $url = "in_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }
    public function mun_archieve(){
        $type= 'munArchive';
        $url = "mun_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }
    public function proj_archieve(){
        $type= 'projArchive';
        $url = "proj_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }
    public function emp_archieve(){
        $type= 'empArchive';
        $url = "emp_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }
    public function cit_archieve(){
        $type= 'citArchive';
        $url = "cit_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }
    public function dep_archieve(){
        $type= 'depArchive';
        $url = "dep_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }
    public function projArchive(){
        $type= 'projArchive';
        $url = "proj_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));   
    }
    public function munArchive(){
        $type= 'munArchive';
        $url = "mun_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.outArchive',compact('type','archive_type','url'));
    }
    public function licArchive(){
        $type= 'licArchive';
        $url = "lic_archieve";
        $attachment_type = AttachmentType::get();
        $license_type = LicenseType::get();
        return view('dashboard.archive.licArchive',compact('type','attachment_type'
        ,'license_type','url'));
    }
    public function licFileArchive(){
        $type= 'licFileArchive';
        $attachment_type = AttachmentType::get();
        $license_type = LicenseType::get();
        $url = "licFile_archieve";
        return view('dashboard.archive.licArchive',compact('type','attachment_type',
        'license_type','url'));
    }
    public function jobLicArchive(){
        $type= 'jobLicArchive';
        $url = "jobLic_archieve";
        $craftType = CraftType::get();
        $limitNumber = LimitNumber::get();
        $licenseRating = LicenseRating::get();
        $attachment_type = AttachmentType::get();
        return view('dashboard.archive.jobLicArchive',compact('type','attachment_type'
       ,'url','craftType','limitNumber','licenseRating'));
    }
    public function reportArchive(){
        $type= 'reportArchive';
        $url = "report_archieve";
        $attachment_type = AttachmentType::get();
        return view('dashboard.archive.rptArchive',compact('type','attachment_type'
       ,'url'));
    }
    public function agendaArchive(){
        $type= 'agArchive';
        $url = "agenda_archieve";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.agenda',compact('type','archive_type','url'));
    }
    public function agendaReportArchive(){
        $type= 'agenda_report';
        $url = "agenda_report";
        $archive_type = ArchiveType::get();
        return view('dashboard.archive.agendaReport',compact('type','archive_type','url'));
    }

      public function archieve_info_all(Request $request)
    {
        $type=$request['type'];
        $archive= Archive::select('archives.*')->where('type',$type)->orderBy('id', 'DESC');
        
        return DataTables::of($archive)
                        ->addIndexColumn()
                        ->make(true);

    }
    public function archievelic_info_all(Request $request)
    {
        $type=$request['type'];
        $archive= ArchiveLicense::all()->where('type',$type);
        
        return DataTables::of($archive)
                        ->addIndexColumn()
                        ->make(true);

    }
    public function archieve_info(Request $request)
    {
        $archive['info'] = Archive::find($request['archive_id']);
        return response()->json($archive);
    }
    public function archieveLic_info(Request $request)
    {
        $archive['info']= ArchiveLicense::find($request['archive_id']);
        return response()->json($archive);
    }
    public function job_Lic_info(Request $request)
    {
        $archive['info']= jobLicArchieve::find($request['archive_id']);
        return response()->json($archive);
    }
    
}
