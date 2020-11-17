<?php

namespace App\Http\Controllers;

use App\Entities\Letter_In;
use App\Entities\file_ref;
use App\Entities\Letter_Det;
use Illuminate\Http\Request;

class Letter_InController extends Controller
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
     //$GenertateCode = (new );
    public function index(Request $request)
    {
        $tmpsearch = $request->input('table_search');
        if($tmpsearch == "" || $tmpsearch == NULL){
            $letterins = Letter_In::where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
            return View('letter_in.index', compact('letterins'));
        }else{
            $tmpsearchby = $request->input('rbtnsearchby');
            if($tmpsearchby == 'lcode'){
                $letterins = Letter_In::where('letter_code', 'like', '%'.$tmpsearch.'%')->where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
                $letterins->withPath('udtm?table_search='.$tmpsearch);
                return View('letter_in.index', compact('letterins'));
            }
            if($tmpsearchby == 'lsub'){
                $letterins = Letter_In::where('letter_subject', 'like', '%'.$tmpsearch.'%')->where('record_stat', '=', 'a')->orderBy('seq','DESC')->paginate(5);
                $letterins->withPath('udtm?table_search='.$tmpsearch);
                return View('letter_in.index', compact('letterins'));
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
        return View('letter_in.create');
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
            'letter_source' => 'required'
        ]);
        if($request->letter_char == 'k'){
            $this->validate($request, [
                'letter_code' => 'required',
                'letter_subject' => 'required',
                'letter_source' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'letter_code' => 'required',
                'letter_subject' => 'required',
                'letter_source' => 'required',
                'letter_attachment' => 'required',
                'letter_target' => 'required'
            ]);
        }

        try{
            $letterin = request()->except(['letter_attachment']);
            $tmplettercode = (new \App\Helpers\helpers)->GenertateCode($request->letter_code, 'i');        
            $letterin['letter_code'] = $tmplettercode;
            $uploadfiles;
            $tmpfile_ref;
            if($request->hasFile('letter_attachment'))
            {
                Letter_In::create($letterin);
                Letter_Det::create($letterin);
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
            return redirect('letterin');
        }        
        return redirect('letterin');
    }

    /**
     * Display the specified resource.
     *
     * @param int $lcode
     * @param  \App\Entities\Letter_In  $letter_In
     * @return \Illuminate\Http\Response
     */
    public function show($lcode)
    {
        $letterinfo = Letter_In::where('letter_code', $lcode)->where('record_stat', '=', 'a')->get();
        return View('letter_in.show', compact('letterinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Letter_In  $letter_In
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter_In $letter_In)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Letter_In  $letter_In
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter_In $letter_In)
    {
        //
    }

    /**
     * remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Letter_In  $letter_In
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $requestdata = request()->except(['_token', '_method']);
        $li = Letter_In::where('letter_code', $requestdata['txtitem_code_remove_hidden']);
        $li->update(['record_stat' => 'r']);

        $ld = Letter_Det::where('letter_code', $requestdata['txtitem_code_remove_hidden']);
        $ld->update(['record_stat' => 'r']);
        
        return redirect('letterin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Letter_In  $letter_In
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter_In $letter_In)
    {
        //
    }

    private function file_validation($uploadfile){
        $rules = array(
            'file' => 'required|mimes:doc,docx,pdf',
        );
        $validator = Validator::make($uploadfile, $rules);
        return $validator;
    }

}
