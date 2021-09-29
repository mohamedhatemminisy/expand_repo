<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Archive;
use App\Models\File;
use App\Models\linkedTo;

class JalArchieveController extends Controller
{
    public function store_jal_archive(Request $request){
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
                $copyTo = new linkedTo();
                $copyTo->archive_id =  $archive->id;
                $copyTo->model_id =  $request->copyToID[$i];
                $copyTo->name =  $request->copyToCustomer[$i];    
                $copyTo->model_name =  $request->copyToType[$i];   
                $copyTo->save();         
            }
        }
        if ($archive) {
            return response()->json(['success'=>trans('admin.archive_added')]);
        }
            return response()->json(['error'=>$validator->errors()->all()]);
    }
}
