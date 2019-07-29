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
                        <td><a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success">Edit</a>
                        </td>
                        <td><a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
