<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\Event;
use App\Models\EventSpeaker;

use App\Http\Requests\SpeakerValidation;
use Redirect;
class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrSpeakers=  Speaker::all();
        return view('backend.speakers.index',compact('arrSpeakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpeakerValidation $request)
    {
        Speaker::create($request->all());
        return Redirect::back()->with('sucessMSG','Speaker Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objSpeaker = Speaker::findOrFail($id);
        return view('backend.speakers.show',compact('objSpeaker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objSpeaker = Speaker::findOrFail($id);
        return view('backend.speakers.edit',compact('objSpeaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpeakerValidation $request, $id)
    {
        $objSpeaker = Speaker::findOrFail($id);
        $objSpeaker ->update($request -> all());
        return Redirect::back()->with('sucessMSG', 'Speaker Updated Succesfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Speaker::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG','Speaker deleted Added Successfully !');
    }

    public function SpeakerEvents($speaker_id)
    {
        // show all speeaker depending on event
        $objSpeaker = Speaker::find($speaker_id);
        
        $arrSpeakerEvents = $objSpeaker->Events; 
        $arrEvents = Event::all();

 

        return view('backend.speakers.speaker_events',compact('objSpeaker','arrSpeakerEvents','arrEvents','speaker_id'));
    }

    public function StoreSpeakerEvents(request $request)
    {
        EventSpeaker::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Speaker Event Added Succesfully !');
    }

    public function DestroySpeakerEvents ($speaker_id,$event_id)
    {
        EventSpeaker::where('event_id',$event_id)
        ->where('speaker_id',$speaker_id)->first()->delete();
        return Redirect::back()->with('sucessMSG', 'Speaker Event  Deleted Succesfully !');
    }
}
