@extends('layouts.app')

@section('content')
<?php
  $Genders = (new \App\Helpers\helpers)->Gender();
  $Yearreport = (new \App\Helpers\helpers)->Yearreport();
?>
<div class="row">
    <div class="col-xs-12">
    <a type="button" class="btn btn-default" href='/staffinfo'>ថយក្រោយ</a>
    <a type="button" class="btn btn-info pull-right" href="/staffedit/{{ $tbl_persondatas[0]->per_code }}"><i class="fa fa-edit"></i> កែប្រែ</a>
        <div class="box">
            <div class='row box-body'>
                <div class="col-xs-12 box-body">
                    <!-- Report content -->
                        <div class="md-card-content"​>
                                <div class="uk-overflow-container" id="report_content">
                                    <p style='text-align: center; font-family:Khmer OS Muol Light;'>ព្រះរាជាណាចក្រកម្ពុជា</p>
                                    <p style='text-align: center; font-family:Khmer OS Muol Light;'>ជាតិ សាសនា ព្រះមហាក្សត្រ</p>
                                    <p style='text-align: left; font-family:Khmer OS Muol Light;'>គណៈកម្មាធិការជាតិទន្លេមេគង្គកម្ពុជា</p>
                                    <div style='text-align: right; margin-right: 85px;'>
                                        <img src="data:image;base64, {{ $tbl_persondatas[0]->per_photo }}" style="width:130px; height:150px;" />
                                    </div>
                                    <p style='text-align: center; font-family:Khmer OS Muol Light;'>ប្រវត្តិរូបសង្ខេប</p>
                                    <p>
                                        <div><label style='text-align: left; font-family:Khmer OS Muol Light;'>ក. ព័ត៌មានផ្ទាល់ខ្លួន</label></div>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            <tr>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="white-space:pre;">គោត្តនាម និងនាមៈ {{ $tbl_persondatas[0]->per_surname_kh .' '.$tbl_persondatas[0]->per_name_kh }} </td>
                                                <td colspan="2" style="white-space:pre;">អក្សរពុម្ពឡាតាំងៈ {{ $tbl_persondatas[0]->per_surname_en .' '.$tbl_persondatas[0]->per_name_en }} </td>
                                                <td style='width: 20%;'>ភេទៈ {{ $Genders[$tbl_persondatas[0]->per_sex] }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ {{ $tbl_persondatas[0]->per_dob  }} </td>
                                                <td style='width: 20%;'>សញ្ជាតិៈ {{ $tbl_persondatas[0]->per_nationality  }} </td>
                                                <td colspan="2" style="white-space:pre;">ជនជាតិៈ {{ $tbl_persondatas[0]->per_nationality  }} </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="white-space:pre;">ទីកន្លែងកំណើតៈ {{ $tbl_persondatas[0]->per_pob  }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="white-space:pre;">អាស័យដ្ឋានបច្ចុប្បន្នៈ {{ $tbl_persondatas[0]->per_current_address  }}</td>
                                            </tr>
                                        </table>
                                    </p>
                                    
                                    <p>
                                        <div><label style='text-align: left; font-family:Khmer OS Muol Light;'>ខ. ព័ត៌មានគ្រួសារ</label></div>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            <tr>
                                                <td style='width: 20%;'>ប្ដី/ប្រពន្ធឈ្មោះ  {{ $tbl_person_family_hwdatas->count()!=0 ? $tbl_person_family_hwdatas[0]->per_family_name : 'គ្មាន' }} </td>
                                                <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ  {{ $tbl_person_family_hwdatas->count()!=0 ? $tbl_person_family_hwdatas[0]->per_family_dob  : 'គ្មាន' }}</td>
                                                <td colspan="2" style="white-space:pre;">មុខរបរៈ  {{ $tbl_person_family_hwdatas->count()!=0 ? $tbl_person_family_hwdatas[0]->per_family_job : 'គ្មាន' }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="white-space:pre;">ចំនួនកូនៈ {{ $tbl_person_childdatas->count() . " នាក់" }}</td>
                                            </tr>
                                            @foreach($tbl_person_childdatas as $item)
                                                    <tr>
                                                        <td style='width: 20%;'>កូនឈ្មោះ {{ $item->per_child_name }}</td>
                                                        <td style='width: 20%;'>ភេទ {{ $item->per_child_sex }}</td>
                                                        <td style='width: 20%;'>ថ្ងៃខែឆ្នាំកំណើត {{ $item->per_child_dob }}</td>
                                                        <td style='width: 20%;'>មុខរបរ {{ $item->per_child_job }}</td>
                                                        <td style='width: 20%;'></td>
                                                    </tr>
                                                @endforeach
                                            <tr>
                                                <td style='width: 20%;'>ចំនួនបងប្អូនបង្កើតៈ {{ $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_sibling_member : '0' }} នាក់</td>
                                                <td style='width: 20%;'>ស្រីៈ {{ $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_sibling_female : '0' }} នាក់</td>
                                                <td style='width: 20%;'>ប្រុសៈ {{ $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_sibling_male : '0' }} នាក់</td>
                                                
                                                <td style='width: 20%;'>ជាកូនទី {{ $tbl_persondatas[0]->per_sibling_rank ." ក្នុងគ្រួសារ" }}</td>
                                                <td style='width: 20%;'></td>
                                            </tr>
                                            <tr>
                                                <td style='width: 20%;'>ឪពុកឈ្មោះ {{ $tbl_persondatas[0]->per_father_name }} </td>
                                                <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ{{ $tbl_persondatas[0]->per_father_dob }} </td>
                                                <td colspan="2" style="white-space:pre;">មុខរបរៈ {{ $tbl_persondatas[0]->per_father_job_orgname }}</td>
                                            </tr>
                                            <tr>
                                                <td style='width: 20%;'>ម្ដាយឈ្មោះ {{ $tbl_persondatas[0]->per_mother_name }} </td>
                                                <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ {{ $tbl_persondatas[0]->per_mother_dob }} </td>
                                                <td colspan="2" style="white-space:pre;">មុខរបរៈ {{ $tbl_persondatas[0]->per_mother_job_orgname }} </td>
                                            </tr>
                                            <tr>
                                                <td style='width: 20%;'>ឪពុកក្មេកឈ្មោះ  {{ $tbl_person_family_fatherdatas->count()!=0 ? $tbl_person_family_fatherdatas[0]->per_family_name : 'គ្មាន' }} </td>
                                                <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ  {{ $tbl_person_family_fatherdatas->count()!=0 ? $tbl_person_family_fatherdatas[0]->per_family_dob : 'គ្មាន' }} </td>
                                                <td colspan="2" style="white-space:pre;">មុខរបរៈ  {{ $tbl_person_family_fatherdatas->count()!=0 ? $tbl_person_family_fatherdatas[0]->per_family_job_orgname : 'គ្មាន'  }} </td>
                                            </tr>
                                            <tr>
                                                <td style='width: 20%;'>ម្ដាយក្មេកឈ្មោះ  {{ $tbl_person_family_motherdatas->count()!=0 ? $tbl_person_family_motherdatas[0]->per_family_name : 'គ្មាន'  }} </td>
                                                <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ  {{ $tbl_person_family_motherdatas->count()!=0 ? $tbl_person_family_motherdatas[0]->per_family_dob : 'គ្មាន'  }} </td>
                                                <td colspan="2" style="white-space:pre;">មុខរបរៈ  {{ $tbl_person_family_motherdatas->count()!=0 ? $tbl_person_family_motherdatas[0]->per_family_job_orgname : 'គ្មាន' }} </td>
                                            </tr>
                                        </table>
                                    </p>

                                    <p>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            <tr>
                                                <td colspan="5"><label style='font-family:Khmer OS Muol Light;'>លេខទូរស័ព្ទៈ</label> {{ $tbl_persondatas[0]->per_phone_number }} </td>
                                            </tr>
                                        </table>
                                    </p>

                                    <p>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            <tr>
                                            <td colspan="5"><label style='font-family:Khmer OS Muol Light;'>ភាសាបរទេសៈ</label> {{ $tbl_persondatas[0]->per_language}} </td>
                                            </tr>
                                        </table>
                                    </p>
                                    
                                    <p>
                                        <div><label style='text-align: left; font-family:Khmer OS Muol Light;'>គ. កម្រិតវប្បធម៌</label></div>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            @foreach($tbl_person_knowledgedatas as $item)
                                                    <tr>
                                                        <td colspan="2">កម្រិតសិក្សាៈ {{ $item->per_knowledge_level }} </td>
                                                        <td style="white-space:pre; width: 20%;">គ្រឹះស្ថានសិក្សាៈ {{ $item->per_knowledge_school_name }} </td>
                                                        <td colspan="2" style="white-space:pre;">ទីកន្លែងសិក្សាៈ {{ $item->per_knowledge_school_place }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="white-space:pre;">សញ្ញាប័ត្រៈ {{ $item->per_knowledge_certificate }} </td>
                                                        <td style='width: 30%;'>កាលបរិច្ឆេទចូលសិក្សាៈ {{ $item->per_knowledge_date_start }} </td>
                                                        <td style='width: 30%;'>កាលបរិច្ឆេទចូលសិក្សាៈ {{ $item->per_knowledge_date_finish }} </td>
                                                    </tr>
                                                @endforeach
                                        </table>
                                    </p>
                                    
                                    <p>
                                        <div><label style='text-align: left; font-family:Khmer OS Muol Light;'>ឃ. ប្រវត្តិការងារ</label></div>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            @foreach($tbl_person_workhistorydatas as $item)
                                                <tr>
                                                    <td style='width: 30%;' >កាលបរិច្ឆេទចូលបម្រើការងារៈ {{ $item->per_workhis_date_stat }} </td>
                                                    <td style='width: 30%;' >កាលបរិច្ឆេទបញ្ចប់ការងារៈ {{ $item->per_workhis_date_finish }} </td>
                                                    <td colspan="2" style="white-space:pre;">ក្រសួង/ស្ថាប័នៈ {{ $item->per_workhis_org_name }} </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="white-space:pre;">នាយកដ្ឋាន/អង្គភាពៈ {{ $item->per_workhis_dpt_name }} </td>
                                                    <td colspan="2" style="white-space:pre;">ការិយាល័យ/ផ្នែកៈ {{ $item->per_workhis_sub_dpt_name }} </td>
                                                    <td style='width: 20%;'>មុខតំណែងៈ {{ $item->per_workhis_title_name }} </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </p>

                                    <p>
                                        <div><label style='text-align: left; font-family:Khmer OS Muol Light;'>ង. សកម្មភាពការងារ និងមុខដំណែងដែលបានទទួលកន្លងមក</label></div>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            @foreach($tbl_staff_medaldatas as $item)
                                                <tr>
                                                    <td style='width: 20%;'>បរិយាយ {{ $item->staff_medal_tittle }} </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </p>

                                    <p>
                                        <div><label style='text-align: left; font-family:Khmer OS Muol Light;'>ច. ការទទួលពិន័យ ឬព្រមាន</label></div>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            @foreach($tbl_staff_warningdatas as $item)
                                                <tr>
                                                    <td style='width: 20%;'>បរិយាយ {{ $item->staff_warning_desc }} </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </p>

                                    <div>
                                        <table align="center" style='border-collapse: collapse; width: 100%;'>
                                            <tr>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">ខ្ញុំសូមធានាទទួលខុសត្រូវចំពោះមុខច្បាប់ថា ព័ត៌មានបំពេញខាងលើនេះពិតជាត្រឹមត្រូវពិតប្រាកដមែន។</td>
                                            </tr>
                                            <tr>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td colspan="2" align="right" style="white-space:pre;">ថ្ងៃ......................ខែ............ឆ្នាំ..................... ព.ស...............</td>
                                            </tr>
                                            <tr>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td colspan="2" align="right" style="white-space:pre;">រាជធានីភ្នំពេញ,ថ្ងៃទី..................................</td>
                                            </tr>
                                            <tr>
                                                <td align="center" style='width: 20%; font-family:Khmer OS Muol Light;'>បានឃើញ និងបញ្ជាក់ថា</td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td colspan="2" align="right" style="padding-right: 55px;">ហត្ថលេខាសាម៉ីខ្លួន</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="white-space:pre;">ព័ត៌មានដែលលោក/លោកស្រី………………..................………………អះអាងខាងលើពិតជាត្រឹមត្រូវប្រាកដមែន។</td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="white-space:pre;">ថ្ងៃ......................ខែ............ឆ្នាំ..................... ព.ស...............</td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="white-space:pre;">រាជធានីភ្នំពេញ,ថ្ងៃទី..................................</td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                            </tr>
                                            <tr>
                                                <td align="center" style='width: 20%; font-family:Khmer OS Muol Light;'>ប្រធាននាយកដ្ឋានបុគ្គលិក និងអភិវឌ្ឍន៍ធនធានមនុស្ស</td>
                                                <td style='width: 20%;'></td>
                                                <td align="center" style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                                <td style='width: 20%;'></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                    
                                <div class="md-card-content" style="text-align:right;">
                                    @if($tbl_persondatas != null)
                                        <button class="md-btn md-btn-success md-btn-wave" onclick="printDiv()">ព្រីន</button>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- End Report content -->
                    <script>
                    function printDiv() {
                            var report_header = "<html><body>";
                            var report_style = "";
                            var report_content = document.getElementById('report_content').innerHTML;
                            var report_footer = "</body></html>";
                            var report_form = report_header + report_style + report_content + report_footer;
                            w=window.open('', '_blank', 'width=1152,height=2489');
                            w.document.write(report_form);
                            w.print();
                            w.close();
                        }
                    </script>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-header">
                <h3 class="box-title"> {{ $tbl_staff_ref_datas[0]->file_name  }}</h3>
            </div>
            <div class="box-body no-padding">
            <div class="form-group">
                <?php
                    echo('<div class="col-sm-12" id="divatt'.$tbl_staff_ref_datas[0]->file_name.'">
                    <iframe src="data:application/pdf;base64,'.$tbl_staff_ref_datas[0]->file_ref.'" type="application/pdf" class="form-control" style="height:500px;"></iframe>
                    </div>'); 
                ?>
            </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box-footer">
            <a type="button" class="btn btn-default" href='/staffinfo'>ថយក្រោយ</a>
            <a type="button" class="btn btn-info pull-right" href="/staffedit/{{ $tbl_persondatas[0]->per_code }}"><i class="fa fa-edit"></i> កែប្រែ</a>
        </div>

    </div>
    
</div> 
        
@endsection
