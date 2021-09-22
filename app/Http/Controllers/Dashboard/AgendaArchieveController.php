<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Admin;
use App\Models\User;
use App\Models\AgendaExtention;
use Session;
use DB;
use App\Http\Requests\MeetingTitleRequest;

class AgendaArchieveController extends Controller
{
    public function agendaAttach(Request $request){

        if ($request->hasFile('subject1UploadFile')) {
            $files=$request->file('subject1UploadFile');
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
    public function searchEmpByName(Request $request)
    {
        $emp_data = $request['term'];
        $names = Admin::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        return response()->json($names);
    } 
    public function searchSubscriberByName(Request $request)
    {
        $emp_data = $request['term'];
        $names = User::where('name', 'like', '%' . $emp_data . '%')->select('*', 'name as label')->get();
        return response()->json($names);
    } 

    public function doAddMeetingTitles(MeetingTitleRequest $request){
           $agendaExtention = new AgendaExtention();
           $agendaExtention->name = $request->name_ar1;
           $agendaExtention->employee = json_encode($request->meetingPerEmpList);
           $agendaExtention->admin = $request->meetingmanager;
           $agendaExtention->users = json_encode($request->MemberNameList);
           $agendaExtention->save();
        if ($agendaExtention) {
            return response()->json(['success'=>trans('admin.extention_added')]);
        }else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    public function deleteMeetingTitle(Request $request){
        $data = AgendaExtention::findOrFail($request['id'])->delete();
        return response()->json(['success'=>trans('admin.meeting_deleted')]);
    }

    public function getMeetingDetailsByID(Request $request){
        $meetingTitleList = AgendaExtention::findOrFail($request['id']);
        return response()->json($meetingTitleList);
    }
    public function doEditMeetingTitle(Request $request){
        $agendaExtention = AgendaExtention::find($request['id']);
        $agendaExtention->name = $request['meetingnamear'];
        $agendaExtention->employee = json_encode($request->meetingPerEmpList);
        $agendaExtention->admin = $request->meetingmanager;
        $agendaExtention->users = json_encode($request->MemberNameList);
        $agendaExtention->save();
     if ($agendaExtention) {
         return response()->json(['success'=>trans('admin.extention_added')]);
     }else{
         return response()->json(['error'=>$validator->errors()->all()]);
     }
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
