@extends('layout')
@section('title','Add Events')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead">
                <tr class="warning">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Color</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Update / Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @foreach($events as $event)
                    <tbody>
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->color}}</td>
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->end_date}}</td>
                        <th><a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success">Edit</a>
                        </th>
                        <th>
                            <form method="POST" action="{{ action('EventController@destroy',$event['id']) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
