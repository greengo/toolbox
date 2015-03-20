@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Bugs
@stop

{{-- Content --}}
@section('content')
<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
            <div class='btn-group'>
                <a class='btn btn-primary' href="{{ route('bugs.create') }}">Register BUG</a>
            </div>
        </div>
        <h1>BUGS</h1>
    </div>
</div>

<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <th>Title</th>
                <th>Project</th>
                <th>Created By</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Options</th>
            </thead>
            <tbody>
            @foreach ($bugs as $bug)
                <tr>
                    <td><a href="{{ action('BugsController@show', array($bug->id)) }}">{{ $bug->title }}</a></td>
                    <td>{{ Greengo\Models\Project::findOrFail($bug->project)->title }} </td>
                    <td>{{ Greengo\User::findOrFail($bug->created_by)->FullName }} </td>
                    <td>{{ Greengo\User::findOrFail($bug->assigned_to)->FullName }} </td>
                    <td>{{ $bug->status }} </td>
                    <td>
                      <button class="btn btn-default action_confirm" href="{{ action('BugsController@destroy', array($bug->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>

                      {{--
                        <button class="btn btn-default" type="button" onClick="location.href='{{ action('\\Sentinel\Controllers\UserController@edit', array($user->hash)) }}'">Edit</button>
                        @if ($user->status != 'Suspended')
                            <button class="btn btn-default" type="button" onClick="location.href='{{ action('\\Sentinel\Controllers\UserController@suspend', array($user->hash)) }}'">Suspend</button>
                        @else
                            <button class="btn btn-default" type="button" onClick="location.href='{{ action('\\Sentinel\Controllers\UserController@unsuspend', array($user->hash)) }}'">Un-Suspend</button>
                        @endif
                        @if ($user->status != 'Banned')
                            <button class="btn btn-default" type="button" onClick="location.href='{{ action('\\Sentinel\Controllers\UserController@ban', array($user->hash)) }}'">Ban</button>
                        @else
                            <button class="btn btn-default" type="button" onClick="location.href='{{ action('\\Sentinel\Controllers\UserController@unban', array($user->hash)) }}'">Un-Ban</button>
                        @endif
                        <button class="btn btn-default action_confirm" href="{{ action('\\Sentinel\Controllers\UserController@destroy', array($user->hash)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
                      --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
