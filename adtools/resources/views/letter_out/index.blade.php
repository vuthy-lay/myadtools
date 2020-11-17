@extends('layouts.app')

@section('content')
<?php
  $LetterCharKh = (new \App\Helpers\helpers)->LetterCharKh();
  $LetterPriorityKh = (new \App\Helpers\helpers)->LetterPriorityKh();
  $LetterTypeKh = (new \App\Helpers\helpers)->LetterTypeKh();
  //var_dump($LetterCharKh['k']);
?>
<div class="row col-md-2 pull-right">
    <a type="button" class="btn btn-block btn-primary btn-flat" href='/letterout_create'>ការបង្កើតថ្មី</a>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">លិខិតចេញ</h3>

        <div class="box-tools" style="width: 300px;">
          {!! Form::open(['url'=>'letterout', 'method'=>'get', 'class'=>'form-horizontal']) !!}
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
            <th>លេខរៀង</th>
            <th>លេខកូត</th>
            <th>ចំណងជើង</th>
            <th>អាទិភាព</th>
            <th>គោលដៅ</th>
            <th>កាលបរិច្ឆេទ</th>
            <th>ប្រភេទ</th>
            <th>ស្ថានភាព</th>
            <th>សកម្មភាព</th>
          </tr>
          @foreach($letterouts as $item)
          <tr>
            <td>{{ $item->seq }}</td>
            <td>{{ $item->letter_code }}</td>
            <td>{{ $item->letter_subject }}</td>
            <td>{{ $LetterPriorityKh[$item->letter_priority] }}</td>
            <td>{{ $item->letter_distination }}</td>
            <td>{{ $item->letter_date }}</td>
            <td>{{ $LetterTypeKh[$item->letter_type] }}</td>
            @if($item->record_stat == 'r')              
              <td><span class="label label-danger">{{ $item->record_stat }}</td>
            @else
              <td><span class="label label-success">{{ $item->record_stat }}</td>
            @endif
            <td>
              <div class="pull-left">
                <a type="button" class="btn btn-info" href="/letterout_show/{{ $item->letter_code }}"><i class="fa fa-newspaper-o"></i> ព័ត៌មានលំអិត</a>
                <a remove-code="{{ $item->letter_code }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash-o"></i> លុប</a>
              </div>
            </td>
          </tr>
          @endforeach
        </table>
        {!! $letterouts->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- modal-dialog -->
  <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ការបញ្ជាក់</h4>
        </div>
        <form method="post" action="{{config('app.url_ip')}}/letterout_remove">
          <div class="modal-body">
            <p id="txtconfirm_text" class="uk-modal-title">តើអ្នកនឹងធ្វើការលុបទិន្នន័យមួយនេះឬ?</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="md-input" id="txtitem_code_remove_hidden" name="txtitem_code_remove_hidden"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">បិទ</button>
            <button type="submit" class="btn btn-outline">រក្សាទុក</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script src="{{ URL::asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script>
    $(document).ready(function() {
        $("a[remove-code]").click(function() {
            var tmp_item_code = $(this).attr("remove-code");
            $("#txtconfirm_text").text('តើអ្នកនឹងធ្វើការលុបទិន្នន័យដែលមានលេខកូត '+tmp_item_code+' នេះឬ?');
            $('#txtitem_code_remove_hidden').val(tmp_item_code);
        });
    });
  </script>
</div>
@endsection
