
<div class="form-group @if ($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::text('title', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('title') ?  $errors->first('title') : '') }}
    </div>
</div>

<div class="form-group @if ($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Description:', array('class' => 'control-label col-lg-3')) !!}
    <div class="col-lg-6">
      {!! Form::text('description', null, array('class' => 'form-control')) !!}
      {{ ($errors->has('description') ?  $errors->first('description') : '') }}
    </div>
</div>


<div class="form-group">
    <div class="col-lg-offset-3 col-lg-6">
      {!! Form::submit($submitText, array('class' => 'btn btn-primary')) !!}
      {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) !!}
    </div>
</div>
