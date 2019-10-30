<?php

use App\Attribute;
use App\Category;
use App\SubCategory;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('123123123');
        $admin->save();

        $data = [
            'name' => 'attributes',

            'en' => [
                'style' => 'Style',
                'material' => 'Material',

                'products' => 'Products',
                'product_name' => 'Product Name',
                'product_description' => 'Product Description',
                'product_price' => 'Product Price',
                'product_image' => 'Product Images',
                'browse' => 'Browse',
                'categories' => 'Categories',
                'category' => 'Category',
                'for_sub_category' => 'Enter Sub Category For -> ',
                'sub_categories' => 'Sub Categories',
                'edit_sub_category' => 'Edit Name For Sub Category',
                'edit_product_name' => 'Edit Product Name',
                'edit_product_description' => 'Edit Product Description',
                'edit_product_price' => 'Edit Product Price',
                'edit_product_images' => 'Product Images',
                'save_changes' => 'Save Changes',



                'name' => 'Name',
                'email' => 'Email',
                'createdAt' => 'Date-Time',
                'messages' => 'Messages',
                'read' => 'Read',
                'delete' => 'Delete',
                'edit' => 'Edit',
                'language' => 'Language',
                'clearAllMessages' => 'Clear All Messages',
                'create_product' => 'Create Product',
                'create_category' => 'Create Category',
                'create' => 'Create',
                'sub_category' => 'Sub-Category Add',
                'admin_nav_item_home' => 'Home',
                'admin_nav_item_mainAttributes' => 'Main Attributes',
                'admin_nav_item_categories' => 'Categories',
                'admin_nav_item_products' => 'Products',
                'admin_nav_item_messages' => 'Messages',
                'read_all' => 'Read All Messages',
                'title' => 'Title',
                'description' => 'Description',
                'logo' => 'Logo',
                'meta_words' => 'Meta Words',
                'web_nav_item_home' => 'Home',
                'web_nav_item_catalog' => 'Catalog',
                'web_nav_item_about' => 'About',
                'web_nav_item_contact' => 'Contact',],

            'ka' => [

                'style' => 'სტილი',
                'material' => 'მატერიალი',

                'products' => 'პროდუქტები',
                'product_name' => 'პროდუქტის დასახელება',
                'product_description' => 'პროდუქტის აღწერა',
                'product_price' => 'პროდუქტის ფასი',
                'product_image' => 'პროდუქტის სურათები',
                'browse' => 'აირჩიე',
                'category' => 'კატეგორია',
                'categories' => 'კატეგორიები',
                'for_sub_category' => 'შეიყვანე სახელი სუბ კატეგორიისთვის: -> ',
                'sub_categories' => 'სუბ კატეგორიები',
                'edit_sub_category' => 'სახელის ცვლილება სუბ კატეგორიისთვის',
                'edit_product_name' => 'სახელის ცვლილება',
                'edit_product_description' => 'აღწერის ცვლილება',
                'edit_product_price' => 'ფასის ცვლილება',
                'edit_product_images' => 'პროდუქტის სურათები',
                'save_changes' => 'დამახსოვრება',

                'name' => 'სახელი',
                'email' => 'იმეილი',
                'createdAt' => 'დრო',
                'messages' => 'შეტყობინებები',
                'read' => 'წაიკითვა',
                'delete' => 'წაშლა',
                'edit' => 'შეცვლა',
                'language' => 'ენა',
                'clearAllMessages' => 'ყველა შეტყობინების წაშლა',
                'create_product' => 'პროდუქტის დამატება',
                'create_category' => 'კატეგორიის დამატება',
                'create' => 'დამატება',
                'sub_category' => 'სუბ კატეგორიის დამატება',
                'admin_nav_item_home' => 'მთავარი',
                'admin_nav_item_mainAttributes' => 'ატრიბუტები',
                'admin_nav_item_categories' => 'კატეგორიები',
                'admin_nav_item_products' => 'პროდუქტები',
                'admin_nav_item_messages' => 'შეტყობინებები',
                'read_all' => 'ყველას ნახვა',

                'title' => 'სათაური',
                'description' => 'აღწერა',
                'logo' => 'ლოგო',
                'meta_words' => 'მეტა სიტყვები',
                'web_nav_item_home' => 'მთავარი',
                'web_nav_item_catalog' => 'კატალოგი',
                'web_nav_item_about' => 'ჩვენს შესახებ',
                'web_nav_item_contact' => 'კონტაქტი',],
        ];
        Attribute::create($data);



        $data = [
            'en' => ['name' => 'First Category'],
            'ka' => ['name' => 'პირველი კატეგორია'],
        ];

        Category::create($data);




        $data2 = [
            'name' => 'from seeder',
            'category_id' => 1,
            'en' => ['name' => '1 sub category'],
            'ka' => ['name' => '1 სუბ ნიუ კატერორია'],
        ];

        SubCategory::create($data2);


    }
}
