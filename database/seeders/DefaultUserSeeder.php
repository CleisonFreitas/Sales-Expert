<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ec2-user',
            'email' => 'ec2-user@ubuntu.com',
            'password' => Hash::make('ec2-secret')
        ]);
    }
}
