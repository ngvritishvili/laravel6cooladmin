<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'meta_words',
        'description',
        'logo',
        'favicon',
        'web_nav_item_home',
        'web_nav_item_catalog',
        'web_nav_item_about',
        'web_nav_item_contact',
        'name',
        'email',
        'created_at',
        'messages',
        'read',
        'delete',
        'edit',
        'language',
        'clearAllMessages',
        'create_product',
        'create_category',
        'create',
        'sub_category',
        'admin_nav_item_home',
        'admin_nav_item_mainAttributes',
        'admin_nav_item_categories',
        'admin_nav_item_products',
        'admin_nav_item_messages',
        'read_all',
        'product_name',
        'product_description',
        'product_price',
        'product_image',
        'browse',
        'categories',
        'for_sub_category',
        'sub_categories',
        'edit_sub_category',
        'edit_product_name',
        'edit_product_description',
        'edit_product_price',
        'edit_product_images',
        'save_changes',
        'products',


    ];

    protected $guarded = [];
}
