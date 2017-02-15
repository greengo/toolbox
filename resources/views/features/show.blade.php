@extends('layouts.app')

{{-- Web site Title --}}
@section('title')
@parent
View Feature
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
          <div class='btn-group'>
              @if ($feature->created_by == Auth::user()->id)
                <a class='btn btn-primary' href="{{ route('features.edit', [$feature->id]) }}">Edit Feature</a>
              @endif
              @if ($feature->assigned_to == Auth::user()->id)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusForm">Set Status</button>
              @endif
          </div>
        </div>

        <h1>{{ $feature->title }}</h1>
    </div>
</div>


<div class="row">
  <div class="col-lg-10 col-sm-10">

        <p><b>Project: </b>{{ Greengo\Models\Project::findOrFail($feature->project)->title }}</p>
        <p><b>Date Created: </b>{{ $feature->created_at }}</p>
        <p><b>Created By: </b>{{ Greengo\User::findOrFail($feature->created_by)->FullName }}</p>
        @if($feature->assigned_to > 0)<p><b>Assigned To: </b>{{ Greengo\User::findOrFail($feature->assigned_to)->FullName }}</p>@endif
        <p><b>Priority: </b>{{ $feature->priority }}</p>
        <p><b>Status: </b>@if(is_null($feature->status)) none @else {{ Greengo\Models\FeatureStatus::findOrFail($feature->status)->title }} @endif</td></tr>
        <p><b>Progress: </b>{{ $feature->progress }}%</p>
        <p><b>Description: </b>{!! nl2br($feature->description) !!}</p>
        <p><b>Closed: </b>@if(!$feature->closed) no @else yes @endif</p>

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
        {!! Form::model($feature, array('method' => 'PATCH', 'action' => ['FeaturesController@update', $feature->id], 'class' => 'cmxform form-horizontal')) !!}

        <div class="form-group @if ($errors->has('status')) has-error @endif">
            {!! Form::label('status', 'Project:', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
              {!! Form::select('status', [null => 'Please Select'] + Greengo\Models\FeatureStatus::all()->pluck('title', 'id')->toArray(), null, array('class' => 'form-control')) !!}
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
