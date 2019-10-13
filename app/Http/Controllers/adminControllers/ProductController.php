<?php

namespace App\Http\Controllers\adminControllers;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        $attributes = Attribute::first();
        $products = Product::all();
        App::setLocale($locale);

        return view('admin.product.index', compact('locale', 'products','attributes'));
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

        $subCategories = SubCategory::all();

        return view('admin.product.create', compact('locale', 'subCategories','attributes'));
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
            'productnameen' => 'required|max:255',
            'productnameka' => 'required|max:255',
            'productdescriptionen' => 'required|max:255',
            'productdescriptionka' => 'required|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'

        ]);


        $id = request('id');
        $productNameEn = request('productnameen');
        $productNameKa = request('productnameka');
        $productDescriptionEn = request('productdescriptionen');
        $productDescriptionKa = request('productdescriptionka');
        $price = request('price');


        $data = [
            'sub_categories_id' => $id,
            'price' => $price,
            'en' => ['name' => $productNameEn, 'description' => $productDescriptionEn],
            'ka' => ['name' => $productNameKa, 'description' => $productDescriptionKa],
        ];

        $product = Product::create($data);

        $date = Carbon::now()->format('Y-m-d-hh-mm-ss');
        $files = request('images');

        $pluss = 1;
        foreach ($files as $file) {
            $imageName = $date . '.' . $pluss . $file->getClientOriginalExtension();
            $file->move(public_path('/images/products'), $imageName);
            $pluss++;

            $data = [
                'image' => $imageName,
                'product_id' => $product->id
            ];

            Image::create($data);


        }


        App::setLocale($locale);

        session()->flash('message', 'პროდუქტი წარმატებით დაემატა');

        return redirect('admin/' . $locale . '/product');


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
    public function edit($locale, $id)
    {

        $attributes = Attribute::first();
        App::setLocale($locale);
        $product = Product::with('images')->find($id);
        return view('admin.product.edit', compact('product', 'locale','attributes'));
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

        $this->validate($request, [
            'productnameen' => 'max:255',
            'productnameka' => 'max:255',
            'productdescriptionen' => 'max:255',
            'productdescriptionka' => 'max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'

        ]);

        $product = Product::find($id);


        if (request('productnameen')) {
            $product->translate('en')->name = request('productnameen');
            $product->save();
        }

        if (request('productnameka')) {
            $product->translate('ka')->name = request('productnameka');
            $product->save();
        }

        if (request('descriptionen')) {
            $product->translate('en')->description = request('descriptionen');
            $product->save();
        }

        if (request('descriptionka')) {
            $product->translate('ka')->description = request('descriptionka');
            $product->save();
        }

        if (request('productprice')) {
            $product->price = request('productprice');
            $product->save();
        }


        if (request('image')) {
            $date = Carbon::now()->format('Y-m-d-hh-mm-ss');
            $files = request('image');
            $pluss = 1;

            foreach ($files as $file) {
                $imageName = $date . '.' . $pluss . $file->getClientOriginalExtension();
                $file->move(public_path('/images/products'), $imageName);
                $pluss++;

                $data = [
                    'image' => $imageName,
                    'product_id' => $product->id
                ];

                Image::create($data);


            }
        }


        $product->save();
        return redirect('admin/' . $locale . '/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {

        $product = Product::find($id);
        Storage::disk('public')->delete("products/" . $product->image);

        session()->flash('message', 'პროდუქტი წარმატებით წაიშალა');

        Product::find($id)->delete();

        return back();
    }
}
