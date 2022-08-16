<?php

namespace Database\Seeders;
use Illuminate\Http\Request;

use Illuminate\Database\Seeder;
use App\Models\Crypto;
class CryptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {





    $cryptoRecords = [

      ['id'=>1, 'name'=>"Bitcoin",'price'=>23174.85185205 ],
        ['id'=>3, 'name'=>"Tether",'price'=>1.00017421],


        ];
        $cryptoRecords1 = [

            ['id'=>2, 'name'=>"Ethereum",'price'=>1781.99921459 ],


            ];
     Crypto::insert($cryptoRecords1);
    Crypto::insert($cryptoRecords);

}}
