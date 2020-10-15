<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Course;
use Redirect;
use Validator;
use App\Http\Requests\StoreCourses;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $arrCourses =  Course::all();
       return view('backend.courses.index',compact('arrCourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourses $request)
    {

        // user Eloquent
        $objCourse = new Course();
        $objCourse->name = $request->name;
        $objCourse->price = $request->price;
        $objCourse->description = $request->description;
        $objCourse->rate = 0;

        # upload image 
        $image = "";
        #  validate if image upload or not 
        if($request->hasFile('image')){
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $destination = "images/courses";
            $image->move($destination,$image_name);
            $objCourse->image = $destination."/".$image_name;
        }

        $objCourse->save();
        return Redirect::back()->with('sucessMSG', 'Course Added Succesfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $objCourse = Course::findOrFail($id);
        return view('backend.courses.show',compact('objCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objCourse = Course::findOrFail($id);
        return view('backend.courses.edit',compact('objCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourses $request, $id)
    {
        //
        $objCourse = Course::findOrFail($id);

        $objCourse->name = $request->name;
        $objCourse->price = $request->price;
        $objCourse->description = $request->description;

        # upload image 
        $image = "";
        #  validate if image upload or not 
        if($request->hasFile('image')){
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $destination = "images/courses";
            $image->move($destination,$image_name);
            $objCourse->image = $destination."/".$image_name;
        }

        $objCourse->save();

        return Redirect::back()->with('sucessMSG', 'Course Updated Succesfully !');

         
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
        Course::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Course Deleted Succesfully !');
    }
}
