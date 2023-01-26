<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'jm',
            'email' => 'demo@demo.com',
            'password' => Hash::make('1'),
        ]); 
        DB::table('transferencias')->insert([
            'fecha' => Carbon::now(),
            'monto' => 100,
            'observacion' => 'este cliente tiene muchas transferencias',
            'cuenta_destino' => '0123102301230123',
            'user_id' => 1
        ]);
        DB::table('transferencias')->insert([
            'fecha' => Carbon::now(),
            'monto' => 200,
            'observacion' => 'ya no queda mas dinero',
            'cuenta_destino' => '0123102301230123',
            'user_id' => 1
        ]);
    }
}
