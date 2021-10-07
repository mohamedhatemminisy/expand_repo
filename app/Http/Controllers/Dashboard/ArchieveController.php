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
use App\Models\Setting;
use App\Models\Region;
use App\Models\Project;
use App\Models\SpecialAsset;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\CopyTo;
use App\Models\ArchiveType;
use App\Models\AgendaExtention;
use App\Models\File;
use Session;
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
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));

    }

    public function archive_auto_complete(Request $request){
        $emp_data = $request['term'];
        // $equip = Equpment::where('name', 'like', '%' . $emp_data . '%')
        // ->select("CONCAT('name','equip') AS label")->get();
        // $inArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','inArchive')
        // ->select('*',DB::raw("CONCAT(name , '( أرشيف الوارد )' )AS label"))->get();
        // $outArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','outArchive')
        // ->select('*',DB::raw("CONCAT(name , '(  أرشيف الصادر  )' )AS label"))->get();
        // $munArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','munArchive')
        // ->select('*',DB::raw("CONCAT(name , '(  أرشيف عنوان الوثيقة  )' )AS label"))->get();
        // $projArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','projArchive')
        // ->select('*',DB::raw("CONCAT(name , '(  أرشيف المشاريع   )' )AS label"))->get();
        // $empArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','empArchive')
        // ->select('*',DB::raw("CONCAT(name , '(  أرشيف الموظفين   )' )AS label"))->get();
        // $depArchive = Archive::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','depArchive')
        // ->select('*',DB::raw("CONCAT(name , '(  أرشيف الاقسام   )' )AS label"))->get();
        // $citArchive =  Archive::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','citArchive')
        // ->select('*',DB::raw("CONCAT(name , '(  أرشيف المواطنين   )' )AS label"))->get();

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
        // ->merge($inArchive)
        // ->merge($outArchive)->merge($munArchive)->merge($projArchive)
        // ->merge($empArchive)->merge($depArchive)->merge($citArchive)
        ->merge($orgnization)->merge($specialAsset)->merge($user);

        return response()->json($names);
    }

    public function Linence_auto_complete(Request $request){
        $emp_data = $request['term'];

        // $licArchive= ArchiveLicense::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','licArchive')
        // ->select('*',DB::raw("CONCAT(name , '( أرشيف رخص البناء)' )AS label"))->get();
        // $licFileArchive= ArchiveLicense::where('name', 'like', '%' . $emp_data . '%')
        // ->where('type','licFileArchive')
        // ->select('*',DB::raw("CONCAT(name , '(أرشيف ملف الترخيص)' )AS label"))->get();
        $users = User::where('name', 'like', '%' . $emp_data . '%')
        ->select('*',DB::raw("CONCAT(name , '(المشتركين)' )AS label"))->get();

        // $names =$licArchive->merge($users)->merge($licFileArchive);

        return response()->json($users);

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
        $files_ids = $request->formDataaaorgIdList;
        foreach($files_ids as $id){
            $file = File::find($id);
            $file->archive_id = $archive->id;
            $file->model_name = "App\Models\ArchiveLicense";
            $file->save();
        }

        }
        if ($archive) {
            return response()->json(['success'=>trans('admin.archive_added')]);
        }
    }

    public function store_jobLic_archieve(Request $request){

        $archive = jobLicArchieve::where('id',$request->archieveid)
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
        $files_ids = $request->formDataaaorgIdList;
            if($files_ids){
                foreach($files_ids as $id){
                    $file = File::find($id);
                    $file->archive_id = $archive->id;
                    $file->model_name = "App\Models\jobLicArchieve";
                    $file->save();
                }
            }

        }
        if ($archive) {
            return response()->json(['success'=>trans('admin.archive_added')]);
        }
    }
    public function store_archive(ArchiveRequest $request){
        // $archive = Archive::where('id',$request->customerid)->first();
        // if($archive){
        //     $archive->model_id =$request->customerid;
        //     $archive->type_id =$request->archive_type   ;
        //     $archive->name =$request->customername;
        //     $archive->model_name =$request->customerType;
        //     $archive->date =$request->msgDate;
        //     $archive->title =$request->msgTitle;
        //     $archive->type =$request->msgType;
        //     $archive->serisal =$request->msgid;
        //     $archive->url =  $request->url;
        //     $archive->add_by = Auth()->user()->id;
        //     $archive->save();
        // }else{
        $archive = new Archive();
        $archive->model_id =$request->customerid;
        $archive->type_id =$request->archive_type   ;
        $archive->name =$request->customername;
        $archive->model_name =$request->customerType;
        $archive->date =$request->msgDate;
        $archive->title =$request->msgTitle;
        $archive->type =$request->msgType;
        $archive->serisal =$request->msgid;
        $archive->url =  $request->url;
        $archive->add_by = Auth()->user()->id;
        $archive->save();

        $files_ids = $request->formDataaaorgIdList;
        if($files_ids ){
        foreach($files_ids as $id){
            $file = File::find($id);
            $file->archive_id = $archive->id;
            $file->model_name = "App\Models\Archive";
            $file->save();
        }
        }
        if($request->copyToText[0] != null){
            for($i= 0 ; $i< count($request->copyToText) ; $i++){
                $copyTo = new CopyTo();
                $copyTo->archive_id =  $archive->id;
                $copyTo->model_id =  $request->copyToID[$i];
                $copyTo->name =  $request->copyToCustomer[$i];
                $copyTo->model_name =  $request->copyToType[$i];
                $copyTo->save();
            }
        }
    // }
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
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));

    }
    public function mun_archieve(){
        $type= 'munArchive';
        $url = "mun_archieve";
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));
    }
    public function proj_archieve(){
        $type= 'projArchive';
        $url = "proj_archieve";
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));
    }
    public function volunteerReport(){
        $type= 'volunteerReport';
        $url = "volunteer_report";
        $attachment_type = AttachmentType::get();
        $license_type = LicenseType::where('type','drive_lic')->get();
        return view('dashboard.archive.volunteerReport',compact('type','attachment_type'
       ,'license_type','url'));
    }
    public function assets_archieve(){
        $type= 'assetsArchive';
        $url = "assets_archieve";
        $archive_type = ArchiveType::get();

        return view('dashboard.archive.assetsArchive',compact('type','archive_type','url'));
    }
    public function emp_archieve(){
        $type= 'empArchive';
        $url = "emp_archieve";
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));
    }
    public function cit_archieve(){
        $type= 'citArchive';
        $url = "cit_archieve";
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));
    }
    public function dep_archieve(){
        $type= 'depArchive';
        $url = "dep_archieve";
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));
    }
    public function projArchive(){
        $type= 'projArchive';
        $url = "proj_archieve";
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));
    }
    public function munArchive(){
        $type= 'munArchive';
        $url = "mun_archieve";
        $archive_type = ArchiveType::where('type','munArchive')->get();
        $projArchive = ArchiveType::where('type','projArchive')->get();
        $empArchive = ArchiveType::where('type','empArchive')->get();
        $citArchive = ArchiveType::where('type','citArchive')->get();
        $depArchive = ArchiveType::where('type','depArchive')->get();
        return view('dashboard.archive.outArchive',compact('depArchive','citArchive','type','archive_type','url','projArchive','empArchive'));
    }
    public function licArchive(){
        $type= 'licArchive';
        $url = "lic_archieve";
        $attachment_type = AttachmentType::get();
        $license_type = LicenseType::where('type','archive_lic')->get();
        return view('dashboard.archive.licArchive',compact('type','attachment_type'
        ,'license_type','url'));
    }
    public function licFileArchive(){
        $type= 'licFileArchive';
        $attachment_type = AttachmentType::get();
        $license_type = LicenseType::where('type','archive_lic')->get();
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
        $setting = Setting::first();
        $regions = Region::where('area_id',$setting->address->area->id)->get();
        return view('dashboard.archive.jobLicArchive',compact('type','attachment_type'
       ,'url','craftType','limitNumber','licenseRating','regions'));
    }
    public function reportArchive(){
        $type= 'reportArchive';
        $url = "report_archieve";
        $attachment_type = AttachmentType::get();
        $license_type = LicenseType::where('type','archive_lic')->get();
        return view('dashboard.archive.rptArchive',compact('type','attachment_type'
       ,'license_type','url'));
    }
    public function agendaArchive(){
        $agendaExtention = AgendaExtention::get();
        $type= 'agArchive';
        $url = "agenda_archieve";
        $archive_type = AgendaExtention::get();

        return view('dashboard.archive.jalArchive',compact('type','archive_type','url','agendaExtention'));
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

        $archive= Archive::select('archives.*')->where('type',$type)->orderBy('id', 'DESC')->with('copyTo')->with('files')->get();
        return DataTables::of($archive)
                        ->addIndexColumn()
                        ->addColumn('copyTo', function($archive) {
                            if($archive->copyTo){
                                $actionBtn=" ";
                                foreach ($archive->copyTo as $copyTo){
                                    $actionBtn .=' '.$copyTo->name.' ';
                                }

                                return $actionBtn;
                            }
                            else
                              { return '';}

                        })
                        ->make(true);

    }
    public function jalArchieve_info_all(Request $request)
    {
        $archive= Archive::select('archives.*')->where('type','agArchive')->orderBy('id', 'DESC')->with('relatedTo')->with('files')->get();

        return DataTables::of($archive)
                        ->addIndexColumn()
                        ->addColumn('relatedTo', function($archive) {
                            if($archive->relatedTo){
                                $actionBtn=" ";
                                foreach ($archive->relatedTo as $related_to){
                                    $actionBtn .=' '.$related_to->name.' ';
                                }

                                return $actionBtn;
                            }
                            else
                               { return '';}

                        })
                        ->make(true);

    }
    public function archievelic_info_all(Request $request)
    {
        $type=$request['type'];
        $archive= ArchiveLicense::select('archive_licenses.*')->where('type',$type)
        ->orderBy('id', 'DESC')
        ->with('files')->get();

        return DataTables::of($archive)
                        ->addIndexColumn()
                        ->make(true);

    }
    public function archieveJoblic_info_all(Request $request)
    {
        $archive= jobLicArchieve::select('job_lic_archieves.*','craft_types.name as craft_name','license_ratings.name as license_ratings_name')
        ->leftJoin('craft_types','craft_types.id','job_lic_archieves.craft_type_id')
        ->leftJoin('license_ratings','license_ratings.id','job_lic_archieves.license_rating_id')
        ->orderBy('id', 'DESC')
        ->with('files')->get();
        return DataTables::of($archive)
                        ->addIndexColumn()
                        ->addColumn('status', function($archive) {
                            $from = explode('/', ($archive->start_date));
                            $from = $from[2].'-'.$from[1].'-'.$from[0];
                            $to = explode('/', ($archive->expiry_ate));
                            $to = $to[2].'-'.$to[1].'-'.$to[0];
                            if ($from < $to) {
                                return 'فعالة';
                            }

                            return 'منتهية';
                        })
                        ->make(true);

    }

    public function archieve_info(Request $request)
    {
        $archive['info'] = Archive::find($request['archive_id']);
        $archive['files'] = File::where('archive_id','=',$request['archive_id'])->get();
        return response()->json($archive);
    }
    public function archieve_report(Request $request)
    {
        if($request->get('arcType')=="licArchive"||$request->get('arcType')=="licFileArchive")
        {   $archive['type']="lic";
            $archive['result'] =  ArchiveLicense::query();
            if($request->get('name')){
                $archive['result']->where('name','=',$request->get('name'));
            }
            if($request->get('arcType')){
                $archive['result']->where('type','=',$request->get('arcType'));
            }
            if($request->get('BuildingData')){
                if($request->get('BuildingData')=="-1")
                {}
                else{
                $archive['result']->where('license_type','=',$request->get('BuildingData'));
                }
            }
            if($request->get('BuildingTypeData')){
                if($request->get('BuildingTypeData')=="-1")
                {}
                else{
                $archive['result']->where('license_id','=',$request->get('BuildingTypeData'));
                }
            }
            if($request->get('archNo')){
                $archive['result']->where('licNo','=',$request->get('archNo'));
            }
            if($request->get('start')&&$request->get('end')){
                $from = date_create(($request->get('start')));
                $from = explode('/', ($request->get('start')));
                $from = $from[2].'-'.$from[1].'-'.$from[0];
                $to = date_create(($request->get('end')));
                $to = explode('/', ($request->get('end')));
                $to = $to[2].'-'.$to[1].'-'.$to[0];
                $archive['result']->whereRaw('CAST(archive_licenses.created_at AS DATE) between ? and ?',[$from,$to]);
            }
            $archive['result']= $archive['result']->select('archive_licenses.*','license_types.name as licName')
                        ->selectRaw('DATE_FORMAT(archive_licenses.created_at, "%Y-%m-%d") as date')
                        ->leftJoin('license_types','license_types.id','archive_licenses.license_id')
                        ->with('files')
                        ->get();

        }
        else
        {
            $archive['type']="all";
            $archive['result'] = Archive::query();

            if($request->get('name')){
                $archive['result']->where('name','=',$request->get('name'));
            }
            if($request->get('arcType')){
                if($request->get('arcType')=="all")
                {
                }
                else
                {
                $archive['result']->where('type','=',$request->get('arcType'));
                }
            }

            if($request->get('archNo')){
                $archive['result']->where('serisal','=',$request->get('archNo'));
            }
            if($request->get('start')&&$request->get('end')){
                $from = date_create(($request->get('start')));
                $from = explode('/', ($request->get('start')));
                $from = $from[2].'-'.$from[1].'-'.$from[0];
                $to = date_create(($request->get('end')));
                $to = explode('/', ($request->get('end')));
                $to = $to[2].'-'.$to[1].'-'.$to[0];
                $archive['result']->whereBetween('date',[$from,$to]);
            }
            $archive['result']= $archive['result']->with('files')->get();
        }
        return response()->json($archive);

    }
    public function archieveLic_info(Request $request)
    {
        $archive['info']= ArchiveLicense::find($request['archive_id']);
        $archive['files'] = File::where('archive_id','=',$request['archive_id'])->get();
        return response()->json($archive);
    }
    public function job_Lic_info(Request $request)
    {
        $archive['info']= jobLicArchieve::where('job_lic_archieves.id',$request['archive_id'])
        ->select('job_lic_archieves.*','craft_types.name as craft_name','license_ratings.name as license_ratings_name')
        ->leftJoin('craft_types','craft_types.id','job_lic_archieves.craft_type_id')
        ->leftJoin('license_ratings','license_ratings.id','job_lic_archieves.license_rating_id')
        ->get();
        $archive['info']=$archive['info'][0];
        $archive['files'] = File::where('archive_id','=',$request['archive_id'])->get();
        return response()->json($archive);
    }

    public function uploadAttach(Request $request){

        if ($request->hasFile('formDataaaUploadFile')) {
            $files=$request->file('formDataaaUploadFile');
            foreach ($files as $file)
            {

                $url = $this->upload_image($file
                 , 'quipent_');
                if ($url)
                {

                    $uploaded_files['files'] = File::create([
                        'url' => $url,
                        'real_name' => $file->getClientOriginalName(),
                        'extension' => $file->getClientOriginalExtension(),
                    ]);

                }

                $data[] = $uploaded_files;
            }
            foreach($data as $row){
                $files_ids[] = $row['files']->id;
            }
            Session::put('files_ids', $files_ids);

            $all_files['all_files'] = File::whereIn('id',$files_ids)->get();
            return response()->json($all_files);
        }

    }
}
