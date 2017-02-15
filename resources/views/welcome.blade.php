@extends('layouts.app')

{{-- Content --}}
@section('content')
<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
            {{--<div class='btn-group'>
                <a class='btn btn-primary' href="{{ route('bugs.create') }}">Register BUG</a>
            </div>--}}
        </div>
        <h1>Welcome</h1>
    </div>
</div>

<div class="row">
    <div class="table-responsive">
        This site enables GreenGo's Test Users to report BUGS, Submit Feature Requests, and in general follow the progress of our Software Projects.
    </div>
</div>
@stop
