<?php

namespace App\Http\Controllers\adminControllers;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Slides;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {

        App::setLocale($locale);

        $slides = Slides::all();

        $attribute = Attribute::first();
        return view('admin.slide.index', compact('attribute', 'locale', 'slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {

        $this->validate($request, [

            'image' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);


        $pluss = random_int(1,255);
        $date = Carbon::now()->format('Y-m-d-h-m-s');
        $imageName = $date . '.' . $pluss . $request->image->getClientOriginalExtension();

        $request->image->move(public_path('/images/slides'), $imageName);

        $data = [
            'info_id' => 1,
            'image' => $imageName,
            'title' => request('title'),
            'description' => request('description'),
        ];

        Slides::create($data);

        return back();



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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {

        Slides::find($id)->delete();

        return back();
    }
}
