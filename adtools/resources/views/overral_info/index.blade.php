@extends('layouts.app')

@section('content')
<?php
  $LetterCharKh = (new \App\Helpers\helpers)->LetterCharKh();
  $LetterRoute = (new \App\Helpers\helpers)->LetterRoute();
  $LetterTypeKh = (new \App\Helpers\helpers)->LetterTypeKh();
  //var_dump($LetterCharKh['k']);
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">ព័ត៌មានទូទៅ</h3>

        <div class="box-tools" style="width: 300px;">
          {!! Form::open(['url'=>'overralinfo', 'method'=>'get', 'class'=>'form-horizontal']) !!}
          <div class="input-group input-group">
                <div class="radio">
                  <label>
                    <input type="radio" name="rbtnsearchby" checked value="lcode"> លេខកូត
                  </label>
                  <label>
                    <input type="radio" name="rbtnsearchby" value="lsub"> ចំណងជើង
                  </label>
                </div>
                <div class="row">
                  <div class='col-md-10 col-sm-10'>
                    <input type="text" name="table_search" class="form-control pull-left" placeholder="ស្វែងរក">
                  </div>
                  <div class='col-md-2 col-sm-2'>
                    <button type="submit" class="btn btn-default pull-right"><i class="fa fa-search"></i></button>
                  </div>
                </div>
          </div>
          {!! Form::close() !!}
        </div>
        
      </div>
      <!-- /.box-header -->
      </br> </br>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>លេខកូត</th>
            <th>ចំណងជើង</th>
            <th>លក្ខណៈ</th>
            <th>កាលបរិច្ឆេទ</th>
            <th>ប្រភេទ</th>
            <th>ស្ថានភាព</th>
            <th>សកម្មភាព</th>
          </tr>
          @foreach($letterdets as $item)
          <tr>
            <td>{{ $item->letter_code }}</td>
            <td>{{ $item->letter_subject }}</td>
            <td>{{ $LetterCharKh[$item->letter_char] }}</td>
            <td>{{ $item->letter_date }}</td>
            <td>{{ $LetterTypeKh[$item->letter_type] }}</td>
            @if($item->record_stat == 'r')              
              <td><span class="label label-danger">{{ $item->record_stat }}</td>
            @else
              <td><span class="label label-success">{{ $item->record_stat }}</td>
            @endif
            <td>
              <div class="pull-left">
                <a type="button" class="btn btn-info" href="/{{ $LetterRoute[$item->letter_type] }}/{{ $item->letter_code }}"><i class="fa fa-newspaper-o"></i> ព័ត៌មានលំអិត</a>
              </div>
            </td>
          </tr>
          @endforeach
        </table>
        {!! $letterdets->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  </div>
</div>
@endsection
