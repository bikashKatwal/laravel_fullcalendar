@extends('layout')
@section('title','Event Calendar')
@section('content')
    <!-- Calendar Modal -->
    <div class="modal fade" id="ShowCalendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event Calendar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="calendar">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.js"></script>

                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="AddEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/events" method="POST">
                        @csrf
                        <label for="title">Enter Name of Event</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="title" value="{{ old('title') }}"
                               placeholder="Enter a name of the event"/><br/><br/>

                        <label for="color">Enter Color</label>
                        <input type="color" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="color" value="{{ old('color') }}"
                               placeholder="Enter the color"/><br/><br/>

                        <label for="start_date">Enter Start Date</label>
                        <input type="datetime-local" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="start_date" value="{{ old('start_date') }}"
                               placeholder="Enter Start Date"/><br/><br/>

                        <label for="end_date">Enter End Date</label>
                        <input type="datetime-local" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                               name="end_date" value="{{ old('end_date') }}"  placeholder="Enter End Date"/><br/><br/>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>

                    @include('errors')
                </div>

            </div>
        </div>
    </div>


    <div class="card">
        <h5 class="card-header">Event Calendar with Bootstrap Modal</h5>
        <div class="card-body">
            <h5 class="card-title text-right"><!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ShowCalendar">
                    Show Calendar
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddEvent">
                    Add Event
                </button>

            </h5>

        </div>
    </div>

@endsection
