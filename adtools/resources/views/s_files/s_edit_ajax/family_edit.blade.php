

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(['url'=>['updatefamily'], 'method'=>'post', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
    <div class="box-body">
    {!! Form::hidden('per_code', $tbl_persondatas->count()!=0 ? $tbl_persondatas[0]->per_code : '', ['class'=>'form-control']); !!}

      <!-- ព័ត៌មានគ្រួសារ -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ខ. ព័ត៌មានគ្រួសារ </h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_name_hw', 'គោត្តនាម-នាម(ប្ដី/ប្រពន្ធ)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_name_hw',  $tbl_person_family_hwdatas->count()!=0 ? $tbl_person_family_hwdatas[0]->per_family_name : '' , ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(ប្ដី/ប្រពន្ធ)']); !!}
              {!! $errors->has('per_family_name_hw')?$errors->first('per_family_name_hw'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_family_status_hw', 'ស្ថានភាព', ['class'=>'control-label']); !!} <br />
              <label>ស្លាប់ {!! Form::radio('per_family_status_hw', 'ស្លាប់', $tbl_person_family_hwdatas->count()!=0 ? ($tbl_person_family_hwdatas[0]->per_family_status == 'ស្លាប់' ? 'checked' : '') : '' , ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>រស់ {!! Form::radio('per_family_status_hw', 'រស់', $tbl_person_family_hwdatas->count()!=0 ? ($tbl_person_family_hwdatas[0]->per_family_status == 'រស់' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_family_dob_hw', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_family_dob_hw', $tbl_person_family_hwdatas->count()!=0 ? $tbl_person_family_hwdatas[0]->per_family_dob : 'null', ['class'=>'form-control']) !!}
              {!! $errors->has('per_family_dob_hw')?$errors->first('per_family_dob_hw'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_job_hw', 'មុខរបរ(ប្ដី/ប្រពន្ធ)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_job_hw', $tbl_person_family_hwdatas->count()!=0 ? $tbl_person_family_hwdatas[0]->per_family_job : '', ['class'=>'form-control', 'placeholder'=>'មុខរបរ(ប្ដី/ប្រពន្ធ)']); !!}
              {!! $errors->has('per_family_job_hw')?$errors->first('per_family_job_hw'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-8 col-ms-8">
                {!! Form::label('per_family_org_name_hw', 'ទីកន្លែងការងារ(ប្ដី/ប្រពន្ធ)', ['class'=>'control-label']); !!}
                {!! Form::text('per_family_org_name_hw', $tbl_person_family_hwdatas->count()!=0 ? $tbl_person_family_hwdatas[0]->per_family_org_name : '', ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងការងារ(ប្ដី/ប្រពន្ធ)']); !!}
                {!! $errors->has('per_family_org_name_hw')?$errors->first('per_family_org_name_hw'):'' !!}
              </div>
              <div class="col-md-4 col-ms-4">
                {!! Form::label('per_children_number', 'កូនចំនួន៖', ['class'=>'control-label']); !!}
                {!! Form::text('per_children_number', $tbl_persondatas->count()!=0 ? $tbl_persondatas[0]->per_children_number : '', ['class'=>'form-control', 'placeholder'=>'កូនចំនួន៖']); !!}
                {!! $errors->has('per_children_number')?$errors->first('per_children_number'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name1', 'គោត្តនាម-នាម(កូនទី១)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name1', $tbl_person_childdatas->count() > 0 ? $tbl_person_childdatas[0]->per_child_name : '', ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name1')?$errors->first('per_child_name1'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex1', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex1', 'm', $tbl_person_childdatas->count() > 0 ? ($tbl_person_childdatas[0]->per_child_sex == 'm' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex1', 'f', $tbl_person_childdatas->count() > 0 ? ($tbl_person_childdatas[0]->per_child_sex == 'f' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob1', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob1', $tbl_person_childdatas->count() > 0 ? $tbl_person_childdatas[0]->per_child_dob : 'null', ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob1')?$errors->first('per_child_dob1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job1', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job1', $tbl_person_childdatas->count() > 0 ? $tbl_person_childdatas[0]->per_child_job : '', ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job1')?$errors->first('per_child_job1'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name2', 'គោត្តនាម-នាម(កូនទី២)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name2', $tbl_person_childdatas->count() >= 2 ? $tbl_person_childdatas[1]->per_child_name : '', ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name2')?$errors->first('per_child_name2'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex2', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex2', 'm', $tbl_person_childdatas->count() >= 2 ? ($tbl_person_childdatas[1]->per_child_sex == 'm' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex2', 'f', $tbl_person_childdatas->count() >= 2 ? ($tbl_person_childdatas[1]->per_child_sex == 'f' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob2', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob2', $tbl_person_childdatas->count() >= 2 ? $tbl_person_childdatas[1]->per_child_dob : 'null', ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob2')?$errors->first('per_child_dob2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job2', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job2', $tbl_person_childdatas->count() >= 2 ? $tbl_person_childdatas[1]->per_child_job : '', ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job2')?$errors->first('per_child_job2'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name3', 'គោត្តនាម-នាម(កូនទី៣)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name3', $tbl_person_childdatas->count() >= 3 ? $tbl_person_childdatas[2]->per_child_name : '', ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name3')?$errors->first('per_child_name3'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex3', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex3', 'm', $tbl_person_childdatas->count() >= 3 ? ($tbl_person_childdatas[2]->per_child_sex == 'm' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex3', 'f', $tbl_person_childdatas->count() >= 3 ? ($tbl_person_childdatas[2]->per_child_sex == 'f' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob3', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob3', $tbl_person_childdatas->count() >= 3 ? $tbl_person_childdatas[2]->per_child_dob : 'null', ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob3')?$errors->first('per_child_dob3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job3', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job3', $tbl_person_childdatas->count() >= 3 ? $tbl_person_childdatas[2]->per_child_job : '', ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job3')?$errors->first('per_child_job3'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name4', 'គោត្តនាម-នាម(កូនទី៤)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name4', $tbl_person_childdatas->count() >= 4 ? $tbl_person_childdatas[3]->per_child_name : '', ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name4')?$errors->first('per_child_name4'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex4', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex4', 'm', $tbl_person_childdatas->count() >= 4 ? ($tbl_person_childdatas[3]->per_child_sex == 'm' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex4', 'f', $tbl_person_childdatas->count() >= 4 ? ($tbl_person_childdatas[3]->per_child_sex == 'f' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob4', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob4', $tbl_person_childdatas->count() >= 4 ? $tbl_person_childdatas[3]->per_child_dob : 'null', ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob4')?$errors->first('per_sibling_dob4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job4', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job4', $tbl_person_childdatas->count() >= 4 ? $tbl_person_childdatas[3]->per_child_job : '', ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job4')?$errors->first('per_child_job4'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name5', 'គោត្តនាម-នាម(កូនទី៥)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name5', $tbl_person_childdatas->count() >= 5 ? $tbl_person_childdatas[4]->per_child_name : '', ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name5')?$errors->first('per_child_name5'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex5', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex5', 'm', $tbl_person_childdatas->count() >= 5 ? ($tbl_person_childdatas[4]->per_child_sex == 'm' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex5', 'f', $tbl_person_childdatas->count() >= 5 ? ($tbl_person_childdatas[4]->per_child_sex == 'm' ? 'checked' : '') : '', ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob5', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob5', $tbl_person_childdatas->count() >= 5 ? $tbl_person_childdatas[4]->per_child_dob : 'null', ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob5')?$errors->first('per_child_dob5'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job5', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job5', $tbl_person_childdatas->count() >= 5 ? $tbl_person_childdatas[4]->per_child_job : '', ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job5')?$errors->first('per_child_job5'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_member', 'ចំនួនបងប្អូនបង្កើត៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_member', $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_sibling_member : '', ['class'=>'form-control', 'placeholder'=>'ចំនួនបងប្អូនបង្កើត៖']); !!}
              {!! $errors->has('per_sibling_member')?$errors->first('per_sibling_member'):'' !!}
            </div>
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_female', 'ស្រី៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_female', $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_sibling_female : '', ['class'=>'form-control', 'placeholder'=>'ស្រី៖']); !!}
              {!! $errors->has('per_sibling_female')?$errors->first('per_sibling_female'):'' !!}
            </div>
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_male', 'ប្រុស៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_male', $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_sibling_male : '', ['class'=>'form-control', 'placeholder'=>'ប្រុស៖']); !!}
              {!! $errors->has('per_sibling_male')?$errors->first('per_sibling_male'):'' !!}
            </div>
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_rank', 'ជាកូនទី៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_rank', $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_sibling_rank : '', ['class'=>'form-control', 'placeholder'=>'ជាកូនទី៖']); !!}
              {!! $errors->has('per_sibling_rank')?$errors->first('per_sibling_rank'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_father_name', 'ឈ្មោះឪពុក', ['class'=>'control-label']); !!}
              {!! Form::text('per_father_name',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_father_name : '', ['class'=>'form-control', 'placeholder'=>'ឈ្មោះឪពុក']); !!}
              {!! $errors->has('per_father_name')?$errors->first('per_father_name'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_father_status', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_father_status',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_father_status : '', ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_father_status')?$errors->first('per_father_status'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_father_dob', 'ថ្ងៃខែឆ្នាំកំណើត ឪពុក', ['class'=>'control-label']); !!}
              {!! Form::date('per_father_dob',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_father_dob : '', ['class'=>'form-control']) !!}
              {!! $errors->has('per_father_dob')?$errors->first('per_father_dob'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_father_job_orgname', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_father_job_orgname',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_father_job_orgname : '', ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_father_job_orgname')?$errors->first('per_father_job_orgname'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_mother_name', 'ឈ្មោះម្ដាយ', ['class'=>'control-label']); !!}
              {!! Form::text('per_mother_name',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_mother_name : '', ['class'=>'form-control', 'placeholder'=>'ឈ្មោះម្ដាយ']); !!}
              {!! $errors->has('per_mother_name')?$errors->first('per_mother_name'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_mother_status', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_mother_status',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_mother_status : '', ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_mother_status')?$errors->first('per_mother_status'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_mother_dob', 'ថ្ងៃខែឆ្នាំកំណើត ម្ដាយ', ['class'=>'control-label']); !!}
              {!! Form::date('per_mother_dob',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_mother_dob : '', ['class'=>'form-control']) !!}
              {!! $errors->has('per_mother_dob')?$errors->first('per_mother_dob'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_mother_job_orgname', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_mother_job_orgname',  $tbl_persondatas->count() > 0 ? $tbl_persondatas[0]->per_mother_job_orgname : '', ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_mother_job_orgname')?$errors->first('per_mother_job_orgname'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_name_father', 'គោត្តនាម-នាម(ឪពុកក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_name_father', $tbl_person_family_fatherdatas->count() > 0 ? $tbl_person_family_fatherdatas[0]->per_family_name : '', ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(ឪពុកក្មេក)']); !!}
              {!! $errors->has('per_family_name_father')?$errors->first('per_family_name_father'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_status_father', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_status_father', $tbl_person_family_fatherdatas->count() > 0 ? $tbl_person_family_fatherdatas[0]->per_family_status : '', ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_family_status_father')?$errors->first('per_family_status_father'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_dob_father', 'ថ្ងៃខែឆ្នាំកំណើត(ឪពុកក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::date('per_family_dob_father', $tbl_person_family_fatherdatas->count() > 0 ? $tbl_person_family_fatherdatas[0]->per_family_dob : '', ['class'=>'form-control']) !!}
              {!! $errors->has('per_family_dob_father')?$errors->first('per_family_dob_father'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_family_job_orgname_father', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_family_job_orgname_father', $tbl_person_family_fatherdatas->count() > 0 ? $tbl_person_family_fatherdatas[0]->per_family_job_orgname : '', ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_family_job_orgname_father')?$errors->first('per_family_job_orgname_father'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_name_mother', 'គោត្តនាម-នាម(ម្ដាយក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_name_mother', $tbl_person_family_motherdatas->count() > 0 ? $tbl_person_family_motherdatas[0]->per_family_name : '', ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(ម្ដាយក្មេក)']); !!}
              {!! $errors->has('per_family_name_mother')?$errors->first('per_family_name_mother'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_status_mother', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_status_mother', $tbl_person_family_motherdatas->count() > 0 ? $tbl_person_family_motherdatas[0]->per_family_status : '', ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_family_status_mother')?$errors->first('per_family_status_mother'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_dob_mother', 'ថ្ងៃខែឆ្នាំកំណើត(ម្ដាយក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::date('per_family_dob_mother', $tbl_person_family_motherdatas->count() > 0 ? $tbl_person_family_motherdatas[0]->per_family_dob : '', ['class'=>'form-control']) !!}
              {!! $errors->has('per_family_dob_mother')?$errors->first('per_family_dob_mother'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_family_job_orgname_mother', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_family_job_orgname_mother', $tbl_person_family_motherdatas->count() > 0 ? $tbl_person_family_motherdatas[0]->per_family_job_orgname: '', ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_family_job_orgname_mother')?$errors->first('per_family_job_orgname_mother'):'' !!}
              </div>
          </div>
        </div>
      </div> 
        <!-- END ព័ត៌មានគ្រួសារ -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}