@extends('layouts.app')

{{-- Web site Title --}}
@section('title')
@parent
View Project
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
          <div class='btn-group'>
              {{-- only for admins? --}}
                <a class='btn btn-primary' href="{{ route('projects.edit', [$project->id]) }}">Edit Project</a>
          </div>
        </div>

        <h1>{{ $project->title }}</h1>
    </div>
</div>


<div class="row">
  <div class="col-lg-10 col-sm-10">

        <p><b>Title: </b>{{ $project->title }}</p>
        <p><b>Description: </b>{{ $project->description }}</p>

  </div>
</div>

@stop
