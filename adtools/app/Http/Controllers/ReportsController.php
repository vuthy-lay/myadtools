<?php

namespace App\Http\Controllers;

use App\Entities\Letter_In;
use App\Entities\file_ref;
use App\Entities\Letter_Det;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
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
        $tmptype = $request->input('cbotype');
        $tmpdate = $request->input('cboyear').'-'.$request->input('cbomonth');
        $tmpmonth = $request->input('cbomonth');
        $tmpyear = $request->input('cboyear');
        if($tmptype == "" || $tmptype == NULL || $tmpmonth == "" || $tmpmonth == NULL || $tmpyear == "" || $tmpyear == NULL){
            $letterdets = Letter_Det::orderBy('seq','DESC')->paginate(10);
            return View('reports.index', compact('letterdets'));
        }else{
            //print_r($tmpdate); exit();
            $letterdets = Letter_Det::where('letter_type', '=', $tmptype)->where('letter_date', 'like', '%'.$tmpdate.'%')->where('record_stat', '=', 'a')->orderBy('seq','DESC')->get();
            return View('reports.index', compact('letterdets'));
        }
        
    }
}
