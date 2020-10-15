<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Redirect;
use App\Http\Requests\StoreSliders;
use App\Http\Requests\UpdateSliders;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrSliders =  Slider::all();
        return view('backend.sliders.index',compact('arrSliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliders $request)
    {
        //
         
        $objSlider = new Slider();
        $objSlider->title1 = $request->title1;
        $objSlider->title2 = $request->title2;
        $objSlider->description = $request->description;
        $objSlider->link = $request->link;

        if($request->hasFile('image')){
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $destination = "images/sliders";
            $image->move($destination,$image_name);
            $objSlider->image = $destination."/".$image_name;
        }
        $objSlider->save();
        return Redirect::back()->with('sucessMSG', 'Slider Added Succesfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objSlider = Slider::findOrFail($id);
        return view('backend.sliders.show',compact('objSlider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objSlider = Slider::findOrFail($id);
        return view('backend.sliders.edit',compact('objSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliders $request, $id)
    {
        $objSlider = Slider::findOrFail($id);

        $objSlider->title1 = $request->title1;
        $objSlider->title2 = $request->title2;
        $objSlider->description = $request->description;
        $objSlider->link = $request->link;

        if($request->hasFile('image')){
            $image = $request->image;
            $image_name = time().".".$image->getClientOriginalExtension();
            $destination = "images/sliders";
            $image->move($destination,$image_name);
            $objSlider->image = $destination."/".$image_name;
        }
        $objSlider->save();

        return Redirect::back()->with('sucessMSG', 'Slider Updated Succesfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Slider Deleted Succesfully !');
    }
}
