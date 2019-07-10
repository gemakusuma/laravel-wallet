<?php

use App\Role;
use App\User;
use App\Utility\SevvaUtility;
use Faker\Provider\Uuid;
use GoogleSheets\Facades\Sheets;
use Illuminate\Database\Seeder;
use PulkitJalan\Google\Facades\Google;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::where('username', 'gema')->first()->id;

        \Illuminate\Support\Facades\DB::table('wallets')->insert([
            'id' => Uuid::uuid(),
            'saldo' => 250000,
            'user_id' => $userId,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
