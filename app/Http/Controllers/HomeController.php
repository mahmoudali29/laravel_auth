<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Slider;
use App\Models\Registration;
use App\Models\EventRegisterations;
use App\http\Requests\EventRegisterValidate;
use Redirect;
use App\Http\Requests\Register;
use App\Models\Event;
class HomeController extends Controller
{
    //
    public function index()
    {
    	
        # all::  to get all data from table
        $arrCourses = Course::all();
        $arrTeachers = Teacher::all();
        $arrSliders = Slider::all();
          
    	return view('frontend.index',compact('arrCourses','arrTeachers','arrSliders'));
    }

    public function AboutUs()
    {
        return view('frontend.about');
    }

    public function ContactUs()
    {
        return view('frontend.contact');
    }

    public function CourseDetails ($course_id,$course_name=''){

        $course_description = "<script>alert('you are hacked')</script>";

        return view('course_details',compact('course_id','course_name','course_description'));
    }

    public function Register(Register $request)
    {
        Registration::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Email Added Succesfully !');
    }

    public function Events()
    {
        $arrEvents = Event::all();
        return view('frontend.events',compact('arrEvents'));
    }

    public function EventDetails($event_id)
    {
        $objEvent = Event::find($event_id);
        $arrSliderPhotos = $objEvent->SliderPhotos;
        $arrGalaryPhotos = $objEvent->GalaryPhotos;
        $arrSpeakers = $objEvent->Speakers;

        
        return view('frontend.event_details',compact('objEvent','arrSliderPhotos','arrGalaryPhotos','arrSpeakers'));
    }

    public function EventRegister(EventRegisterValidate $request)
    {
        #1- make validation 
        
        EventRegisterations::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Sucessful Register !');
    }
}
