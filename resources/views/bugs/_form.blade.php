<div class="form-group @if ($errors->has('project')) has-error @endif">
    {!! Form::label('project', 'Project:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::select('project', [null => 'Please Select'] + Greengo\Models\Project::all()->lists('title', 'id'), null, array('class' => 'form-control')) !!}
      {{ ($errors->has('project') ?  $errors->first('project') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('assigned_to')) has-error @endif">
    {!! Form::label('assigned_to', 'Assigned To:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::select('assigned_to', [null => 'Please Select'] + Greengo\User::all()->lists('FullName', 'id'), null, array('class' => 'form-control')) !!}
      {{ ($errors->has('assigned_to') ?  $errors->first('assigned_to') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::text('title', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('title') ?  $errors->first('title') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('priority')) has-error @endif">
    {!! Form::label('priority', 'Priority:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::select('priority', ['low', 'normal', 'high'], 'low', ['class' => 'form-control']) !!}
      {{ ($errors->has('priority') ?  $errors->first('priority') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('repro_steps')) has-error @endif">
    {!! Form::label('repro_steps', 'Steps to reproduce the error:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::textarea('repro_steps', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('repro_steps') ?  $errors->first('repro_steps') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('expected_behaviour')) has-error @endif">
    {!! Form::label('expected_behaviour', 'Expected Behaviour:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::textarea('expected_behaviour', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('expected_behaviour') ?  $errors->first('expected_behaviour') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('observed_behaviour')) has-error @endif">
    {!! Form::label('observed_behaviour', 'Observed Behaviour:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::textarea('observed_behaviour', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('observed_behaviour') ?  $errors->first('observed_behaviour') : '') }}
    </div>
</div>



<div class="form-group">
    <div class="col-lg-offset-3 col-lg-6">
      {!! Form::submit($submitText, array('class' => 'btn btn-primary')) !!}
      {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) !!}
    </div>
</div>
