

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::model($tbl_persondatas[0], ['url'=>['updatepersonalinfo'], 'method'=>'post', 'class'=>'form-horizontal', 'files' => true, 'enctype' =>'multipart/form-data']) !!}
  
    <div class="box-body">
    {!! Form::hidden('per_code', null, ['class'=>'form-control']); !!}
    {!! Form::hidden('staff_code', $tbl_staff_ref_datas->count()!=0 ? $tbl_staff_ref_datas[0]->staff_code : '', ['class'=>'form-control']); !!}
      <!-- PersonInfo -->

      <div class="box box-info box-header with-border">
        <h3 class="box-title">រូបថត</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              <img src="data:image;base64, {{ $tbl_persondatas[0]->per_photo }}" style="width:250px; height:250px;" />
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_photo[]', 'ប្ដូររូបថត', ['class'=>'control-label']); !!}
              {!! Form::file('per_photo[]', ['class' => 'field', 'accept' => '.jpeg, .jpg']) !!}
            </div>
          </div>
        </div>
      </div>
      
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ក. ព័ត៌មានផ្ទាល់ខ្លួន</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">      
            <div class="col-md-3 col-ms-3"> 
              {!! Form::label('per_surname_kh', 'គោត្តនាម', ['class'=>'control-label']); !!} 
              {!! Form::text('per_surname_kh', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម']); !!}
              {!! $errors->has('per_surname_kh')?$errors->first('per_surname_kh'):'' !!}
            </div>        
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_name_kh', 'នាម', ['class'=>'control-label']); !!}
              {!! Form::text('per_name_kh', null, ['class'=>'form-control', 'placeholder'=>'នាម']); !!}
              {!! $errors->has('per_name_kh')?$errors->first('per_name_kh'):'' !!}
            </div>
            <div class="col-md-3 col-ms-3"> 
                {!! Form::label('per_surname_en', 'គោត្តនាម-អង់គ្លេស', ['class'=>'control-label']); !!} 
                {!! Form::text('per_surname_en', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-អង់គ្លេស']); !!}
                {!! $errors->has('per_surname_en')?$errors->first('per_surname_en'):'' !!}
            </div>        
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_name_en', 'នាម-អង់គ្លេស', ['class'=>'control-label']); !!}
              {!! Form::text('per_name_en', null, ['class'=>'form-control', 'placeholder'=>'នាម-អង់គ្លេស']); !!}
              {!! $errors->has('per_name_en')?$errors->first('per_name_en'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_sex', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_sex', 'm', true, ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_sex', 'f', false, ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_dob', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_dob', null, ['class'=>'form-control']) !!}
              {!! $errors->has('per_dob')?$errors->first('per_dob'):'' !!}
              {!! Form::hidden('per_nationality', 'ខ្មែរ', ['class'=>'form-control']); !!}
            </div>
            <div class="col-md-6 col-ms-6"> 
                {!! Form::label('per_pob', 'ទីកន្លែងកំណើត', ['class'=>'control-label']); !!} 
                {!! Form::text('per_pob', null, ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងកំណើត']); !!}
                {!! $errors->has('per_pob')?$errors->first('per_pob'):'' !!}
              </div>
          </div>

          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">      
            <div class="box-header">
                  <h3 class="box-title"> {{ $tbl_staff_ref_datas[0]->file_name  }}</h3>
            </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="form-group">
                    <?php
                        echo('<div class="col-sm-12" id="divatt'.$tbl_staff_ref_datas[0]->file_name.'">
                        <iframe src="data:application/pdf;base64,'.$tbl_staff_ref_datas[0]->file_ref.'" type="application/pdf" class="form-control" style="height:500px;"></iframe>
                        </div>'); 
                    ?>
                </div>

                <div class="form-group">
                  {!! Form::label('file_ref[]', 'ប្ដូរឯកសារពាក់ព័ន្ធ', ['class'=>'col-sm-2 control-label']); !!}
                  <div class="col-sm-10">
                    {!! Form::file('file_ref[]', ['class' => 'field', 'multiple' => 'multiple', 'accept' => '.pdf', 'max' => '10000']) !!}
                  </div>
                </div> 

              </div>
          </div>

        </div>
      </div>
      <!-- End_PersonInfo -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}