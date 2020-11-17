<?php

namespace App\Http\Controllers;

use App\Entities\Letter_In;
use App\Entities\file_ref;
use App\Entities\Letter_Det;
use Illuminate\Http\Request;

class Overral_InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $tmpsearch = $request->input('table_search');
        if($tmpsearch == "" || $tmpsearch == NULL){
            $letterdets = Letter_Det::where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
            return View('overral_info.index', compact('letterdets'));
        }else{
            $tmpsearchby = $request->input('rbtnsearchby');
            if($tmpsearchby == 'lcode'){
                $letterdets = Letter_Det::where('letter_code', 'like', '%'.$tmpsearch.'%')->where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
                $letterdets->withPath('udtm?table_search='.$tmpsearch);
                return View('overral_info.index', compact('letterdets'));
            }
            if($tmpsearchby == 'lsub'){
                $letterdets = Letter_Det::where('letter_subject', 'like', '%'.$tmpsearch.'%')->where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
                $letterdets->withPath('udtm?table_search='.$tmpsearch);
                return View('overral_info.index', compact('letterdets'));
            }
        }
        
    }
}
