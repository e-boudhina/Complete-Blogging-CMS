<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'e-boudhina',
            'email' => 'e-boudhina@live.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('07219567'),
            'admin'=>1,
        ]);
        Profile::create([
            'user_id'=>$user->id,
            'avatar' => 'default_admin.png',
            'about' => 'Laravel enthusiast | Php Master ',
            'facebook' => 'facebook.com',
            'youtube'=> 'youtube.com',
        ]);
    }
}
