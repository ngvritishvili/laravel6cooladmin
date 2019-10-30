<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_translates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->string('locale')->index();
            $table->unique(['attribute_id', 'locale']);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('meta_words')->nullable();
            $table->string('web_nav_item_home')->nullable();
            $table->string('web_nav_item_catalog')->nullable();
            $table->string('web_nav_item_about')->nullable();
            $table->string('web_nav_item_contact')->nullable();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('createdAt')->nullable();
            $table->string('messages')->nullable();
            $table->string('read')->nullable();
            $table->string('delete')->nullable();
            $table->string('edit')->nullable();
            $table->string('language')->nullable();
            $table->string('clearAllMessages')->nullable();
            $table->string('create_product')->nullable();
            $table->string('create_category')->nullable();
            $table->string('create')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('admin_nav_item_home')->nullable();
            $table->string('admin_nav_item_mainAttributes')->nullable();
            $table->string('admin_nav_item_categories')->nullable();
            $table->string('admin_nav_item_products')->nullable();
            $table->string('admin_nav_item_messages')->nullable();
            $table->string('read_all')->nullable();

            $table->string('product_name')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_image')->nullable();
            $table->string('browse')->nullable();
            $table->string('categories')->nullable();
            $table->string('for_sub_category')->nullable();
            $table->string('sub_categories')->nullable();
            $table->string('edit_sub_category')->nullable();
            $table->string('edit_product_name')->nullable();
            $table->string('edit_product_description')->nullable();
            $table->string('edit_product_price')->nullable();
            $table->string('edit_product_images')->nullable();
            $table->string('save_changes')->nullable();
            $table->string('products')->nullable();
            $table->string('category')->nullable();
            $table->string('style')->nullable();
            $table->string('material')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_translates');
    }
}
