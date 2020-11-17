<?php

namespace App\Http\Controllers;

use App\Entities\Udtm_Lov;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;

class Udtm_LovController extends Controller
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
            $udtms = Udtm_Lov::orderBy('seq','DESC')->paginate(5);
            return View('udtm_lov.index', compact('udtms'));
        }else{
            $udtms = Udtm_Lov::where('lov_type', 'like', '%'.$tmpsearch.'%')->orderBy('seq','DESC')->paginate(5);
            $udtms->withPath('udtm?table_search='.$tmpsearch);
            return View('udtm_lov.index', compact('udtms'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('udtm_lov.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lov_type' => 'required',
            'lov_code' => 'required'
        ]);
        $udtmlov = $request->all();
        $datas[] = [
            'lov_type' => $request->lov_type
        ];
        Udtm_Lov::create($udtmlov);
        return redirect('udtm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Udtm_Lov  $udtm_Lov
     * @return \Illuminate\Http\Response
     */
    public function show(Udtm_Lov $udtm_Lov)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $seq
     * @param  \App\Entities\Udtm_Lov  $udtm_Lov
     * @return \Illuminate\Http\Response
     */
    public function edit($seq)
    {
        $udtm = Udtm_Lov::where('seq', $seq)->get();
        return View('udtm_lov.edit', compact('udtm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Udtm_Lov  $udtm_Lov
     * @param int $seq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $seq)
    {
        $this->validate($request, [
            'lov_type' => 'required',
            'lov_code' => 'required'
        ]);
        $requestdata = request()->except(['_token', '_method']);
        $udtm = Udtm_Lov::where('seq', $seq);
        $udtm->update($requestdata);
        $udtm->update(['record_stat' => 'a']);
        return redirect('udtm');
    }

    /**
     * remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Udtm_Lov  $udtm_Lov
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $requestdata = request()->except(['_token', '_method']);
        $udtm = Udtm_Lov::where('seq', $requestdata['txtitem_code_remove_hidden']);
        $udtm->update(['record_stat' => 'r']);
        return redirect('udtm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Udtm_Lov  $udtm_Lov
     * @return \Illuminate\Http\Response
     */
    public function destroy(Udtm_Lov $udtm_Lov)
    {
        //
    }
}
