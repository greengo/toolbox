@extends('layouts.app')

{{-- Web site Title --}}
@section('title')
@parent
Suggest Feature
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-10">


            <h2>New Feature</h2>

            <div class="form">
              {!! Form::open(array('route' => 'features.store', 'class' => 'cmxform form-horizontal')) !!}


                {!! Form::hidden('created_by', Auth::user()->id) !!}

                @include('features._formcreate', ['submitText' => 'Save Feature'])

            {!! Form::close() !!}
          </div>



    </div>
</div>


@stop
