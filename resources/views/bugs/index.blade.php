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
        testing
    </div>
</div>
@stop
