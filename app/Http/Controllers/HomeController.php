<?php

namespace App\Http\Controllers;

use App\About;
use App\Attribute;
use App\Category;
use App\Info;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('createTranslate');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale)
    {
        $info = Info::with('slides','partners')->get()->first();
        App::setLocale($locale);

        $attribute = Attribute::first();

        return view('home', compact('attribute', 'locale','info'));

    }




    public function catalog($locale)
    {
        $info = Info::with('slides','partners')->get()->first();
        $categories = Category::with('sub')->get();
        $products = Product::all();
        $subCategory = SubCategory::with('products')->get();
        $productsTime = Product::with('images')->orderByDesc('created_at')->get();
        $productsPrice = Product::with('images')->orderByDesc('price')->get();
        $productsIO = Product::with('images')->where('favorite', 1)->orderByDesc('created_at')->get();
        $productsRandom = Product::with('images')->inRandomOrder()->get();

//        dd($productsRandom);



        App::setLocale($locale);

        $attribute = Attribute::first();

        return view('catalog', compact('attribute', 'locale','productsTime', 'productsPrice','categories','info','products','subCategory','productsIO','productsRandom'));
    }

    public function contact($locale)
    {
        App::setLocale($locale);
        $info = Info::with('slides','partners')->get()->first();
        $attribute = Attribute::first();

        return view('contact' , compact('locale','attribute','info'));

    }

    public function about($locale)
    {

        App::setLocale($locale);
        $about = About::first();
        $info = Info::with('slides','partners')->get()->first();
        $attribute = Attribute::first();
        return view('about', compact('locale','attribute','info','about'));
    }

    public function createTranslate()
    {

        $data = [
            'name' => 'attributes',

            'en' => ['title' => 'Title',
                'description' => 'Description',
                'logo' => 'Logo',
                'meta_words' => 'Meta Words',
                'web_nav_item_home' => 'Home',
                'web_nav_item_catalog' => 'Catalog',
                'web_nav_item_about' => 'About',
                'web_nav_item_contact' => 'Contact',],

            'ka' => ['title' => 'სათაური',
                'description' => 'აღწერა',
                'logo' => 'ლოგო',
                'meta_words' => 'მეტა სიტყვები',
                'web_nav_item_home' => 'მთავარი',
                'web_nav_item_catalog' => 'კატალოგი',
                'web_nav_item_about' => 'ჩვენს შესახებ',
                'web_nav_item_contact' => 'კონტაქტი',],
        ];
        Attribute::create($data);

        return redirect('home');
    }

    public function content($locale)
    {
        $info = Info::with('slides','partners')->get()->first();
        $categories = Category::with('sub')->get();
        $products = Product::all();
        $subCategory = SubCategory::with('products')->get();
        $productsTime = Product::with('images')->orderByDesc('created_at')->get();
        $productsPrice = Product::with('images')->orderByDesc('price')->get();
        $productsIO = Product::with('images')->where('favorite', 1)->orderByDesc('created_at')->get();
        $productsRandom = Product::with('images')->inRandomOrder()->get();

//        dd($productsRandom);



        App::setLocale($locale);
        $attribute = Attribute::first();


        return view('content',compact('locale','attribute','info','categories', 'products','subCategory','productsTime', 'productsPrice','productsIO','productsRandom'));
    }

    public function search($locale)
    {

dd(request()->all());





        $info = Info::with('slides','partners')->get()->first();
        $categories = Category::with('sub')->get();
        $products = Product::all();
        $subCategory = SubCategory::with('products')->get();
        $productsTime = Product::with('images')->orderByDesc('created_at')->get();
        $productsPrice = Product::with('images')->orderByDesc('price')->get();
        $productsIO = Product::with('images')->where('favorite', 1)->orderByDesc('created_at')->get();
        $productsRandom = Product::with('images')->inRandomOrder()->get();

//        dd($productsRandom);



        App::setLocale($locale);
        $attribute = Attribute::first();


        return view('search',compact('locale','attribute','info','categories', 'products','subCategory','productsTime', 'productsPrice','productsIO','productsRandom'));
    }
}
