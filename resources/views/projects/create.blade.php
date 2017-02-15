@extends('layouts.app')

{{-- Web site Title --}}
@section('title')
@parent
Create Project
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-10">


            <h2>New Project</h2>

            <div class="form">
              {!! Form::open(array('route' => 'projects.store', 'class' => 'cmxform form-horizontal')) !!}


                {!! Form::hidden('created_by', Auth::user()->id) !!}

                @include('projects._form', ['submitText' => 'Save Project'])

            {!! Form::close() !!}
          </div>



    </div>
</div>


@stop
