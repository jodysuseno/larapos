<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Setting;
use App\Models\Stock;
use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'username' => 'admincashier',
            'password' => bcrypt('admin1234'),
            'name' => 'Admin Cashier',
            'profile_picture' => 'default.png',
            'address' => 'Jakarta Indonesia',
            'level' => 'admin',
        ]);

        User::create([
            'email' => 'user@email.com',
            'username' => 'usercashier',
            'password' => bcrypt('user1234'),
            'name' => 'User Cashier',
            'profile_picture' => 'default.png',
            'address' => 'Surabaya Indonesia',
            'level' => 'cashier',
        ]);

        Supplier::create([
            'name' => 'PT. Jaya Abadi',
            'phone' => '08123456789',
            'address' => 'Str. bean farm, Semarang. Indonesia',
            'desc' => 'Supplier Item for nature resources',
        ]);

        Supplier::create([
            'name' => 'PT. Progamer',
            'phone' => '08123456xxx',
            'address' => 'Str. Ahmad Yani, Bandung Indonesia',
            'desc' => 'supplier for game',
        ]);

        Supplier::create([
            'name' => 'PT. Super Technology',
            'phone' => '08123234xxx',
            'address' => 'Str. sutomo, Bali',
            'desc' => 'supplier for gadget',
        ]);

        Customer::create([
            'name' => 'Umum',
            'gender' => 'unknown',
            'phone' => '-',
            'address' => '-',
        ]);

        Customer::create([
            'name' => 'Jafar',
            'gender' => 'male',
            'phone' => '08123456789',
            'address' => 'Malang Indonesia',
        ]);

        Customer::create([
            'name' => 'Aliyah',
            'gender' => 'female',
            'phone' => '08123234789',
            'address' => 'Yogyakarta Indonesia',
        ]);

        Customer::create([
            'name' => 'Radit',
            'gender' => 'male',
            'phone' => '08098234789',
            'address' => 'Ambon Indonesia',
        ]);

        Customer::create([
            'name' => 'Ela',
            'gender' => 'female',
            'phone' => '08098230089',
            'address' => 'Pasuruan Indonesia',
        ]);

        Category::create(['name' => 'Food']);
        Category::create(['name' => 'Drink']);
        Category::create(['name' => 'Cleaning']);
        Category::create(['name' => 'Snack']);
        Category::create(['name' => 'Tools']);

        Unit::create(['name' => 'Kilogram']);
        Unit::create(['name' => 'Buah']);
        Unit::create(['name' => 'bottle']);
        Unit::create(['name' => 'Pack']);

        Item::create([
            'barcode' => '0002018001',
            'name' => 'Beras',
            'category_id' => 1,
            'unit_id' => 1,
            'price' => 15000,
            'stock' => 10,
        ]);
        Item::create([
            'barcode' => '0002018002',
            'name' => 'Indomie',
            'category_id' => 1,
            'unit_id' => 4,
            'price' => 3000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018003',
            'name' => 'Coca Cola',
            'category_id' => 2,
            'unit_id' => 3,
            'price' => 9000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018004',
            'name' => 'Pepsi',
            'category_id' => 2,
            'unit_id' => 3,
            'price' => 9000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018005',
            'name' => 'Detol',
            'category_id' => 3,
            'unit_id' => 3,
            'price' => 7000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018006',
            'name' => 'Pepsodent',
            'category_id' => 3,
            'unit_id' => 2,
            'price' => 14000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018007',
            'name' => 'Happytoz',
            'category_id' => 4,
            'unit_id' => 4,
            'price' => 11000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018008',
            'name' => 'Oreo',
            'category_id' => 4,
            'unit_id' => 4,
            'price' => 8000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018009',
            'name' => 'Spoon',
            'category_id' => 5,
            'unit_id' => 2,
            'price' => 5000,
            'stock' => 0,
        ]);
        Item::create([
            'barcode' => '0002018010',
            'name' => 'Hammer',
            'category_id' => 5,
            'unit_id' => 2,
            'price' => 50000,
            'stock' => 0,
        ]);

        Stock::create(['item_id' => 1, 'supplier_id' => 1, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 10,]);
        Stock::create(['item_id' => 2, 'supplier_id' => 1, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 30,]);
        Stock::create(['item_id' => 3, 'supplier_id' => 1, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 40,]);
        Stock::create(['item_id' => 4, 'supplier_id' => 1, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 50,]);
        Stock::create(['item_id' => 5, 'supplier_id' => 2, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 100,]);
        Stock::create(['item_id' => 6, 'supplier_id' => 2, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 48,]);
        Stock::create(['item_id' => 7, 'supplier_id' => 2, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 24,]);
        Stock::create(['item_id' => 8, 'supplier_id' => 2, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 25,]);
        Stock::create(['item_id' => 9, 'supplier_id' => 3, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 10,]);
        Stock::create(['item_id' => 10, 'supplier_id' => 3, 'user_id' => 1, 'type' => 'in', 'date' => Carbon::parse(date('Y-m-d')), 'detail' => 'Restock item', 'qty' => 35,]);

        Item::where('item_id', 1)->update(['stock' => 10]);
        Item::where('item_id', 2)->update(['stock' => 30]);
        Item::where('item_id', 3)->update(['stock' => 40]);
        Item::where('item_id', 4)->update(['stock' => 50]);
        Item::where('item_id', 5)->update(['stock' => 100]);
        Item::where('item_id', 6)->update(['stock' => 48]);
        Item::where('item_id', 7)->update(['stock' => 24]);
        Item::where('item_id', 8)->update(['stock' => 25]);
        Item::where('item_id', 9)->update(['stock' => 10]);
        Item::where('item_id', 10)->update(['stock' => 35]);

        Setting::create([
            'name' => 'Lara POS',
            'contact' => '085555888765',
            'owner' => 'Mrs. Lara',
            'description' => 'Chinese Shop like kelontong shop. Sell any stuff for anything',
        ]);
    }
}
