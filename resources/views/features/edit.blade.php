@extends('layouts.app')

{{-- Web site Title --}}
@section('title')
@parent
Edit Feature
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-10">


            <h2>Edit Feature</h2>

            <div class="form">
              {!! Form::model($feature, ['method' => 'PATCH', 'action' => ['FeaturesController@update', $feature->id], 'class' => 'cmxform form-horizontal']) !!}

                @include('features._formedit', ['submitText' => 'Update Feature'])

            {!! Form::close() !!}
          </div>



    </div>
</div>


@stop
