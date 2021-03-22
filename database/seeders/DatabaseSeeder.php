<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\Bouncer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Bouncer $bouncer)
    {
        $user = User::firstOrCreate([
            'name'     => 'Super Administrator',
            'email'    => 'admin@site.com',
            'tos'      => 'agreed',
            'password' => Hash::make('secret'),
        ]);

        $bouncer->role()->firstOrCreate([
            'name'  => 'super-admin',
            'title' => 'Super Administrator',
        ]);

        $bouncer->assign('super-admin')->to($user);
        $bouncer->allow('super-admin')->to('accounts');
        $bouncer->allow('super-admin')->to('roles');

        $bouncer->role()->firstOrCreate([
            'name'  => 'user',
            'title' => 'User',
        ]);
    }
}
