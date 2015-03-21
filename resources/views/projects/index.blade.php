@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Projects
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
            <div class='btn-group'>
                <a class='btn btn-primary' href="{{ route('projects.create') }}">Create Project</a>
            </div>
        </div>
        <h1>Projects</h1>
    </div>
</div>

<div class="row">

  @if( count($projects) > 0 )
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <th>Title</th>
                <th>Description</th>
                <th>Options</th>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td><a href="{{ action('ProjectsController@show', array($project->id)) }}">{{ $project->title }}</a></td>
                    <td>{{ $project->description }} </td>
                    <td>
                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('ProjectsController@edit', array($project->id)) }}'">Edit</button>
                          <button class="btn btn-default action_confirm" href="{{ action('ProjectsController@destroy', array($project->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
      No projects matched your criteria.
    @endif

</div>
@stop
