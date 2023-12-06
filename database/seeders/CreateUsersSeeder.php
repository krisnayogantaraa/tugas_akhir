<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'nip'=>'admin NIP',
               'type'=>1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Operator User',
               'email'=>'operator@gmail.com',
               'nip'=>'operator NIP',
               'type'=> 2,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Gudang User',
               'email'=>'gudang@gmail.com',
               'nip'=>'gudang NIP',
               'type'=> 3,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Ekspedisi User',
               'email'=>'ekspedisi@gmail.com',
               'nip'=>'ekspedisi NIP',
               'type'=> 4,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'nip'=>'user NIP',
               'type'=>0,
               'password'=> bcrypt('12345678'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
