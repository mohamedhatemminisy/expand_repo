<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ArchieveController extends Controller
{
    public function out_archieve(){
        $type= 'outArchive';
        
        return view('dashboard.archive.outArchive',compact('type'));
    }
    public function in_archieve(){
        $type= 'inArchive';
        
        return view('dashboard.archive.outArchive',compact('type'));
    }
}
