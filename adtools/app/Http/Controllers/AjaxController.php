<?php

namespace App\Http\Controllers;

use App\entities\tbl_person;
use App\entities\tbl_person_family;
use App\entities\tbl_person_child;
use App\entities\tbl_person_knowledge;
use App\entities\tbl_person_workhistory;
use App\entities\tbl_person_sub_skill;
use App\entities\tbl_staff;
use App\entities\tbl_staff_ref;
use App\entities\tbl_staff_medal;
use App\entities\tbl_staff_warning;
use App\entities\tbl_udtm_lov;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function update_personalinfo(Request $request)
    {
        $this->validate($request, [
            'per_code' => 'required',
            'per_surname_kh' => 'required',
            'per_name_kh' => 'required',
            'per_surname_en' => 'required',
            'per_name_en' => 'required',
            'per_sex' => 'required',
            'per_dob' => 'required',
            'per_pob' => 'required',
            'staff_code' => 'required',
        ]);
        $person_datas;
        $staff_datas;
        $person_datas['per_surname_kh'] = $request->input('per_surname_kh');
        $person_datas['per_name_kh'] = $request->input('per_name_kh');
        $person_datas['per_surname_en'] = $request->input('per_surname_en');
        $person_datas['per_name_en'] = $request->input('per_name_en');
        $person_datas['per_sex'] = $request->input('per_sex');
        $person_datas['per_dob'] = $request->input('per_dob');
        $person_datas['per_pob'] = $request->input('per_pob');

        if($request->hasFile('per_photo')){            
            $person_datas['per_photo'] = base64_encode(file_get_contents($request->file('per_photo')[0]->getRealPath()));
        }

        // Upload File Ref
        $tmpfile_ref_upload;
        try{
            $tmpuploadfiles;
            $tmpfile_ref_upload;
            if($request->hasFile('file_ref'))
            {
                $tbldelstaff_ref = tbl_staff_ref::where('staff_code', $request->input('staff_code'));
                $tbldelstaff_ref->update(['record_stat' => 'r']);

                $tmpuploadfiles = $request->file('file_ref');
                foreach($tmpuploadfiles as $item)
                {
                    $tmpfile_ref_upload = array(
                        'staff_code' => $request->input('staff_code'),
                        'file_name' => $item->getClientOriginalName(),
                        'file_ref' => base64_encode(file_get_contents($item->getRealPath())),
                        'record_stat' => 'a'
                    );
                    tbl_staff_ref::create($tmpfile_ref_upload);
                }
                $deletedRows = tbl_staff_ref::where('staff_code', $request->input('staff_code'))->where('tbl_staff_ref.record_stat','=','r')->delete();
            }
        }catch(\Exception $e){ }
        // End - Upload File Ref
        $tmptblperson = tbl_person::where('per_code', $request->input('per_code'));
        $tmptblperson->update($person_datas);
        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function update_family(Request $request)
    {
        $this->validate($request, [
            'per_father_name' => 'required',
            'per_father_status' => 'required',
            'per_father_dob' => 'required',
            'per_father_job_orgname' => 'required',
            'per_mother_name' => 'required',
            'per_mother_status' => 'required',
            'per_mother_dob' => 'required',
            'per_mother_job_orgname' => 'required',
            'per_sibling_member' => 'required',
            'per_sibling_female' => 'required',
            'per_sibling_male' => 'required',
            'per_sibling_rank' => 'required'
        ]);
        $family_datas;
        $family_datas['per_father_name'] = $request->input('per_father_name');
        $family_datas['per_father_status'] = $request->input('per_father_status');
        $family_datas['per_father_dob'] = $request->input('per_father_dob');
        $family_datas['per_father_job_orgname'] = $request->input('per_father_job_orgname');

        $family_datas['per_mother_name'] = $request->input('per_mother_name');
        $family_datas['per_mother_status'] = $request->input('per_mother_status');
        $family_datas['per_mother_dob'] = $request->input('per_mother_dob');
        $family_datas['per_mother_job_orgname'] = $request->input('per_mother_job_orgname');

        $family_datas['per_sibling_member'] = $request->input('per_sibling_member');
        $family_datas['per_sibling_female'] = $request->input('per_sibling_female');
        $family_datas['per_sibling_male'] = $request->input('per_sibling_male');
        $family_datas['per_sibling_rank'] = $request->input('per_sibling_rank');
        $family_datas['per_children_number'] = $request->input('per_children_number');
        $tmptblperson = tbl_person::where('per_code', $request->input('per_code'));
        $tmptblperson->update($family_datas);

        if($request->input('per_children_number') != NULL){
            $this->validate($request, [
                'per_family_name_hw' => 'required',
                'per_family_status_hw' => 'required',
                'per_family_dob_hw' => 'required',
                'per_family_job_hw' => 'required',
                'per_family_org_name_hw' => 'required',

                'per_family_name_father' => 'required',
                'per_family_status_father' => 'required',
                'per_family_dob_father' => 'required',
                'per_family_job_orgname_father' => 'required',

                'per_family_name_mother' => 'required',
                'per_family_status_mother' => 'required',
                'per_family_dob_mother' => 'required',
                'per_family_job_orgname_mother' => 'required'
            ]);
            $this->fn_update_personchild($request); //0k
            $this->fn_update_personfamily($request); //0k
        }
        
        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function update_address(Request $request)
    {
        $this->validate($request, [
            'existed_per_code' => 'required',
            'existed_staff_code' => 'required',
            'per_code' => 'required',
            'staff_code' => 'required',
            'per_current_address' => 'required',
            'per_phone_number' => 'required',
        ]);
        $person_datas;
        $person_datas['per_current_address'] = $request->input('per_current_address');
        $person_datas['per_phone_number'] = $request->input('per_phone_number');
        $currentperson_code['per_code'] = $request->input('per_code');
        $currentstaff_code['staff_code'] = $request->input('staff_code');

            //Change Address & Phone
        $tmptblperson = tbl_person::where('per_code', $request->input('existed_per_code'));
        $tmptblperson->update($person_datas);
            //End Change Address & Phone

            //Changing Per_Code
        $tmptblperson = tbl_person::where('per_code', $request->input('existed_per_code'));
        $tmptblperson->update($person_datas);
        $tmptbl_person_child = tbl_person_child::where('per_code', $request->input('existed_per_code'));
        $tmptbl_person_child->update($currentperson_code);
        $tmptbl_person_family = tbl_person_family::where('per_code', $request->input('existed_per_code'));
        $tmptbl_person_family->update($currentperson_code);
        $tmptbl_person_knowledge = tbl_person_knowledge::where('per_code', $request->input('existed_per_code'));
        $tmptbl_person_knowledge->update($currentperson_code);
        $tmptbl_person_workhistory = tbl_person_workhistory::where('per_code', $request->input('existed_per_code'));
        $tmptbl_person_workhistory->update($currentperson_code);
        $tmptbl_staff = tbl_staff::where('per_code', $request->input('existed_per_code'));
        $tmptbl_staff->update($currentperson_code);
            //End Changing Per_Code

            //Change Staff Code
        $tmptbl_staff = tbl_staff::where('staff_code', $request->input('existed_staff_code'));
        $tmptbl_staff->update($currentstaff_code);
        $tmptbl_staff_medal = tbl_staff_medal::where('staff_code', $request->input('existed_staff_code'));
        $tmptbl_staff_medal->update($currentstaff_code);
        $tmptbl_staff_ref = tbl_staff_ref::where('staff_code', $request->input('existed_staff_code'));
        $tmptbl_staff_ref->update($currentstaff_code);
        $tmptbl_staff_warning = tbl_staff_warning::where('staff_code', $request->input('existed_staff_code'));
        $tmptbl_staff_warning->update($currentstaff_code);
            // End Changing Staff Code

        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function update_language(Request $request)
    {
        $this->validate($request, [
            'per_code' => 'required',
        ]);
        $person_datas;
        $person_datas['per_code'] = $request->input('per_code');
        $person_datas['per_language'] = $request->input('per_language');
        $tmptblperson = tbl_person::where('per_code', $request->input('per_code'));
        $tmptblperson->update($person_datas);
        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function update_generalknowledge(Request $request)
    {
        $this->validate($request, [
            'per_code' => 'required',
        ]);
        $this->fn_update_personknowledge($request); //0k
        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function update_workhistory(Request $request)
    {
        $this->validate($request, [
            'per_code' => 'required',
        ]);
        $this->fn_update_personworkinghistory($request); //0k
        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function update_medal(Request $request)
    {
        $staff_datas;
        $staff_datas['staff_medal_tittle'] = $request->input('staff_medal_tittle');
        $tmptblstaff = tbl_staff_medal::where('staff_code', $request->input('staff_code'));
        $tmptblstaff->update($staff_datas);
        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function update_warning(Request $request)
    {
        $staff_datas;
        $staff_datas['staff_warning_desc'] = $request->input('staff_warning_desc');
        $tmptblstaff = tbl_staff_warning::where('staff_code', $request->input('staff_code'));
        $tmptblstaff->update($staff_datas);
        return redirect('staffedit/'.$request->input('per_code'));
    }

    public function selected_option(Request $request) {
        $currentview;
        if ($request->selected_val == 1) {
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $tbl_staffdatas = DB::table('tbl_staff')->where('per_code', $request->pcode)->where('tbl_staff.record_stat','=','a')->get();
            $tbl_staff_ref_datas = DB::table('tbl_staff_ref')->where('staff_code', $tbl_staffdatas[0]->staff_code)->where('tbl_staff_ref.record_stat','=','a')->get();
            $currentview = view('s_files.s_edit_ajax.personalinfo_edit', compact('tbl_persondatas', 'tbl_staff_ref_datas'));

        } elseif($request->selected_val == 2){
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $tbl_person_childdatas = DB::table('tbl_person_child')->where('tbl_person_child.record_stat','=','a')->get();
            $tbl_person_family_hwdatas = DB::table('tbl_person_family')->where([['tbl_person_family.record_stat','=','a'], ['tbl_person_family.per_family_type', '=', 'ប្តី/ប្រពន្ធ'],])->get();
            $tbl_person_family_fatherdatas = DB::table('tbl_person_family')->where([['tbl_person_family.record_stat','=','a'], ['tbl_person_family.per_family_type', '=', 'ឪពុកក្មេក'],])->get();
            $tbl_person_family_motherdatas = DB::table('tbl_person_family')->where([['tbl_person_family.record_stat','=','a'], ['tbl_person_family.per_family_type', '=', 'ម្ដាយក្មេក'],])->get();
            $currentview = view('s_files.s_edit_ajax.family_edit', compact('tbl_persondatas', 'tbl_person_childdatas', 'tbl_person_family_hwdatas', 'tbl_person_family_fatherdatas', 'tbl_person_family_motherdatas'));
            
        } elseif($request->selected_val == 3){
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $tbl_staffdatas = DB::table('tbl_staff')->where('per_code', $request->pcode)->where('tbl_staff.record_stat','=','a')->get();
            $currentview = view('s_files.s_edit_ajax.address_edit', compact('tbl_persondatas', 'tbl_staffdatas'));

        } elseif($request->selected_val == 4){
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $currentview = view('s_files.s_edit_ajax.language_edit', compact('tbl_persondatas'));

        } elseif($request->selected_val == 5){
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $tbl_person_knowledgedatas = DB::table('tbl_person_knowledge')->where('per_code',  $request->pcode)->where('tbl_person_knowledge.record_stat','=','a')->get();
            $currentview = view('s_files.s_edit_ajax.generalknowledge_edit', compact('tbl_persondatas', 'tbl_person_knowledgedatas'));

        } elseif($request->selected_val == 6){
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $tbl_person_workhistorydatas = DB::table('tbl_person_workhistory')->where('per_code', $request->pcode)->where('tbl_person_workhistory.record_stat','=','a')->get();
            $currentview = view('s_files.s_edit_ajax.workhistory_edit', compact('tbl_persondatas', 'tbl_person_workhistorydatas'));

        } elseif($request->selected_val == 7){
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $tbl_staffdatas = DB::table('tbl_staff')->where('per_code', $request->pcode)->where('tbl_staff.record_stat','=','a')->get();
            $tbl_staff_medaldatas = DB::table('tbl_staff_medal')->where('staff_code', $tbl_staffdatas[0]->staff_code)->where('tbl_staff_medal.record_stat','=','a')->get();
            $currentview = view('s_files.s_edit_ajax.medal_edit', compact('tbl_persondatas', 'tbl_staff_medaldatas'));

        } elseif($request->selected_val == 8){
            $tbl_persondatas = DB::table('tbl_person')->where('per_code', $request->pcode)->where('tbl_person.record_stat','=','a')->get();
            $tbl_staffdatas = DB::table('tbl_staff')->where('per_code', $request->pcode)->where('tbl_staff.record_stat','=','a')->get();
            $tbl_staff_warningdatas = DB::table('tbl_staff_warning')->where('staff_code', $tbl_staffdatas[0]->staff_code)->where('tbl_staff_warning.record_stat','=','a')->get();
            $currentview = view('s_files.s_edit_ajax.warning_edit', compact('tbl_persondatas', 'tbl_staff_warningdatas'));

        } else {
            $currentview = view('s_files.s_edit_ajax.view404');
        }
        $currentview = $currentview->render();
        return response()->json(array('currentview'=> $currentview));
    }

    private function fn_update_personchild(Request  $requestdatas)
    {
        //protected $fillable = array('seq', 'per_code', 'per_child_name', 'per_child_sex', 'per_child_dob', 'per_child_job', 'record_stat');
        $personchild_datas;
        try{
            $j=0;
            for ($i = 1; $i < $requestdatas->input('per_children_number') + 1; $i++) {
                if($requestdatas->input('per_child_name'.$i) != NULL){
                    $personchild_datas[$j]['per_code'] = $requestdatas->input('per_code');
                    $personchild_datas[$j]['per_child_name'] = $requestdatas->input('per_child_name'.$i);
                    $personchild_datas[$j]['per_child_sex'] = $requestdatas->input('per_child_sex'.$i);
                    $personchild_datas[$j]['per_child_dob'] = $requestdatas->input('per_child_dob'.$i);
                    $personchild_datas[$j]['per_child_job'] = $requestdatas->input('per_child_job'.$i);
                    $personchild_datas[$j]['record_stat'] = 'a';
                    $j = $j+1;
                }
            }
            if($j >0){
                $deletedRows = tbl_person_child::where('per_code', $requestdatas->input('per_code'))->delete();
                tbl_person_child::insert($personchild_datas);
            }
            
        }catch(\Exception $e){
            return 'can not update personchild data';
        }
        return 1;
    }
    private function fn_update_personfamily(Request  $requestdatas)
    {
        //protected $fillable = array('seq', 'per_code', 'per_family_name', 'per_family_dob', 'per_family_job', 'per_family_org_name', 'per_family_type', 'record_stat');
        $personfamily_datas;
        try{
            $personfamily_datas[0]['per_code'] = $requestdatas->input('per_code');
            $personfamily_datas[0]['per_family_name'] = $requestdatas->input('per_family_name_hw');
            $personfamily_datas[0]['per_family_status'] = $requestdatas->input('per_family_status_hw');
            $personfamily_datas[0]['per_family_dob'] = $requestdatas->input('per_family_dob_hw');
            $personfamily_datas[0]['per_family_job'] = $requestdatas->input('per_family_job_hw');
            $personfamily_datas[0]['per_family_org_name'] = $requestdatas->input('per_family_org_name_hw');
            $personfamily_datas[0]['per_family_job_orgname'] = 'N/A';
            $personfamily_datas[0]['per_family_type'] = 'ប្តី/ប្រពន្ធ';
            $personfamily_datas[0]['record_stat'] = 'a';

            $personfamily_datas[1]['per_code'] = $requestdatas->input('per_code');
            $personfamily_datas[1]['per_family_name'] = $requestdatas->input('per_family_name_father');
            $personfamily_datas[1]['per_family_status'] = $requestdatas->input('per_family_status_father');
            $personfamily_datas[1]['per_family_dob'] = $requestdatas->input('per_family_dob_father');
            $personfamily_datas[1]['per_family_job'] = 'N/A';
            $personfamily_datas[1]['per_family_org_name'] = 'N/A';
            $personfamily_datas[1]['per_family_job_orgname'] = $requestdatas->input('per_family_job_orgname_father');
            $personfamily_datas[1]['per_family_type'] = 'ឪពុកក្មេក';
            $personfamily_datas[1]['record_stat'] = 'a';

            $personfamily_datas[2]['per_code'] = $requestdatas->input('per_code');
            $personfamily_datas[2]['per_family_name'] = $requestdatas->input('per_family_name_mother');
            $personfamily_datas[2]['per_family_status'] = $requestdatas->input('per_family_status_mother');            
            $personfamily_datas[2]['per_family_dob'] = $requestdatas->input('per_family_dob_mother');
            $personfamily_datas[2]['per_family_job'] = 'N/A';
            $personfamily_datas[2]['per_family_org_name'] = 'N/A';
            $personfamily_datas[2]['per_family_job_orgname'] = $requestdatas->input('per_family_job_orgname_mother');
            $personfamily_datas[2]['per_family_type'] = 'ម្ដាយក្មេក';
            $personfamily_datas[2]['record_stat'] = 'a';
            $deletedRows = tbl_person_family::where('per_code', $requestdatas->input('per_code'))->delete();
            tbl_person_family::insert($personfamily_datas);
        }catch(\Exception $e){
            return ('can not update person family data');
        }
        return 1;
    }
    private function fn_update_personknowledge(Request  $requestdatas)
    {
        $personknowledge_datas;
        try{
            $j=0;
            for ($i = 1; $i < 5; $i++) {
                if($requestdatas->input('per_knowledge_level'.$i) != NULL){
                    $personknowledge_datas[$j]['per_code'] = $requestdatas->input('per_code');
                    $personknowledge_datas[$j]['per_knowledge_level'] = $requestdatas->input('per_knowledge_level'.$i);
                    $personknowledge_datas[$j]['per_knowledge_school_name'] = $requestdatas->input('per_knowledge_school_name'.$i);
                    $personknowledge_datas[$j]['per_knowledge_school_place'] = $requestdatas->input('per_knowledge_school_place'.$i);
                    $personknowledge_datas[$j]['per_knowledge_certificate'] = $requestdatas->input('per_knowledge_certificate'.$i);
                    $personknowledge_datas[$j]['per_knowledge_date_start'] = $requestdatas->input('per_knowledge_date_start'.$i);
                    $personknowledge_datas[$j]['per_knowledge_date_finish'] = $requestdatas->input('per_knowledge_date_finish'.$i);
                    $personknowledge_datas[$j]['record_stat'] = 'a';
                    $j = $j+1;
                }
            }
            if($j>0){
                $deletedRows = tbl_person_knowledge::where('per_code', $requestdatas->input('per_code'))->delete();
                tbl_person_knowledge::insert($personknowledge_datas);
            }
        }catch(\Exception $e){
            return 'can not update personknowledge data';
        }       
        return 1;
    }
    private function fn_update_personworkinghistory(Request  $requestdatas)
    {
        $personworkinghistory_datas;
        try{
            $j=0;
            for ($i = 1; $i < 4; $i++) {
                if($requestdatas->input('per_workhis_date_stat'.$i) != NULL){
                    $personworkinghistory_datas[$j]['per_code'] = $requestdatas->input('per_code');
                    $personworkinghistory_datas[$j]['per_workhis_date_stat'] = $requestdatas->input('per_workhis_date_stat'.$i);
                    $personworkinghistory_datas[$j]['per_workhis_date_finish'] = $requestdatas->input('per_workhis_date_finish'.$i);
                    $personworkinghistory_datas[$j]['per_workhis_org_name'] = $requestdatas->input('per_workhis_org_name'.$i);
                    $personworkinghistory_datas[$j]['per_workhis_dpt_name'] = $requestdatas->input('per_workhis_dpt_name'.$i);
                    $personworkinghistory_datas[$j]['per_workhis_sub_dpt_name'] = $requestdatas->input('per_workhis_sub_dpt_name'.$i);
                    $personworkinghistory_datas[$j]['per_workhis_title_name'] = $requestdatas->input('per_workhis_title_name'.$i);
                    $personworkinghistory_datas[$j]['record_stat'] = 'a';
                    $j = $j+1;
                }
            }
            if($j>0){
                $deletedRows = tbl_person_workhistory::where('per_code', $requestdatas->input('per_code'))->delete();
                tbl_person_workhistory::insert($personworkinghistory_datas);
            }
        }catch(\Exception $e){
            return 'can not insert personworkinghistory data';
        }
        return 1;
    }

    public function show($pcode)
    {
        $current_staff_code = DB::table('tbl_staff')->where('per_code', $pcode)->where('tbl_staff.record_stat','=','a')->get();
        $current_staff_code = $current_staff_code[0]->staff_code;
        $tbl_persondatas;
        $tbl_staff_ref_datas;
        $tbl_person_childdatas;
        $tbl_person_familydatas;
        $tbl_person_family_hwdatas;
        $tbl_person_family_fatherdatas;
        $tbl_person_family_motherdatas;
        $tbl_person_knowledgedatas;
        $tbl_person_workhistorydatas;
        $tbl_person_sub_skilldatas;
        $tbl_staff_medaldatas;
        $tbl_staff_warningdatas;
        $tbl_persondatas = DB::table('tbl_person')->where('per_code', $pcode)->where('tbl_person.record_stat','=','a')->get();
        $tbl_staff_ref_datas = DB::table('tbl_staff_ref')->where('staff_code', $current_staff_code)->where('tbl_staff_ref.record_stat','=','a')->get();
        $tbl_person_childdatas = DB::table('tbl_person_child')->where('tbl_person_child.record_stat','=','a')->get();
        $tbl_person_family_hwdatas = DB::table('tbl_person_family')->where([['tbl_person_family.record_stat','=','a'], ['tbl_person_family.per_family_type', '=', 'ប្តី/ប្រពន្ធ'],])->get();
        $tbl_person_family_fatherdatas = DB::table('tbl_person_family')->where([['tbl_person_family.record_stat','=','a'], ['tbl_person_family.per_family_type', '=', 'ឪពុកក្មេក'],])->get();
        $tbl_person_family_motherdatas = DB::table('tbl_person_family')->where([['tbl_person_family.record_stat','=','a'], ['tbl_person_family.per_family_type', '=', 'ម្ដាយក្មេក'],])->get();
        $tbl_person_knowledgedatas = DB::table('tbl_person_knowledge')->where('per_code', $pcode)->where('tbl_person_knowledge.record_stat','=','a')->get();
        $tbl_person_workhistorydatas = DB::table('tbl_person_workhistory')->where('per_code', $pcode)->where('tbl_person_workhistory.record_stat','=','a')->get();
        $tbl_person_sub_skilldatas =  DB::table('tbl_person_sub_skill')->where('per_code', $pcode)->where('tbl_person_sub_skill.record_stat','=','a')->get();
        $tbl_staff_medaldatas = DB::table('tbl_staff_medal')->where('staff_code', $current_staff_code)->where('tbl_staff_medal.record_stat','=','a')->get();
        $tbl_staff_warningdatas = DB::table('tbl_staff_warning')->where('staff_code', $current_staff_code)->where('tbl_staff_warning.record_stat','=','a')->get();
        
        return View('s_files.show', compact('tbl_persondatas', 'tbl_staff_ref_datas', 'tbl_person_childdatas', 'tbl_person_family_hwdatas', 'tbl_person_family_fatherdatas',
        'tbl_person_family_motherdatas', 'tbl_person_knowledgedatas', 'tbl_person_workhistorydatas', 'tbl_person_sub_skilldatas', 'tbl_staff_sub_skilldatas', 'tbl_staff_medaldatas', 'tbl_staff_warningdatas'));
    }


}
