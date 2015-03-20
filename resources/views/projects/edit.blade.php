@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Bug
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-10">


            <h2>Edit Bug</h2>

            <div class="form">
              {!! Form::model($bug, ['method' => 'PATCH', 'action' => ['BugsController@update', $bug->id], 'class' => 'cmxform form-horizontal']) !!}

                @include('bugs._form', ['submitText' => 'Update Bug'])

            {!! Form::close() !!}
          </div>



    </div>
</div>


@stop
