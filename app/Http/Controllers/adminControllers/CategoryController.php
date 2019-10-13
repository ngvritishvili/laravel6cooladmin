<?php

namespace App\Http\Controllers\adminControllers;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {

        $categories = Category::all();
        App::setLocale($locale);

        $attributes = Attribute::first();

        return view('admin.category.index', compact('locale', 'categories' ,'attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale)
    {
        $attributes = Attribute::first();
        App::setLocale($locale);
        return view('admin.category.create', compact('locale','attributes'));
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
            'categoryen' => 'required|max:255',
            'categoryka' => 'required|max:255',
        ]);

//        dd('store');

        $categoryEn = request('categoryen');
        $categoryKa = request('categoryka');
        $data = [
            'en' => ['name' => $categoryEn],
            'ka' => ['name' => $categoryKa],
        ];


        Category::create($data);

        App::setLocale($locale);

        return redirect('admin/' . $locale . '/category');
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
    public function edit($locale , $id)
    {
        $attributes = Attribute::first();
        App::setLocale($locale);
        $category = Category::find($id);
        return view('admin.category.edit', compact('category','locale','attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {

        $categoryen = request('categoryen');
        $categoryka = request('categoryka');

        $category = Category::find($id);

        $category->translate('en')->name = $categoryen;
        $category->translate('ka')->name = $categoryka;
        $category->save();


        return redirect('admin/'.$locale.'/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id )
    {

        Category::find($id)->delete();

        return back();
    }

}
