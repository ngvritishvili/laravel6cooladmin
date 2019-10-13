<?php

namespace App\Http\Controllers\adminControllers;

use App\Attribute;
use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($locale)
    {
        App::setLocale($locale);

        $attributes = Attribute::first();

        $messages = Contact::all()->sortByDesc('created_at');

        foreach ($messages as $one)
        {
            $one->read = 0;
            $one->save();
        }


        return view('admin.messages.index' , compact('locale','attributes','messages'));

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
            'name' => 'required|max:255',
            'email' => 'required',
            'description' => 'required'
        ]);


        $data = [

            'name' => request('name'),
            'email'=> request('email'),
            'description' => request('description'),
        ];

        Contact::create($data);

        return redirect('home/' . $locale );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        App::setLocale($locale);

        $attribute = Attribute::first();
        $message = Contact::find($id);

        return view('admin.messages.show', compact('message','attribute','locale'));
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
        Contact::find($id)->delete();

        return redirect('admin/'. $locale . '/contact');
    }

    public function destroyAll()
    {
        Contact::truncate();

        return back();
    }
}
