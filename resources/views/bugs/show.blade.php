@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class='page-header'>
        <h1>{{ $bug->title }}</h1>
    </div>
</div>


<div class="row">
  <div class="col-lg-10">
    <div class="table-responsive">

        <p><b>Project: </b>{{ Greengo\Models\Project::findOrFail($bug->project)->title }}</p>
        <p><b>Date Created: </b>{{ $bug->created_at }}</p>
        <p><b>Created By: </b>{{ Greengo\User::findOrFail($bug->created_by)->FullName }}</p>
        <p><b>Assigned To: </b>{{ Greengo\User::findOrFail($bug->assigned_to)->FullName }}</p>
        <p><b>Status: </b>@if(is_null($bug->status)) none @else {{ Greengo\Models\BugStatus::findOrFail($bug->status)->title }} @endif</td></tr>
        <p><b>Steps To Reproduce: </b>{!! nl2br($bug->repro_steps) !!}</p>
        <p><b>Expected Behaviour: </b>{{ nl2br($bug->expected_behaviour) }}</p>
        <p><b>Observed Behaviour: </b>{{ nl2br($bug->observed_behaviour) }}</p>
        <p><b>Closed: </b>@if(!$bug->closed) no @else yes @endif</p>


    <div class='btn-group'>
        @if ($bug->created_by == Sentry::getUser()->id)
          <a class='btn btn-primary' href="{{ route('bugs.edit', [$bug->id]) }}">Edit Bug</a>
        @endif
        @if ($bug->assigned_to == Sentry::getUser()->id)
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusForm">Set Status</button>
        @endif

    </div>
  </div>
</div>

@stop

<!-- Modal -->
<div class="modal fade" id="statusForm" tabindex="-1" role="dialog" aria-labelledby="Set Status" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        {!! Form::model($bug, array('method' => 'PATCH', 'action' => ['BugsController@update', $bug->id], 'class' => 'cmxform form-horizontal')) !!}

        <div class="form-group @if ($errors->has('project')) has-error @endif">
            {!! Form::label('status', 'Project:', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
              {!! Form::select('status', [null => 'Please Select'] + Greengo\Models\BugStatus::all()->lists('title', 'id'), null, array('class' => 'form-control')) !!}
              {{ ($errors->has('status') ?  $errors->first('status') : '') }}
            </div>
        </div>

        @include('errors.list')


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
          {!! Form::submit('Save Status', array('class' => 'btn btn-primary')) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
