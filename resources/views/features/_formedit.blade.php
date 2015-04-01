
{{--
$table->string('title');
$table->text('description');
$table->integer('created_by');
$table->integer('assigned_to');
$table->integer('project');
$table->integer('project_category');
$table->integer('priority');
$table->integer('status')->nullable();
$table->integer('progress');
$table->string('software_version');
$table->boolean('closed')->default(0);
--}}


<div class="form-group @if ($errors->has('project')) has-error @endif">
    {!! Form::label('project', 'Project:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::select('project', [null => 'Please Select'] + Greengo\Models\Project::all()->lists('title', 'id'), null, array('class' => 'form-control')) !!}
      {{ ($errors->has('project') ?  $errors->first('project') : '') }}
    </div>
</div>


<div class="form-group @if ($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::text('title', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('title') ?  $errors->first('title') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Feature Detailed Description:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('description') ?  $errors->first('repro_steps') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('priority')) has-error @endif">
    {!! Form::label('priority', 'Priority:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::select('priority', [3 => 'low', 2 => 'normal', 1 => 'high'], null, ['class' => 'form-control']) !!}
      {{ ($errors->has('priority') ?  $errors->first('priority') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('progress')) has-error @endif">
    {!! Form::label('progress', 'Progress(1-100):', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::text('progress', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('progress') ?  $errors->first('title') : '') }}
    </div>
</div>


<div class="form-group @if ($errors->has('assigned_to')) has-error @endif">
    {!! Form::label('assigned_to', 'Assigned To:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::select('assigned_to', [null => 'Please Select'] + Greengo\User::all()->lists('FullName', 'id'), null, array('class' => 'form-control')) !!}
      {{ ($errors->has('assigned_to') ?  $errors->first('assigned_to') : '') }}
    </div>
</div>



<div class="form-group">
    <div class="col-lg-offset-3 col-lg-6">
      {!! Form::submit($submitText, array('class' => 'btn btn-primary')) !!}
      {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) !!}
    </div>
</div>
