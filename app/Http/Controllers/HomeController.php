<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Slider;
use App\Models\Registration;
use Redirect;
use App\Http\Requests\Register;
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
        return view('about');
    }

    public function ContactUs()
    {
        return view('contact');
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
}
