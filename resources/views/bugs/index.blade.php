@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Bugs
@stop

@section('css')

<link rel="stylesheet" href="{{ asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css') }}">

<style>
  body { font-size: 140%; }
</style>

@stop


{{-- Content --}}
@section('content')
<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
            <div class='btn-group'>
                <a class='btn btn-primary' href="{{ route('bugs.create') }}">Report BUG</a>
            </div>
        </div>
        <h1>BUGS</h1>
    </div>
</div>

<div class="row">

  @if( count($bugs) > 0 )
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover">
            <thead>
                <th>Title</th>
                <th>Project</th>
                <th>Priority</th>
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
                    <td>{{ $bug->priority }} </td>
                    <td>{{ Greengo\User::findOrFail($bug->created_by)->FullName }} </td>
                    <td>{{ Greengo\User::findOrFail($bug->assigned_to)->FullName }} </td>
                    <td>@if(is_null($bug->status)) none @else {{ Greengo\Models\BugStatus::findOrFail($bug->status)->title }} @endif</td>
                    <td><div class="btn-group text-nowrap">

                      @if ($bug->created_by == Sentry::getUser()->id)
                        @if ($bug->closed == 0)
                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('BugsController@close', array($bug->id)) }}'">Close</button>
                        @elseif($bug->closed == 1)
                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('BugsController@open', array($bug->id)) }}'">Open</button>
                        @endif
                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('BugsController@edit', array($bug->id)) }}'">Edit</button>
                          <button class="btn btn-default action_confirm" href="{{ action('BugsController@destroy', array($bug->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
                      @endif

                      </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
      No bugs matched your criteria.
    @endif

</div>
@stop

@section('js')

<script src="{{ asset('//code.jquery.com/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    console.log('lets rock!');
    $('#example').dataTable();
  });

</script>
@stop
