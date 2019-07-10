<?php

use App\Role;
use App\User;
use App\Utility\SevvaUtility;
use Faker\Provider\Uuid;
use GoogleSheets\Facades\Sheets;
use Illuminate\Database\Seeder;
use PulkitJalan\Google\Facades\Google;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userGemaId = User::where('username', 'gema')->first()->id;
        $userAkbarId = User::where('username', 'akbar')->first()->id;
        \Illuminate\Support\Facades\DB::table('transactions')->insert([
            'id' => Uuid::uuid(),
            'total' => 10000,
            'from_user_id' => $userGemaId,
            'to_user_id' => $userAkbarId,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
