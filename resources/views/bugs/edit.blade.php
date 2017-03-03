@extends('layouts.app')

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-10">


            <h2>Edit Bug</h2>

            <div class="form">
              {!! Form::model($bug, ['method' => 'PATCH', 'action' => ['BugsController@update', $bug->id], 'class' => 'cmxform form-horizontal']) !!}

                @if(Auth::user()->id == $bug->assigned_to)

                <div class="form-group @if ($errors->has('status')) has-error @endif">
                    {!! Form::label('status', 'Status:', array('class' => 'control-label col-lg-3')) !!}
                    <div class="col-lg-6">
                      {!! Form::select('status', [null => 'Please Select'] + Greengo\Models\BugStatus::all()->pluck('title', 'id')->toArray(), null, array('class' => 'form-control')) !!}
                      {{ ($errors->has('status') ?  $errors->first('status') : '') }}
                    </div>
                </div>

                @endif
                
                @include('bugs._form', ['submitText' => 'Update Bug'])

            {!! Form::close() !!}
          </div>



    </div>
</div>


@stop
