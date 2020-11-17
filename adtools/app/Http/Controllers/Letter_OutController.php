<?php

namespace App\Http\Controllers;

use App\Entities\Letter_Out;
use App\Entities\file_ref;
use App\Entities\Letter_Det;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;

class Letter_OutController extends Controller
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
            $letterouts = Letter_Out::where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
            return View('Letter_Out.index', compact('letterouts'));
        }else{
            $tmpsearchby = $request->input('rbtnsearchby');
            if($tmpsearchby == 'lcode'){
                $letterouts = Letter_Out::where('letter_code', 'like', '%'.$tmpsearch.'%')->where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
                $letterouts->withPath('udtm?table_search='.$tmpsearch);
                return View('Letter_Out.index', compact('letterouts'));
            }
            if($tmpsearchby == 'lsub'){
                $letterouts = Letter_Out::where('letter_subject', 'like', '%'.$tmpsearch.'%')->where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
                $letterouts->withPath('udtm?table_search='.$tmpsearch);
                return View('Letter_Out.index', compact('letterouts'));
            }
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Letter_Out.create');
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
            'letter_code' => 'required',
            'letter_subject' => 'required',
            'letter_attachment' => 'required',
            'letter_distination' => 'required'
        ]);
        try{
            $letterout = request()->except(['letter_attachment']);
            $tmplettercode = (new \App\Helpers\helpers)->GenertateCode($request->letter_code, 'o');        
            $letterout['letter_code'] = $tmplettercode;
            $uploadfiles;
            $tmpfile_ref;
            if($request->hasFile('letter_attachment'))
            {
                Letter_Out::create($letterout);
                Letter_Det::create($letterout);
                $uploadfiles = $request->file('letter_attachment');
                foreach($uploadfiles as $item)
                {
                    $tmpfile_ref = array(
                        'letter_code' => $tmplettercode,
                        'attachment_name' => $item->getClientOriginalName(),
                        'letter_attachment' => base64_encode(file_get_contents($item->getRealPath()))
                    );
                    file_ref::create($tmpfile_ref);
                }
            }
        }
        catch (\Exception $e) {
            redirect('letterout');
        }        
        return redirect('letterout');
    }

    /**
     * Display the specified resource.
     *
     * @param int $lcode
     * @param  \App\Entities\Letter_Out  $Letter_Out
     * @return \Illuminate\Http\Response
     */
    public function show($lcode)
    {
        $letterinfo = Letter_Out::where('letter_code', $lcode)->where('record_stat', '=', 'a')->get();
        return View('Letter_Out.show', compact('letterinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Letter_Out  $Letter_Out
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter_Out $Letter_Out)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Letter_Out  $Letter_Out
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter_Out $Letter_Out)
    {
        //
    }

    /**
     * remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Letter_Out  $Letter_Out
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $requestdata = request()->except(['_token', '_method']);
        $lo = Letter_Out::where('letter_code', $requestdata['txtitem_code_remove_hidden']);
        $lo->update(['record_stat' => 'r']);

        $ld = Letter_Det::where('letter_code', $requestdata['txtitem_code_remove_hidden']);
        $ld->update(['record_stat' => 'r']);

        return redirect('letterout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Letter_Out  $Letter_Out
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter_Out $Letter_Out)
    {
        //
    }

}
