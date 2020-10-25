<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\EventSpeaker;
use App\Models\EventPhotos;
use App\Models\EventRegisterations;

use App\Http\Requests\EventValidation;
use Redirect;
use Mail;
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
        $objEvent = Event::findOrFail($event_id);
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
        $objEvent = Event::findOrFail($event_id);
        $arrEventPhotos = $objEvent->Photos;
        return view('backend.events.event_photos',compact('event_id','arrEventPhotos'));
    }

    public function StoreEventPhotos (request $request , $event_id)
    {
        $rules = $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png',
        ]);


        $objEventPhoto = new EventPhotos();
        $objEventPhoto->event_id = $event_id;
        $objEventPhoto->type = $request->type;

        
        $image = $request->image;
        $image_name = time().".".$image->getClientOriginalExtension();
        $destination = "images/event_photos";
        $image->move($destination,$image_name);

        $objEventPhoto->photo = $destination."/".$image_name;
        $objEventPhoto->save();

        return Redirect::back()->with('sucessMSG', 'Event Photo Added Succesfully !');

    }

    public function DestroyEventPhotos($id)
    {
        //
        EventPhotos::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Event Photo Deleted Succesfully !');
    }

    public function EventRegistrations($event_id)
    {
        $objEvent = Event::findOrFail($event_id);
        $arrRegistrations = $objEvent->Registrations;
        return view('backend.events.event_registrations',compact('event_id','arrRegistrations'));
    }

    public function UpdateEventRegister($event_registrations_id,$status)
    {
        // $objEventRegisterations = EventRegisterations::findOrFail($event_registrations_id);

        // $objEventRegisterations->status = $status;

        // $objEventRegisterations->save();  /// update

        // return Redirect::back()->with('sucessMSG', 'Event Registration Updated Succesfully !');

        # to send email with gmail 

        # 1- create gmail account 
        # 2- setting  >> security (https://myaccount.google.com/security?gar=1)
        #3- search for Less secure app access and turn it on 
        $data = array();
        $strEmail = "mahmoud.ali.29992@gmail.com";
        Mail::send('emails.accepted_event_register', $data, function ($message)use($strEmail) {
            $message->subject('Accepted Register');
            $message->from('mahmoud.ali.29992@gmail.com', 'Mahmoud ali');
            $message->to($strEmail);
        });



    }
}
