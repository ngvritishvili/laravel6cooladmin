<?php

namespace App\Http\Controllers\adminControllers;

use App\About;
use App\Attribute;
use App\Http\Controllers\Controller;
use App\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {

        $infoWithImages = Info::with('partners', 'slides')->get()->first();
//        dd($infoWithImages);


        App::setLocale($locale);

        $attribute = Attribute::first();

        return view('admin.mainAttributes.index', compact('attribute', 'locale', 'infoWithImages'));
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
            'title' => '',
            'description' => '',
            'logo' => '',
            'slides' => '',
            'phone' => '',
            'email' => '',
            'facebook' => '',
        ]);


        $locale = app()->getLocale();

//            $data = [
//                'name' => 'address',
//                'en' => ['title' => 'My Address A. Machavariani 14', 'nav_items' => 'Tbilisi'],
//                'ka' => ['title' => 'ჩემი მისამართია ა. მაჭავარიანის 14', 'nav_items' => 'თბილისი'],
//            ];
//
//
//            Attribute::create($data);


        return redirect('admin/', $locale);
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
