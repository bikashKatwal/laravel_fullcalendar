@extends('layout')
@section('title','Edit Event')
@section('content')
    <div class="container" style="margin-top: 5em">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #2e6da4; color: white">
                    Update Event Calendar
                </div>
                <div class="panel-body">
                    <h1>Task: Update Event</h1>

                    <form action="{{ action('EventController@update', $id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <label for="title">Enter Name of Event</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="title" value="{{ $events->title }}"
                               placeholder="Enter a name of the event"/><br/><br/>

                        <label for="color">Enter Color</label>
                        <input type="color" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="color" value="{{ $events->color }}"
                               placeholder="Enter the color"/><br/><br/>

                        <label for="start_date">Enter Start Date</label>
                        <input type="datetime-local" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="start_date" value="{{ $events->start_date }}"
                               placeholder="Enter Start Date"/><br/><br/>

                        <label for="end_date">Enter End Date</label>
                        <input type="datetime-local" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="end_date" value="{{ $events->end_date }}"  placeholder="Enter End Date"/><br/><br/>

                        <input type="submit" name="submit" class="btn btn-primary" value="Update"/>
                    </form>

                    @include('errors')
                </div>
            </div>
        </div>
    </div>
@endsection

