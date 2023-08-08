<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            ],
            [
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            ]
            ];

            foreach($users as $user){
                User::create($user);
            }

        //$user->assignRole('writer', 'admin');
        $user = User::find(1);
        $role = Role::findByName('admin');
        $user->assignRole($role);

        $user = User::find(2);
        $role = Role::findByName('Editor');
        $user->assignRole($role);
    }
}
