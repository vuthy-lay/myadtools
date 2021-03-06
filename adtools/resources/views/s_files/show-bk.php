@extends('layouts.app')

@section('content')
<?php
  $KhMonth = (new \App\Helpers\helpers)->KhMonth();
  $Yearreport = (new \App\Helpers\helpers)->Yearreport();
?>
<div class="row box-body">

  <div class="col-xs-12 box-body">
    <!-- box -->
    <div class="box">
      <!-- box-header -->
      <div class="box-header">
        <h3 class="box-title">របាយការណ៍</h3>
      </div>
      <!-- /.box-header -->

        <div class="box-tools">
          {!! Form::open(['url'=>'staffreports', 'method'=>'get', 'class'=>'form-horizontal']) !!}
          <div class="form-group col-xs-6">
            {!! Form::label('staff_code', 'លេខកូដបុគ្គលិក', ['class'=>'col-md-6 control-label']); !!}
            <div class="col-md-6">
              {!! Form::text('staff_code', null, ['class'=>'form-control', 'placeholder'=>'លេខកូដបុគ្គលិក']); !!}
            </div>
          </div>

          <div class="input-group col-xs-3">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>

    </div>
    <!-- End box -->
  </div>

</div>

<div class='row box-body'>
  <div class="col-xs-12 box-body">
    <!-- Report content -->
        <div class="md-card-content"​>
                  <div class="uk-overflow-container" id="report_content">
                      <p style='text-align: center; font-family:Khmer OS Muol Light;'>ព្រះរាជាណាចក្រកម្ពុជា</p>
                      <p style='text-align: center; font-family:Khmer OS Muol Light;'>ជាតិ សាសនា ព្រះមហាក្សត្រ</p>
                      <p style='text-align: left; font-family:Khmer OS Muol Light;'>គណៈកម្មាធិការជាតិទន្លេមេគង្គកម្ពុជា</p>
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
                                  <td style='width: 20%;'>ភេទៈ {{ $tbl_persondatas[0]->per_sex  }}</td>
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
                                  <td style='width: 20%;'>ចំនួនបងប្អូនបង្កើតៈ....................................</td>
                                  <td style='width: 20%;'>ស្រីៈ...............................</td>
                                  <td style='width: 20%;'>ប្រុសៈ................................</td>
                                  <td style='width: 20%;'>ជាកូនទី {{ $tbl_persondatas[0]->per_sibling_rank ." ក្នុងគ្រួសារ" }}</td>
                                  <td style='width: 20%;'></td>
                              </tr>
                              <tr>
                                  <td style='width: 20%;'>ឪពុកឈ្មោះ {{ $tbl_persondatas[0]->per_father_name }} </td>
                                  <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ{{ $tbl_persondatas[0]->per_father_dob }} </td>
                                  <td colspan="2" style="white-space:pre;">មុខរបរៈ {{ $tbl_persondatas[0]->per_father_job }}</td>
                              </tr>
                              <tr>
                                  <td style='width: 20%;'>ម្ដាយឈ្មោះ {{ $tbl_persondatas[0]->per_mother_name }} </td>
                                  <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ {{ $tbl_persondatas[0]->per_mother_dob }} </td>
                                  <td colspan="2" style="white-space:pre;">មុខរបរៈ {{ $tbl_persondatas[0]->per_mother_job }} </td>
                              </tr>
                              <tr>
                                  <td style='width: 20%;'>ឪពុកក្មេកឈ្មោះ  {{ $tbl_person_family_fatherdatas->count()!=0 ? $tbl_person_family_fatherdatas[0]->per_family_name : 'គ្មាន' }} </td>
                                  <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ  {{ $tbl_person_family_fatherdatas->count()!=0 ? $tbl_person_family_fatherdatas[0]->per_family_dob : 'គ្មាន' }} </td>
                                  <td colspan="2" style="white-space:pre;">មុខរបរៈ  {{ $tbl_person_family_fatherdatas->count()!=0 ? $tbl_person_family_fatherdatas[0]->per_family_job : 'គ្មាន'  }} </td>
                              </tr>
                              <tr>
                                  <td style='width: 20%;'>ម្ដាយក្មេកឈ្មោះ  {{ $tbl_person_family_motherdatas->count()!=0 ? $tbl_person_family_motherdatas[0]->per_family_name : 'គ្មាន'  }} </td>
                                  <td colspan="2" style="white-space:pre;">ថ្ងៃខែឆ្នាំកំណើតៈ  {{ $tbl_person_family_motherdatas->count()!=0 ? $tbl_person_family_motherdatas[0]->per_family_dob : 'គ្មាន'  }} </td>
                                  <td colspan="2" style="white-space:pre;">មុខរបរៈ  {{ $tbl_person_family_motherdatas->count()!=0 ? $tbl_person_family_motherdatas[0]->per_family_job : 'គ្មាន' }} </td>
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
                                    <td style='width: 20%;'>ឋារន្តរស័ក្ដិ {{ $item->staff_medal_tittle }} </td>
                                    <td style='width: 20%;'>កាលបរិច្ឆេទទទួលឋារន្តរស័ក្ដិ {{ $item->staff_medal_date }} </td>
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
            //var report_style = "<style> #ts_align { background-color:green; } </style>";
            var report_form = report_header + report_style + report_content + report_footer;
            //console.log(report_form);
            //var printContents = document.getElementById('report_content').innerHTML;
            w=window.open('', '_blank', 'width=1152,height=2489');
            w.document.write(report_form);
            w.print();
            w.close();

            /*var divToPrint = document.getElementById('report_content');
            var popupWin = window.open('', '_blank', 'width=1152,height=2489');
            //popupWin.document.open();
            popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            //popupwin.print();
            popupWin.close();
            popupWin.document.close();*/
        }
    </script>
  </div>
</div>
@endsection
