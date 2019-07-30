@extends('layout')

@section('title','List of Events')

@section('content')

        <h2>Event Calendar [Full Calendar]</h2>

        <div class="row" style="margin-top: 2em">
            <a href="/addeventurl" class="btn btn-success" style="margin-right: 5px">Add Events</a>
            <a href="/displaydata" class="btn btn-primary" style="margin-right: 5px">Edit Events</a>
            <a href="/deleteevent" class="btn btn-danger">Delete Events</a>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #2e6da4; color: white">
                        Event Calendar [Full Calendar]
                    </div>
                    <div class="card col-lg-12">
                        <div class="card-body">
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        @include('errors')


@endsection

