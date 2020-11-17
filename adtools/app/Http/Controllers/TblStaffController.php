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
use Illuminate\Http\Request;
use DB;

class TblStaffController extends Controller
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
        $displaydatas;
        if($tmpsearch == "" || $tmpsearch == NULL){
            $displaydatas = DB::table('tbl_person')
                                    ->join('tbl_staff', 'tbl_person.per_code', '=', 'tbl_staff.per_code')
                                    ->select('tbl_person.per_code', 'tbl_person.per_surname_kh', 'tbl_person.per_name_kh', 'tbl_person.per_surname_en', 'tbl_person.per_name_en',
                                    'tbl_person.per_sex', 'tbl_person.per_dob','tbl_person.per_phone_number', 'tbl_person.record_stat', 'tbl_staff.staff_code', 'tbl_staff.per_current_salary_level')
                                    ->where('tbl_person.record_stat','=','a')->paginate(5);
            //$staffs = tbl_staff::where('record_stat', '=', 'i')->orderBy('seq','DESC')->paginate(5);
            return View('s_files.index', compact('displaydatas'));
        }else{
            $displaydatas = DB::table('tbl_person')
                                    ->join('tbl_staff', 'tbl_person.per_code', '=', 'tbl_staff.per_code')
                                    ->select('tbl_person.per_code', 'tbl_person.per_surname_kh', 'tbl_person.per_name_kh', 'tbl_person.per_surname_en', 'tbl_person.per_name_en',
                                    'tbl_person.per_sex', 'tbl_person.per_dob','tbl_person.per_phone_number', 'tbl_person.record_stat', 'tbl_staff.staff_code', 'tbl_staff.per_current_salary_level')
                                    ->where('tbl_person.record_stat','=','a')->where('tbl_person.per_name_kh', 'like', '%'.$tmpsearch.'%')->paginate(5);
            $displaydatas->withPath('staffinfo?table_search='.$tmpsearch);
            return View('s_files.index', compact('displaydatas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return View('s_files.create');
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
            'per_code' => 'required',
            'per_surname_kh' => 'required',
            'per_name_kh' => 'required',
            'per_surname_en' => 'required',
            'per_name_en' => 'required',
            'per_sex' => 'required',
            'per_dob' => 'required',
            'per_pob' => 'required',
            'per_current_address' => 'required',
            'per_phone_number' => 'required',
            'per_photo' => 'required', //Max5mb
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
            'per_sibling_rank' => 'required',
            'per_knowledge_level1' => 'required',
            'per_knowledge_school_name1' => 'required',
            'per_knowledge_school_place1' => 'required',
            'per_knowledge_certificate1' => 'required',
            'file_ref' => 'required' // Max10mb
        ]);
                    // Validate ព័ត៌មានគ្រួសារ
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
        }

                    // Validate កម្រិតវប្បធម៌ទូទៅ និងកម្រិតជំនាញ
        if($request->input('per_knowledge_level1') != NULL){
            $this->validate($request, [
                'per_knowledge_school_name1' => 'required',
                'per_knowledge_school_place1' => 'required',
                'per_knowledge_certificate1' => 'required',
                'per_knowledge_date_start1' => 'required',
                'per_knowledge_date_finish1' => 'required'
            ]);
        }
        if($request->input('per_knowledge_level2') != NULL){
            $this->validate($request, [
                'per_knowledge_school_name2' => 'required',
                'per_knowledge_school_place2' => 'required',
                'per_knowledge_certificate2' => 'required',
                'per_knowledge_date_start2' => 'required',
                'per_knowledge_date_finish2' => 'required'
            ]);
        }
        if($request->input('per_knowledge_level3') != NULL){
            $this->validate($request, [
                'per_knowledge_school_name3' => 'required',
                'per_knowledge_school_place3' => 'required',
                'per_knowledge_certificate3' => 'required',
                'per_knowledge_date_start3' => 'required',
                'per_knowledge_date_finish3' => 'required'
            ]);
        }
        if($request->input('per_knowledge_level4') != NULL){
            $this->validate($request, [
                'per_knowledge_school_name4' => 'required',
                'per_knowledge_school_place4' => 'required',
                'per_knowledge_certificate4' => 'required',
                'per_knowledge_date_start4' => 'required',
                'per_knowledge_date_finish4' => 'required'
            ]);
        }

                    // Validate ប្រវត្តិការងារ
        if($request->input('per_workhis_date_stat1') != NULL){
            $this->validate($request, [
                'per_workhis_date_finish1' => 'required',
                'per_workhis_org_name1' => 'required',
                'per_workhis_dpt_name1' => 'required',
                'per_workhis_sub_dpt_name1' => 'required',
                'per_workhis_title_name1' => 'required'
            ]);
        }
        if($request->input('per_workhis_date_stat2') != NULL){
            $this->validate($request, [
                'per_workhis_date_finish2' => 'required',
                'per_workhis_org_name2' => 'required',
                'per_workhis_dpt_name2' => 'required',
                'per_workhis_sub_dpt_name2' => 'required',
                'per_workhis_title_name2' => 'required'
            ]);
        }
        if($request->input('per_workhis_date_stat3') != NULL){
            $this->validate($request, [
                'per_workhis_date_finish3' => 'required',
                'per_workhis_org_name3' => 'required',
                'per_workhis_dpt_name3' => 'required',
                'per_workhis_sub_dpt_name3' => 'required',
                'per_workhis_title_name3' => 'required'
            ]);
        }

        $tmpstaffcode = (new \App\Helpers\helpers)->Staff_GenertateCode();
        try{
            $this->fn_person($request); //0k
            $this->fn_personchild($request); //0k
            $this->fn_personfamily($request); //0k
            $this->fn_personknowledge($request); //0k
            $this->fn_personworkinghistory($request); //0k
            $this->fn_staff($request, $tmpstaffcode); //0k
        }
        catch (\Exception $e) {
            return "error";
        } 
        return redirect('staffinfo');
    }

    /**
     * Display the specified resource.
     *
     * @param string $scode
     * @param  \App\entities\tbl_staff  $Tblstaff
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $pcode
     * @return \Illuminate\Http\Response
     */
    public function edit($pcode)
    {
        $currenttbl_persondatas;
        $currenttbl_persondatas = DB::table('tbl_person')->where('per_code', $pcode)->where('tbl_person.record_stat','=','a')->get();
        return View('s_files.edit', compact('currenttbl_persondatas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param string $pcode
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\tbl_staff  $Tblstaff
     * @param  \App\entities\tbl_staff_ref  $Tblstaff_ref
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pcode)
    {
        $this->validate($request, [
            'fname' => 'required',
            'names' => 'required',
            'sex' => 'required',
            'dob' => 'required'
        ]);
        try{
            $staffdatas = request()->except(['file_ref','_token', '_method', 'staff_code']);
            $tblstaff = Tblstaff::where('staff_code', $scode);
            //$tblstaff->update($staffdatas);
            $uploadfiles;
            $tmpfile_ref;
            if($request->hasFile('file_ref'))
            {
                $uploadfiles = $request->file('file_ref');
                foreach($uploadfiles as $item)
                {
                    $tmpfile_ref = array(
                        'staff_code' => $scode,
                        'file_name' => $item->getClientOriginalName(),
                        'file_ref' => base64_encode(file_get_contents($item->getRealPath())),
                        'record_stat' => 'a'
                    );
                    tblstaff_ref::create($tmpfile_ref);
                }
            }
        }
        catch (\Exception $e) {
            return redirect('staffinfo');
        }
        return redirect('staffinfo');
    }

     /**
     * remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\tbl_staff  $Tblstaff
     * @param  \App\entities\tbl_staff_ref  $Tblstaff_ref
     * @return \Illuminate\Http\Response
     */
     public function remove(Request $request)
    {
        $requestdata = request()->except(['_token', '_method']);
        $tblstaff = tbl_person::where('per_code', $requestdata['txtitem_code_remove_hidden']);
        $tblstaff->update(['record_stat' => 'r']);
        return redirect('staffinfo');
    }


    /**
     * remove the specified resource in storage.
     *
     * @param string $scode = '';
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\entities\tbl_staff_ref  $Tblstaff_ref
     * @return \Illuminate\Http\Response
     */
    public function staffremove_file(Request $request)
    {
        $requestdata = request()->except(['_token', '_method']);
        $tblstaff_ref = Tblstaff_ref::where('seq', $requestdata['txtitem_code_remove_hidden']);
        $tblstaff_ref->update(['record_stat' => 'r']);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\entities\tbl_staff  $Tblstaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tblstaff $Tblstaff)
    {
        //
    }

    /**
     * @param  \App\entities\tbl_person  $fntblperson
     */
    private function fn_person(Request  $requestdatas)
    {
        $person_datas;
            $person_datas['per_code'] = $requestdatas->input('per_code');
            $person_datas['per_surname_kh'] = $requestdatas->input('per_surname_kh');
            $person_datas['per_name_kh'] = $requestdatas->input('per_name_kh');
            $person_datas['per_surname_en'] = $requestdatas->input('per_surname_en');
            $person_datas['per_name_en'] = $requestdatas->input('per_name_en');
            $person_datas['per_sex'] = $requestdatas->input('per_sex');
            $person_datas['per_dob'] = $requestdatas->input('per_dob');
            $person_datas['per_nationality'] = $requestdatas->input('per_nationality');
            $person_datas['per_pob'] = $requestdatas->input('per_pob');
            $person_datas['per_current_address'] = $requestdatas->input('per_current_address');
            $person_datas['per_phone_number'] = $requestdatas->input('per_phone_number');
            $person_datas['per_email'] = $requestdatas->input('per_email');
            $person_datas['per_photo'] = base64_encode(file_get_contents($requestdatas->file('per_photo')[0]->getRealPath()));
            $person_datas['per_language'] = $requestdatas->input('per_language');
            $person_datas['per_father_name'] = $requestdatas->input('per_father_name');
            $person_datas['per_father_status'] = $requestdatas->input('per_father_status');
            $person_datas['per_father_dob'] = $requestdatas->input('per_father_dob');
            $person_datas['per_father_job_orgname'] = $requestdatas->input('per_father_job_orgname');
            $person_datas['per_mother_name'] = $requestdatas->input('per_mother_name');
            $person_datas['per_mother_status'] = $requestdatas->input('per_mother_status');
            $person_datas['per_mother_dob'] = $requestdatas->input('per_mother_dob');
            $person_datas['per_mother_job_orgname'] = $requestdatas->input('per_mother_job_orgname');
            $person_datas['per_children_number'] = $requestdatas->input('per_children_number');
            $person_datas['per_sibling_member'] = $requestdatas->input('per_sibling_member');
            $person_datas['per_sibling_female'] = $requestdatas->input('per_sibling_female');
            $person_datas['per_sibling_male'] = $requestdatas->input('per_sibling_male');
            $person_datas['per_sibling_rank'] = $requestdatas->input('per_sibling_rank');
            $person_datas['record_stat'] = $requestdatas->input('record_stat');
            tbl_person::create($person_datas);
            //var_dump($person_datas); exit();
        return $person_datas;
    }

    /**
     * @param  \App\entities\tbl_person_child  $fntblpersonchild
     */
    private function fn_personchild(Request  $requestdatas)
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
            tbl_person_child::insert($personchild_datas);
        }catch(\Exception $e){
            return 'can not insert personchild data';
        }
        
        return $personchild_datas;
    }

    /**
     * @param  \App\entities\tbl_person_family  $fntblpersonfamily
     */
    private function fn_personfamily(Request  $requestdatas)
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
            tbl_person_family::insert($personfamily_datas);
        }catch(\Exception $e){
            //print_r ($e->getMessage()); exit();
            return ('can not insert person family data');
        }
        return $personfamily_datas;
    }

    /**
     * @param  \App\entities\tbl_person_knowledge  $fntblpersonknowledge
     */
    private function fn_personknowledge(Request  $requestdatas)
    {
        // protected $fillable = array('seq', 'per_code', 'per_knowledge_level', 'per_knowledge_school_name', 'per_knowledge_school_place',
        // 'per_knowledge_certificate', 'per_knowledge_date_start', 'per_knowledge_date_finish', 'record_stat');
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
            tbl_person_knowledge::insert($personknowledge_datas);
        }catch(\Exception $e){
            return 'can not insert personknowledge data';
        }
       
        return $personknowledge_datas;
    }

    /**
     * @param  \App\entities\tbl_person_sibling  $fntblpersonsibling
     */
    private function fn_personsibling(Request  $requestdatas)
    {
        // protected $fillable = array('seq', 'per_code', 'per_sibling_name', 'per_sibling_sex', 'per_sibling_dob', 'per_sibling_job', 'record_stat');
        $personsibling_datas['per_code'] = $requestdatas->input('per_code');
        $personsibling_datas['per_sibling_name'] = $requestdatas->input('per_sibling_name');
        $personsibling_datas['per_sibling_sex'] = $requestdatas->input('per_sibling_sex');
        $personsibling_datas['per_sibling_dob'] = $requestdatas->input('per_sibling_dob');
        $personsibling_datas['per_sibling_job'] = $requestdatas->input('per_sibling_job');
        $personsibling_datas['record_stat'] = $requestdatas->input('record_stat');
        return $personsibling_datas;
    }

    /**
     * @param  \App\entities\tbl_person_workhistory  $fntblpersonworkhistory
     */
    private function fn_personworkinghistory(Request  $requestdatas)
    {
        // protected $fillable = array('seq', 'per_code', 'per_workhis_date_stat', 'per_workhis_date_finish', 'per_workhis_org_name',
        // 'per_workhis_dpt_name', 'per_workhis_sub_dpt_name', 'per_workhis_title_name', 'record_stat');
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
            tbl_person_workhistory::insert($personworkinghistory_datas);
        }catch(\Exception $e){
            return 'can not insert personworkinghistory data';
        }
        return $personworkinghistory_datas;
    }

    private function fn_staff(Request  $requestdatas, $_tmpstaffcode)
    {
        // protected $fillable = array('per_code', 'staff_code', 'per_current_salary_level', 'record_stat');
        $staff_datas;
        try{
            $staff_datas['per_code'] = $requestdatas->input('per_code');
            $staff_datas['staff_code'] = $_tmpstaffcode;
            $staff_datas['per_current_salary_level'] = 'N/A';
            $staff_datas['record_stat'] = 'a';
            tbl_staff::create($staff_datas);
            $this->fn_staffmedal($requestdatas, $_tmpstaffcode); //0k
            $this->fn_staffwarning($requestdatas, $_tmpstaffcode); //Ok
            $this->fn_staffref($requestdatas, $_tmpstaffcode); //0k
        }catch(\Exception $e){
            return 'can not insert staff data';
        }
        return $staff_datas;
    }

    private function fn_staffmedal(Request  $requestdatas, $_tmpstaffcode)
    {
        $staffmedal_datas;
        try{
            if($requestdatas->input('staff_medal_tittle') != NULL){
                $staffmedal_datas['staff_code'] = $_tmpstaffcode;
                $staffmedal_datas['staff_medal_tittle'] = $requestdatas->input('staff_medal_tittle');
                $staffmedal_datas['record_stat'] = 'a';
            }else{
                $staffmedal_datas['staff_code'] = $_tmpstaffcode;
                $staffmedal_datas['staff_medal_tittle'] = "N/A";
                $staffmedal_datas['record_stat'] = 'a';
            }
            tbl_staff_medal::create($staffmedal_datas);
        }catch(\Exception $e){
            return 'can not insert staff medal data';
            //print_r ($e->getMessage()); exit();
        }       
        return $staffmedal_datas;

    }

    private function fn_staffwarning(Request  $requestdatas, $_tmpstaffcode)
    {
        $staffwarning_datas;
        try{
            if($requestdatas->input('staff_warning_desc') != NULL){
                $staffwarning_datas['staff_code'] = $_tmpstaffcode;
                $staffwarning_datas['staff_warning_desc'] = $requestdatas->input('staff_warning_desc');
                $staffwarning_datas['record_stat'] = 'a';
            }else{
                $staffwarning_datas['staff_code'] = $_tmpstaffcode;
                $staffwarning_datas['staff_warning_desc'] = "N/A";
                $staffwarning_datas['record_stat'] = 'a';
            }
            tbl_staff_warning::create($staffwarning_datas);
        }catch(\Exception $e){
            return 'can not insert staff warning data';
        }       
        return $staffwarning_datas;
    }

    /**
     * @param  \App\entities\tbl_staff_ref  $fntblstaffref
     */
    private function fn_staffref(Request  $requestdatas, $_tmpstaffcode)
    {
        // protected $fillable = array('staff_code', 'file_name', 'file_ref', 'record_stat');
        $tmpfile_ref_upload;
        try{
            $tmpuploadfiles;
            $tmpfile_ref_upload;
            //var_dump($request["file_ref"]); exit();
            if($requestdatas->hasFile('file_ref'))
            {
                $tmpuploadfiles = $requestdatas->file('file_ref');
                foreach($tmpuploadfiles as $item)
                {
                    $tmpfile_ref_upload = array(
                        'staff_code' => $_tmpstaffcode,
                        'file_name' => $item->getClientOriginalName(),
                        'file_ref' => base64_encode(file_get_contents($item->getRealPath())),
                        'record_stat' => 'a'
                    );
                    tbl_staff_ref::create($tmpfile_ref_upload);
                }
            }
        }catch(\Exception $e){
            return $e;
        }
        return $tmpfile_ref_upload;
    }

}
