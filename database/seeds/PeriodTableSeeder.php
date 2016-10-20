<?php

use Illuminate\Database\Seeder;
use App\Period;

class PeriodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $I = new Period();
        $I->period_name = 'I';
        $I->save();

        $II = new Period();
        $II->period_name = 'II';
        $II->save();

        $III = new Period();
        $III->period_name = 'III';
        $III->save();

        $IV = new Period();
        $IV->period_name = 'IV';
        $IV->save();

        $V = new Period();
        $V->period_name = 'V';
        $V->save();
    }
}
