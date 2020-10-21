<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\EventSpeaker;

use App\Http\Requests\EventValidation;
use Redirect;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arrEvents = Event::all();

        return view('backend.events.index',compact('arrEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventValidation $request)
    {
        //

        Event::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Event Added Succesfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objEvent = Event::findOrFail($id);

        return view('backend.events.show',compact('objEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objEvent = Event::findOrFail($id);

        $string_date = strtotime($objEvent->start_date);

        //print_r(date("j F: Y: g:i a",$string_date)); die;

        return view('backend.events.edit',compact('objEvent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventValidation $request, $id)
    {
        $objEvent = Event::findOrFail($id);
        $objEvent->update($request->all());
        return Redirect::back()->with('sucessMSG', 'Event Updated Succesfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Event::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Event Deleted Succesfully !');
    }

    public function EventSpeakers($event_id)
    {
        // show all speeaker depending on event
        $objEvent = Event::find($event_id);
        $arrEventSpeakers = $objEvent->Speakers; 

        $arrSpeakers = Speaker::all();

        return view('backend.events.event_speakers',compact('objEvent','arrEventSpeakers','arrSpeakers','event_id'));
    }

    public function StoreEventSpeakers(request $request)
    {
        EventSpeaker::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Event Speaker Added Succesfully !');
    }

    public function DestroyEventSpeakers ($speaker_id,$event_id)
    {
        EventSpeaker::where('speaker_id',$speaker_id)
        ->where('event_id',$event_id)->first()->delete();

        return Redirect::back()->with('sucessMSG', 'Event Speaker Deleted Succesfully !');
    }

    public function EventPhotos($event_id)
    {
        return view('backend.events.event_photos');
    }
}
