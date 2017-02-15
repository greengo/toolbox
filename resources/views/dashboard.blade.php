@extends('layouts/app')

{{-- Content --}}
@section('content')
<div class="row">
    <div class='page-header'>
        <div class='btn-toolbar pull-right'>
            {{--<div class='btn-group'>
                <a class='btn btn-primary' href="{{ route('bugs.create') }}">Register BUG</a>
            </div>--}}
        </div>
        <h1>Dashboard</h1>
    </div>
</div>

<div class="row">

  <div class="col-md-3">
    <h4>Backlog</h4>
    @if(isset($features))
      @foreach($features as $feature)
        @if($feature->progress == 0)
          <p>Feature: <a href="{!! action('\\Greengo\Http\Controllers\FeaturesController@show', [$feature->id]) !!}">{!!$feature->title!!}</a></p>
        @endif
      @endforeach
    @else
      n/a
    @endif
  </div>

  <div class="col-md-3">
    <h4>Sprint</h4>
    @if(isset($features))
      @foreach($features as $feature)
        @if($feature->progress > 0 && $feature->progress < 100 )
          <p>Feature: <a href="{!! action('\\Greengo\Http\Controllers\FeaturesController@show', [$feature->id]) !!}">{!!$feature->title!!}</a></p>
        @endif
      @endforeach
    @else
      n/a
    @endif

    {{--<p>Tasks being done.</p>--}}
  </div>

  <div class="col-md-3">
    <h4>Test</h4>
    @if(isset($features))
      @foreach($features as $feature)
        @if($feature->progress ==100)
          <p>Feature: <a href="{!! action('\\Greengo\Http\Controllers\FeaturesController@show', [$feature->id]) !!}">{!!$feature->title!!}</a></p>
        @endif
      @endforeach
    @else
      n/a
    @endif
  </div>

  <div class="col-md-3">
    <h4>Done</h4>
    @if(isset($features))
      @foreach($features as $feature)
        @if($feature->closed == 1)
          <p>Feature: <a href="{!! action('\\Greengo\Http\Controllers\FeaturesController@show', [$feature->id]) !!}">{!!$feature->title!!}</a></p>
        @endif
      @endforeach
    @else
      n/a
    @endif

    @if(isset($features))
      @foreach($bugs as $bug)
        @if($bug->closed == 1)
          <p>Bug: <a href="{!! action('\\Greengo\Http\Controllers\BugsController@show', [$bug->id]) !!}">{!!$bug->title!!}</a></p>
        @endif
      @endforeach
    @else
      n/a
    @endif
  </div>



</div>

{{--<div class="table-responsive">
    This site enables GreenGo's Test Users to report BUGS, Submit Feature Requests, and in general follow the progress of our Software Projects.
</div>--}}
@stop
