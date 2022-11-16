<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@hims.com',
            'password' => Hash::make('admin'),
        ]);
        $departments = ['ACCIDENT AND EMERGENCY', 'MERTANITY', 'GOPD','SOPD'];
        foreach($departments as $department){
            Department::firstOrCreate(['name'=>$department]);
        }
    }
}
