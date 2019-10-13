<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Info;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {


        $this->validate($request, [

            'logo' => 'mimes:jpeg,png,jpg,svg|max:512',
            'banner' => 'mimes:jpeg,png,jpg,svg|max:512',
            'favicon' => 'mimes:jpeg,png,jpg,svg|max:512',

        ]);


        $info = Info::first();

        if ($info == null) {

            $data = [
                'title' => request('title'),
                'description' => request('description'),
                'meta_words' => request('meta_words'),
                'logo' => request('logo'),
                'banner' => request('banner'),
                'phone' => request('phone'),
                'email' => request('email'),
                'fb' => request('fb'),

            ];

            Info::create($data);


        } else {


            $date = Carbon::now()->format('Y-m-d-h-m-s');
            $pluss = random_int(1, 255);

            $info = Info::first();

            $info->title = request('title');
            $info->description = request('description');
            $info->meta_words = request('meta_words');


            if ($request->hasFile('logo'))
            {
                $imageName = $date . '.' . $pluss . $request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('/images/info'), $imageName);

                $info->logo = $imageName;
            }

            if ($request->hasFile('banner'))
            {
                $imageName = $date . '.' . $pluss . $request->banner->getClientOriginalExtension();
                $request->banner->move(public_path('/images/info'), $imageName);
                $info->banner = $imageName;
            }
            if ($request->hasFile('favicon'))
            {
                $imageName = $date . '.' . $pluss . $request->favicon->getClientOriginalExtension();
                $request->favicon->move(public_path('/images/info'), $imageName);
                $info->favicon = $imageName;
            }



            $info->save();

            return redirect('admin');

        }





    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
