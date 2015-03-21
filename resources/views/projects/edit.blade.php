@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Project
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-10">


            <h2>Edit Project</h2>

            <div class="form">
              {!! Form::model($project, ['method' => 'PATCH', 'action' => ['ProjectsController@update', $project->id], 'class' => 'cmxform form-horizontal']) !!}

                @include('projects._form', ['submitText' => 'Update Project'])

            {!! Form::close() !!}
          </div>



    </div>
</div>


@stop
