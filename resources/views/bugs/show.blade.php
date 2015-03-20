@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<div class="row">
    <div class='page-header'>
        <h1>{{ $bug->title }}</h1>
    </div>
</div>


<div class="row">
  <div class="col-lg-10">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <th>Key</th>
                <th>Value</th>
            </thead>
            <tbody>
                <tr><td>Project</td><td>{{ Greengo\Models\Project::findOrFail($bug->project)->title }}</td></tr>
                <tr><td>Date Created</td><td>{{ $bug->created_at }}</td></tr>
                <tr><td>Created By</td><td>{{ Greengo\User::findOrFail($bug->created_by)->FullName }}</td></tr>
                <tr><td>Assigned To</td><td>{{ Greengo\User::findOrFail($bug->assigned_to)->FullName }}</td></tr>
                <tr><td>Status</td><td>{{ $bug->status }}</td></tr>
                <tr><td>Steps To Reproduce</td><td>{{ $bug->repro_steps }}</td></tr>
                <tr><td>Expected Behaviour</td><td>{{ $bug->expected_behaviour }}</td></tr>
                <tr><td>Observed Behaviour</td><td>{{ $bug->observed_behaviour }}</td></tr>
                <tr><td>Closed</td><td>@if(!$bug->closed) no @else yes @endif</td></tr>

            </tbody>
        </table>
    </div>
    <div class='btn-group'>
        <a class='btn btn-primary' href="{{ route('bugs.edit', [$bug->id]) }}">Edit Bug</a>
    </div>
  </div>
</div>


@stop
