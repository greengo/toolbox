@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Features
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
                <a class='btn btn-primary' href="{{ route('features.create') }}">Suggest Feature</a>
            </div>
        </div>
        <h1>Features</h1>
    </div>
</div>

<div class="row">
  {{--
    $table->string('title');
    $table->text('description');
    $table->integer('created_by');
    $table->integer('assigned_to');
    $table->integer('project');
    $table->integer('project_category');
    $table->integer('priority');
    $table->integer('status')->nullable();
    $table->integer('progress');
    $table->string('software_version');
    $table->boolean('closed')->default(0);

    --}}

  @if( count($features) > 0 )
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover">
            <thead>
                <th style="width:20%">Title</th>
                <th>Project</th>
                <th>Created By</th>
                <th>Progress</th>
                <th style="width:20%">Options</th>
            </thead>
            <tbody>
            @foreach ($features as $feature)
                <tr>
                    <td><a href="{{ action('FeaturesController@show', array($feature->id)) }}">{{ $feature->title }}</a></td>
                    <td>{{ Greengo\Models\Project::findOrFail($feature->project)->title }} </td>
                    <td>{{ Greengo\User::findOrFail($feature->created_by)->FullName }} </td>
                    <td>{{ $feature->progress }}% </td>
                    <td><span class="btn-group text-nowrap">


                      @if ($feature->created_by == Sentry::getUser()->id)
                          <button class="btn btn-default" type="button" onClick="location.href='{{ action('FeaturesController@edit', array($feature->id)) }}'">Edit</button>
                          <button class="btn btn-default action_confirm" href="{{ action('FeaturesController@destroy', array($feature->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
                      @endif

                    </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
      No features matched your criteria.
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
