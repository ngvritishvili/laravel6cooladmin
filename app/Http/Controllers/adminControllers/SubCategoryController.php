<?php

namespace App\Http\Controllers\adminControllers;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {

        $attributes = Attribute::first();
        $id = request('id');
        $category = Category::find($id);
        $SubCategories = SubCategory::all()->where('category_id',$id );
        return view('admin.sub-category.index', compact('SubCategories','category', 'locale','attributes'));
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
    public function store(Request $request)
    {

        $locale = request('locale');
        $id = request('id');

        $subCategoryen = request('subCategoryen');
        $subCategoryka = request('subCategoryka');

        $data = [
            'category_id' => $id,
            'name' => 'sub',
            'en' => ['name' => $subCategoryen],
            'ka' => ['name' => $subCategoryka],
        ];

        SubCategory::create($data);


        return back();


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
        $subCategory = SubCategory::find($id);
        return view('admin.sub-category.edit', compact('subCategory','locale','attributes'));
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
        $subCategoryen = request('subcategoryen');
        $subCategoryka = request('subcategoryka');

        $subCategory = SubCategory::find($id);

        $subCategory->translate('en')->name = $subCategoryen;
        $subCategory->translate('ka')->name = $subCategoryka;
        $subCategory->save();


        return redirect('admin/'.$locale.'/sub-category?id='.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {
        SubCategory::find($id)->delete();

        return back();
    }
}
