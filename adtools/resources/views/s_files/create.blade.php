@extends('layouts.app')

@section('content')
<meta charset="utf-8">
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">បញ្ចូលព័ត៌មានថ្មី</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(['url'=>'staffcreate', 'class'=>'form-horizontal', 'files' => true, 'enctype' =>'multipart/form-data']) !!}
    <div class="box-body">
    {!! Form::hidden('staff_code', 's', ['class'=>'form-control']); !!}

      <!-- PersonInfo -->
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
              {!! Form::date('per_dob', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_dob')?$errors->first('per_dob'):'' !!}
              {!! Form::hidden('per_nationality', 'ខ្មែរ', ['class'=>'form-control']); !!}
            </div>
            <div class="col-md-6 col-ms-6"> 
                {!! Form::label('per_pob', 'ទីកន្លែងកំណើត', ['class'=>'control-label']); !!} 
                {!! Form::text('per_pob', null, ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងកំណើត']); !!}
                {!! $errors->has('per_pob')?$errors->first('per_pob'):'' !!}
              </div>
              <div class="col-md-2 col-ms-2">
              {!! Form::label('per_photo[]', 'រូបថត', ['class'=>'control-label']); !!}
              {!! Form::file('per_photo[]', ['class' => 'field', 'accept' => '.jpeg, .jpg']) !!}
              {!! $errors->has('per_photo')?$errors->first('per_photo'):'' !!}
            </div>
          </div>
        </div>
      </div>
      <!-- End_PersonInfo -->

        <!-- ព័ត៌មានគ្រួសារ -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ខ. ព័ត៌មានគ្រួសារ</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_name_hw', 'គោត្តនាម-នាម(ប្ដី/ប្រពន្ធ)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_name_hw', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(ប្ដី/ប្រពន្ធ)']); !!}
              {!! $errors->has('per_family_name_hw')?$errors->first('per_family_name_hw'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_family_status_hw', 'ស្ថានភាព', ['class'=>'control-label']); !!} <br />
              <label>ស្លាប់ {!! Form::radio('per_family_status_hw', 'ស្លាប់', false, ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>រស់ {!! Form::radio('per_family_status_hw', 'រស់', true, ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_family_dob_hw', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_family_dob_hw', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_family_dob_hw')?$errors->first('per_family_dob_hw'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_job_hw', 'មុខរបរ(ប្ដី/ប្រពន្ធ)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_job_hw', null, ['class'=>'form-control', 'placeholder'=>'មុខរបរ(ប្ដី/ប្រពន្ធ)']); !!}
              {!! $errors->has('per_family_job_hw')?$errors->first('per_family_job_hw'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-8 col-ms-8">
                {!! Form::label('per_family_org_name_hw', 'ទីកន្លែងការងារ(ប្ដី/ប្រពន្ធ)', ['class'=>'control-label']); !!}
                {!! Form::text('per_family_org_name_hw', null, ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងការងារ(ប្ដី/ប្រពន្ធ)']); !!}
                {!! $errors->has('per_family_org_name_hw')?$errors->first('per_family_org_name_hw'):'' !!}
              </div>
              <div class="col-md-4 col-ms-4">
                {!! Form::label('per_children_number', 'កូនចំនួន៖', ['class'=>'control-label']); !!}
                {!! Form::text('per_children_number', null, ['class'=>'form-control', 'placeholder'=>'កូនចំនួន៖']); !!}
                {!! $errors->has('per_children_number')?$errors->first('per_children_number'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name1', 'គោត្តនាម-នាម(កូនទី១)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name1', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name1')?$errors->first('per_child_name1'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex1', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex1', 'm', true, ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex1', 'f', false, ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob1', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob1', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob1')?$errors->first('per_child_dob1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job1', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job1', null, ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job1')?$errors->first('per_child_job1'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name2', 'គោត្តនាម-នាម(កូនទី២)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name2', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name2')?$errors->first('per_child_name2'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex2', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex2', 'm', true, ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex2', 'f', false, ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob2', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob2', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob2')?$errors->first('per_child_dob2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job2', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job2', null, ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job2')?$errors->first('per_child_job2'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name3', 'គោត្តនាម-នាម(កូនទី៣)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name3', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name3')?$errors->first('per_child_name3'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex3', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex3', 'm', true, ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex3', 'f', false, ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob3', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob3', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob3')?$errors->first('per_child_dob3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job3', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job3', null, ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job3')?$errors->first('per_child_job3'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name4', 'គោត្តនាម-នាម(កូនទី៤)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name4', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name4')?$errors->first('per_child_name4'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex4', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex4', 'm', true, ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex4', 'f', false, ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob4', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob4', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob4')?$errors->first('per_sibling_dob4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job4', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job4', null, ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job4')?$errors->first('per_child_job4'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_name5', 'គោត្តនាម-នាម(កូនទី៥)', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_name5', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(កូន)']); !!}
              {!! $errors->has('per_child_name5')?$errors->first('per_child_name5'):'' !!}
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_sex5', 'ភេទ', ['class'=>'control-label']); !!} <br />
              <label>ប្រុស {!! Form::radio('per_child_sex5', 'm', true, ['class'=>'col-sm-2 control-label']) !!} </label>
              <label>ស្រី {!! Form::radio('per_child_sex5', 'f', false, ['class'=>'col-sm-2 control-label']) !!}</label>
            </div>
            <div class="col-md-2 col-ms-2">
              {!! Form::label('per_child_dob5', 'ថ្ងៃខែឆ្នាំកំណើត', ['class'=>'control-label']); !!}
              {!! Form::date('per_child_dob5', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_child_dob5')?$errors->first('per_child_dob5'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_child_job5', 'មុខរបរ', ['class'=>'control-label']); !!}
              {!! Form::text('per_child_job5', null, ['class'=>'form-control', 'placeholder'=>'មុខរបរ']); !!}
              {!! $errors->has('per_child_job5')?$errors->first('per_child_job5'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_member', 'ចំនួនបងប្អូនបង្កើត៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_member', null, ['class'=>'form-control', 'placeholder'=>'ចំនួនបងប្អូនបង្កើត៖']); !!}
              {!! $errors->has('per_sibling_member')?$errors->first('per_sibling_member'):'' !!}
            </div>
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_female', 'ស្រី៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_female', null, ['class'=>'form-control', 'placeholder'=>'ស្រី៖']); !!}
              {!! $errors->has('per_sibling_female')?$errors->first('per_sibling_female'):'' !!}
            </div>
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_male', 'ប្រុស៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_male', null, ['class'=>'form-control', 'placeholder'=>'ប្រុស៖']); !!}
              {!! $errors->has('per_sibling_male')?$errors->first('per_sibling_male'):'' !!}
            </div>
            <div class="col-md-3 col-ms-3">
              {!! Form::label('per_sibling_rank', 'ជាកូនទី៖', ['class'=>'control-label']); !!}
              {!! Form::text('per_sibling_rank', null, ['class'=>'form-control', 'placeholder'=>'ជាកូនទី៖']); !!}
              {!! $errors->has('per_sibling_rank')?$errors->first('per_sibling_rank'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_father_name', 'ឈ្មោះឪពុក', ['class'=>'control-label']); !!}
              {!! Form::text('per_father_name', null, ['class'=>'form-control', 'placeholder'=>'ឈ្មោះឪពុក']); !!}
              {!! $errors->has('per_father_name')?$errors->first('per_father_name'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_father_status', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_father_status', null, ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_father_status')?$errors->first('per_father_status'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_father_dob', 'ថ្ងៃខែឆ្នាំកំណើត ឪពុក', ['class'=>'control-label']); !!}
              {!! Form::date('per_father_dob', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_father_dob')?$errors->first('per_father_dob'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_father_job_orgname', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_father_job_orgname', null, ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_father_job_orgname')?$errors->first('per_father_job_orgname'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_mother_name', 'ឈ្មោះម្ដាយ', ['class'=>'control-label']); !!}
              {!! Form::text('per_mother_name', null, ['class'=>'form-control', 'placeholder'=>'ឈ្មោះម្ដាយ']); !!}
              {!! $errors->has('per_mother_name')?$errors->first('per_mother_name'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_mother_status', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_mother_status', null, ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_mother_status')?$errors->first('per_mother_status'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_mother_dob', 'ថ្ងៃខែឆ្នាំកំណើត ម្ដាយ', ['class'=>'control-label']); !!}
              {!! Form::date('per_mother_dob', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_mother_dob')?$errors->first('per_mother_dob'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_mother_job_orgname', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_mother_job_orgname', null, ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_mother_job_orgname')?$errors->first('per_mother_job_orgname'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_name_father', 'គោត្តនាម-នាម(ឪពុកក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_name_father', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(ឪពុកក្មេក)']); !!}
              {!! $errors->has('per_family_name_father')?$errors->first('per_family_name_father'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_status_father', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_status_father', null, ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_family_status_father')?$errors->first('per_family_status_father'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_dob_father', 'ថ្ងៃខែឆ្នាំកំណើត(ឪពុកក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::date('per_family_dob_father', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_family_dob_father')?$errors->first('per_family_dob_father'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_family_job_orgname_father', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_family_job_orgname_father', null, ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_family_job_orgname_father')?$errors->first('per_family_job_orgname_father'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_name_mother', 'គោត្តនាម-នាម(ម្ដាយក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_name_mother', null, ['class'=>'form-control', 'placeholder'=>'គោត្តនាម-នាម(ម្ដាយក្មេក)']); !!}
              {!! $errors->has('per_family_name_mother')?$errors->first('per_family_name_mother'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_status_mother', 'ស្ថានភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_family_status_mother', null, ['class'=>'form-control', 'placeholder'=>'ស្ថានភាព']); !!}
              {!! $errors->has('per_family_status_mother')?$errors->first('per_family_status_mother'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_family_dob_mother', 'ថ្ងៃខែឆ្នាំកំណើត(ម្ដាយក្មេក)', ['class'=>'control-label']); !!}
              {!! Form::date('per_family_dob_mother', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
              {!! $errors->has('per_family_dob_mother')?$errors->first('per_family_dob_mother'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-12 col-ms-12">
                {!! Form::label('per_family_job_orgname_mother', 'ធ្វើអ្វី នៅឯណា?', ['class'=>'control-label']); !!}
                {!! Form::text('per_family_job_orgname_mother', null, ['class'=>'form-control', 'placeholder'=>'ធ្វើអ្វី នៅឯណា?']); !!}
                {!! $errors->has('per_family_job_orgname_mother')?$errors->first('per_family_job_orgname_mother'):'' !!}
              </div>
          </div>
        </div>
      </div> 
        <!-- END ព័ត៌មានគ្រួសារ -->

         <!-- អាសយដ្ឋានបច្ចុប្បន្ន -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">គ. អាសយដ្ឋានបច្ចុប្បន្ន</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">           
              <div class="col-md-12 col-ms-12">
                {!! Form::label('per_current_address', 'អាស័យដ្ឋានបច្ចុប្បន្ន', ['class'=>'control-label']); !!} 
                {!! Form::text('per_current_address', null, ['class'=>'form-control', 'placeholder'=>'អាស័យដ្ឋានបច្ចុប្បន្ន']); !!}
                {!! $errors->has('per_current_address')?$errors->first('per_current_address'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-6 col-ms-6">
              {!! Form::label('per_phone_number', 'លេខទូរស័ព្ទ', ['class'=>'control-label']); !!}
              {!! Form::text('per_phone_number', null, ['class'=>'form-control', 'placeholder'=>'លេខទូរស័ព្ទ']); !!}
              {!! $errors->has('per_phone_number')?$errors->first('per_phone_number'):'' !!}
            </div>
            <div class="col-md-6 col-ms-6">
              {!! Form::label('per_code', 'លេខអត្តសញ្ញាណប័ណ្ណ', ['class'=>'control-label']); !!}
              {!! Form::text('per_code', null, ['class'=>'form-control', 'placeholder'=>'លេខអត្តសញ្ញាណប័ណ្ណ']); !!}
              {!! $errors->has('per_code')?$errors->first('per_code'):'' !!}
            </div>
          </div>
        </div>
      </div> 
        <!-- END អាសយដ្ឋានបច្ចុប្បន្ន -->

        <!-- ភាសាបរទេស -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ឃ. ភាសាបរទេស</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">           
            <div class="col-md-12 col-ms-12">
              {!! Form::label('per_language', 'ភាសាបរទេស', ['class'=>'control-label']); !!}
              {!! Form::text('per_language', null, ['class'=>'form-control', 'placeholder'=>'ភាសាបរទេស']); !!}
              {!! $errors->has('per_language')?$errors->first('per_language'):'' !!}
            </div>
          </div>
        </div>
      </div> 
        <!-- END ភាសាបរទេស -->

              <!-- Knowlege -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ង. កម្រិតវប្បធម៌ទូទៅ បណ្ដុះបណ្ដាលមុខវិជ្ជាមូលដ្ឋាន និងក្រោយមូលដ្ឋាន (កម្រិតវប្បធម៌ទូទៅ)</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level1', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level1', null, ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level1')?$errors->first('per_knowledge_level1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name1', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name1', null, ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name1')?$errors->first('per_knowledge_school_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place1', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place1', null, ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place1')?$errors->first('per_knowledge_school_place1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate1', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate1', null, ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate1')?$errors->first('per_knowledge_certificate1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start1', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start1', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start1')?$errors->first('per_knowledge_date_start1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish1', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish1', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish1')?$errors->first('per_knowledge_date_finish1'):'' !!}
            </div>
          </div>
        </div>
      </div>
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ង១. កម្រិតវប្បធម៌ទូទៅ បណ្ដុះបណ្ដាលមុខវិជ្ជាមូលដ្ឋាន និងក្រោយមូលដ្ឋាន (បណ្ដុះបណ្ដាលមុខវិជ្ជាមូលដ្ឋាន និងក្រោយមូលដ្ឋាន)</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level2', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level2', null, ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level2')?$errors->first('per_knowledge_level2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name2', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name2', null, ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name2')?$errors->first('per_knowledge_school_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place2', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place2', null, ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place2')?$errors->first('per_knowledge_school_place2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate2', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate2', null, ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate2')?$errors->first('per_knowledge_certificate2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start2', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start2', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start2')?$errors->first('per_knowledge_date_start2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish2', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish2', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish2')?$errors->first('per_knowledge_date_finish2'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level3', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level3', null, ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level3')?$errors->first('per_knowledge_level3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name3', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name3', null, ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name3')?$errors->first('per_knowledge_school_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place3', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place3', null, ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place3')?$errors->first('per_knowledge_school_place3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate3', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate3', null, ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate3')?$errors->first('per_knowledge_certificate3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start3', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start3', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start3')?$errors->first('per_knowledge_date_start3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish3', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish3', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish3')?$errors->first('per_knowledge_date_finish3'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level4', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level4', null, ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level4')?$errors->first('per_knowledge_level4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name4', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name4', null, ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name4')?$errors->first('per_knowledge_school_name4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place4', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place4', null, ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place4')?$errors->first('per_knowledge_school_place4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate4', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate4', null, ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate4')?$errors->first('per_knowledge_certificate4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start4', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start4', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start4')?$errors->first('per_knowledge_date_start4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish4', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish4', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish4')?$errors->first('per_knowledge_date_finish4'):'' !!}
            </div>
          </div>
        </div>
      </div>
      <!-- End_Knowlege -->

          <!-- WorkingHistory -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ច. ប្រវត្តិការងារ</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_stat1', 'កាលបរិច្ឆេទចូលបម្រើការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_stat1', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលបម្រើការងារ']); !!}
              {!! $errors->has('per_workhis_date_stat1')?$errors->first('per_workhis_date_stat1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_finish1', 'កាលបរិច្ឆេទបញ្ចប់ការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_finish1', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការងារ']); !!}
              {!! $errors->has('per_workhis_date_finish1')?$errors->first('per_workhis_date_finish1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_org_name1', 'ក្រសួង/ស្ថាប័ន', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_org_name1', null, ['class'=>'form-control', 'placeholder'=>'ក្រសួង/ស្ថាប័ន']); !!}
              {!! $errors->has('per_workhis_org_name1')?$errors->first('per_workhis_org_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_dpt_name1', 'នាយកដ្ឋាន/អង្គភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_dpt_name1', null, ['class'=>'form-control', 'placeholder'=>'នាយកដ្ឋាន/អង្គភាព']); !!}
              {!! $errors->has('per_workhis_dpt_name1')?$errors->first('per_workhis_dpt_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_sub_dpt_name1', 'ការិយាល័យ/ផ្នែក', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_sub_dpt_name1', null, ['class'=>'form-control', 'placeholder'=>'ការិយាល័យ/ផ្នែក']); !!}
              {!! $errors->has('per_workhis_sub_dpt_name1')?$errors->first('per_workhis_sub_dpt_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_title_name1', 'មុខតំណែង', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_title_name1', null, ['class'=>'form-control', 'placeholder'=>'មុខតំណែង']); !!}
              {!! $errors->has('per_workhis_title_name1')?$errors->first('per_workhis_title_name1'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_stat2', 'កាលបរិច្ឆេទចូលបម្រើការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_stat2', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលបម្រើការងារ']); !!}
              {!! $errors->has('per_workhis_date_stat2')?$errors->first('per_workhis_date_stat2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_finish2', 'កាលបរិច្ឆេទបញ្ចប់ការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_finish2', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការងារ']); !!}
              {!! $errors->has('per_workhis_date_finish2')?$errors->first('per_workhis_date_finish2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_org_name2', 'ក្រសួង/ស្ថាប័ន', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_org_name2', null, ['class'=>'form-control', 'placeholder'=>'ក្រសួង/ស្ថាប័ន']); !!}
              {!! $errors->has('per_workhis_org_name2')?$errors->first('per_workhis_org_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_dpt_name2', 'នាយកដ្ឋាន/អង្គភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_dpt_name2', null, ['class'=>'form-control', 'placeholder'=>'នាយកដ្ឋាន/អង្គភាព']); !!}
              {!! $errors->has('per_workhis_dpt_name2')?$errors->first('per_workhis_dpt_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_sub_dpt_name2', 'ការិយាល័យ/ផ្នែក', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_sub_dpt_name2', null, ['class'=>'form-control', 'placeholder'=>'ការិយាល័យ/ផ្នែក']); !!}
              {!! $errors->has('per_workhis_sub_dpt_name2')?$errors->first('per_workhis_sub_dpt_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_title_name2', 'មុខតំណែង', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_title_name2', null, ['class'=>'form-control', 'placeholder'=>'មុខតំណែង']); !!}
              {!! $errors->has('per_workhis_title_name2')?$errors->first('per_workhis_title_name2'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_stat3', 'កាលបរិច្ឆេទចូលបម្រើការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_stat3', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលបម្រើការងារ']); !!}
              {!! $errors->has('per_workhis_date_stat3')?$errors->first('per_workhis_date_stat3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_finish3', 'កាលបរិច្ឆេទបញ្ចប់ការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_finish3', null, ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការងារ']); !!}
              {!! $errors->has('per_workhis_date_finish3')?$errors->first('per_workhis_date_finish3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_org_name3', 'ក្រសួង/ស្ថាប័ន', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_org_name3', null, ['class'=>'form-control', 'placeholder'=>'ក្រសួង/ស្ថាប័ន']); !!}
              {!! $errors->has('per_workhis_org_name3')?$errors->first('per_workhis_org_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_dpt_name3', 'នាយកដ្ឋាន/អង្គភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_dpt_name3', null, ['class'=>'form-control', 'placeholder'=>'នាយកដ្ឋាន/អង្គភាព']); !!}
              {!! $errors->has('per_workhis_dpt_name3')?$errors->first('per_workhis_dpt_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_sub_dpt_name3', 'ការិយាល័យ/ផ្នែក', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_sub_dpt_name3', null, ['class'=>'form-control', 'placeholder'=>'ការិយាល័យ/ផ្នែក']); !!}
              {!! $errors->has('per_workhis_sub_dpt_name3')?$errors->first('per_workhis_sub_dpt_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_title_name3', 'មុខតំណែង', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_title_name3', null, ['class'=>'form-control', 'placeholder'=>'មុខតំណែង']); !!}
              {!! $errors->has('per_workhis_title_name3')?$errors->first('per_workhis_title_name3'):'' !!}
            </div>
          </div>
        </div>
      </div>
            <!-- End_WorkingHistory -->

            <!-- Medal -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ឆ. ការលើសរសើរ ជូនវង្វាន់ និងផ្ដល់គ្រឿងឥស្សរិយយស</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-12 col-ms-12">
              {!! Form::label('staff_medal_tittle', 'បរិយាយ', ['class'=>'control-label']); !!}
              {!! Form::textarea('staff_medal_tittle', null, ['class'=>'form-control', 'placeholder'=>'បរិយាយ']); !!}
              {!! $errors->has('staff_medal_tittle')?$errors->first('staff_warning_desc'):'' !!}
            </div>
          </div>
        </div>
      </div>
            <!-- End_Medal -->

             <!-- Warning -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ជ. ការទទួលពិន័យ ឬព្រមាន</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-12 col-ms-12">
              {!! Form::label('staff_warning_desc', 'បរិយាយ', ['class'=>'control-label']); !!}
              {!! Form::textarea('staff_warning_desc', null, ['class'=>'form-control', 'placeholder'=>'បរិយាយ']); !!}
              {!! $errors->has('staff_warning_desc')?$errors->first('staff_warning_desc'):'' !!}
            </div>
          </div>
        </div>
      </div>
            <!-- End_Warning -->
            
      <div class="form-group">
        {!! Form::label('file_ref[]', 'ឯកសារពាក់ព័ន្ធ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::file('file_ref[]', ['class' => 'field', 'multiple' => 'multiple', 'accept' => '.pdf', 'max' => '10000']) !!}
          {!! $errors->has('file_ref')?$errors->first('file_ref'):'' !!}
          {!! Form::hidden('record_stat', 'a', ['class'=>'form-control']); !!}
        </div>
      </div> 

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a type="button" class="btn btn-default" href='/staffinfo'>ថយក្រោយ</a>
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection