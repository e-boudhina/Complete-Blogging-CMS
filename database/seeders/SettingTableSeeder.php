<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'Laravel Blog',
            'address' => 'Tunisia',
            'contact_number' =>' 9 124 5326 47854', // Test number,
            'contact_email' => 'myblog@contact.com'
        ]);
    }
}
