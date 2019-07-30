<?php

namespace App\Http\Controllers;

use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $events = [];
        $data = Event::all();

        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title, false, new \DateTime($value->start_date), new \DateTime($value->end_date.' +1 day'), null,
                    ['color' => $value->color, 'url' => 'pass here url and any route',]
                );
            }
        }

        $calendar = Calendar::addEvents($events);

        return view('eventpage', compact('events', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    public function showform()
    {
        return view('addevent');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store()
    {
        Event::create($this->validateRequest());
        return redirect('events')->with('success', 'Event added successfully');
    }

    /**
     * Display the specified resource.
     * @param $id
     */
    public function show()
    {
        $events = Event::all();
        return view('display')->with('events', $events);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $events=Event::find($id);
        return view('editform', compact('events','id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Event $event
     */
    public function update(Event $event)
    {
        $event->update($this->validateRequest());
        return redirect('events')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Event $event
     */
    public function destroy(Event $event)
    {
        //
    }

    private function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
    }
}
