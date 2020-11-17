@extends('layouts.app')

@section('content')
<?php
  $KhMonth = (new \App\Helpers\helpers)->KhMonth();
  $Yearreport = (new \App\Helpers\helpers)->Yearreport();
  $LetterCharKh = (new \App\Helpers\helpers)->LetterCharKh();
  $LetterRoute = (new \App\Helpers\helpers)->LetterRoute();
  $LetterTypeKh = (new \App\Helpers\helpers)->LetterTypeKh();
  //var_dump($LetterCharKh['k']);
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
          {!! Form::open(['url'=>'reports', 'method'=>'get', 'class'=>'form-horizontal']) !!}

          <div class="form-group col-xs-3">
            {!! Form::label('cbotype', 'Report Type', ['class'=>'col-md-6 control-label']); !!}
            <div class="col-md-6">
                {!! Form::select('cbotype', $LetterTypeKh,'',['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="form-group col-xs-3">
            {!! Form::label('cbomonth', 'Month', ['class'=>'col-md-6 control-label']); !!}
            <div class="col-md-6">
                {!! Form::select('cbomonth', $KhMonth, '1',['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="form-group col-xs-3">
            {!! Form::label('cboyear', 'Year', ['class'=>'col-md-6 control-label']); !!}
            <div class="col-md-6">
                {!! Form::select('cboyear', $Yearreport,'',['class'=>'form-control']) !!}
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
                      <p style='text-align: center;'>របាយការណ៍</p>
                      <p style='text-align: center;'>ឯកសារ</p>
                      <table align="center" class="uk-table uk-table-hover uk-table-nowrap" border='1' style='border-collapse: collapse; width: 100%;' id="ts_align">
                          <thead>
                            <tr>
                              <th class="uk-width-2-10 uk-text-left">លេខកូដ</th>
                              <th class="uk-width-2-10 uk-text-left">ប្រភេទលិខិត</th>
                              <th class="uk-width-2-10 uk-text-left">កាលបរិច្ឆិទ</th>
                              <th class="uk-width-2-10 uk-text-left">លក្ខណៈ</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($letterdets as $item)
                            <tr>
                              <td>{{ $item->letter_code }}</td>
                              <td>{{ $LetterTypeKh[$item->letter_type] }}</td>
                              <td>{{ $item->letter_date }}</td>
                              <td>{{ $LetterCharKh[$item->letter_char] }}</td>
                            @endforeach
                          </tbody>
                      </table>
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
                                  <td align="center" style='width: 20%;'>បានឃើញ និងឯកភាព</td>
                                  <td style='width: 20%;'></td>
                                  <td style='width: 20%;'></td>
                                  <td colspan="2" align="right" style="padding-right: 55px;">អ្នកធ្វើរបាយការណ៍</td>
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
                                  <td align="center" style='width: 20%;'>អនុប្រធាន </td>
                                  <td style='width: 20%;'></td>
                                  <td align="center" style='width: 20%;'>ប្រធាននាយកដ្ឋាន</td>
                                  <td style='width: 20%;'></td>
                                  <td style='width: 20%;'></td>
                              </tr>
                          </table>
                      </div>
                  </div>
                      
                  <div class="md-card-content" style="text-align:right;">
                      @if($letterdets != null)
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
            var report_content = document.getElementById('report_content').outerHTML;
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
