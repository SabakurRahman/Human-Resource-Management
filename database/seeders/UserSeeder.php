<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user =  User::create([
            'name'      => 'Super Admin',
            'email'     => 'super@admin.com',
            'photo'     => 'path/to/photo.jpg',
            'phone'      => '01774307611',
            'status'  => 1,
            'company_id'  => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);
        $superAdminRole = Role::query()->where('name', 'Super Admin')->first();
        if ($superAdminRole){
            $user->assignRole($superAdminRole?->id);
        }

    }
}
