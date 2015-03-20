@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Report Bug
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-10">


            <h2>New Bug</h2>

            <div class="form">
              {!! Form::open(array('route' => 'bugs.store', 'class' => 'cmxform form-horizontal')) !!}


                {!! Form::hidden('created_by', Sentry::getUser()->id) !!}

                @include('bugs._form', ['submitText' => 'Save Bug'])

            {!! Form::close() !!}
          </div>



    </div>
</div>


@stop
