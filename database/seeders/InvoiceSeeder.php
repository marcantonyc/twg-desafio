<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice as ModelInvoice;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 

            ModelInvoice::create([
                'user_id' => 1,
                'seller_id' => 1,
                'type' => "type",
            ]);        
        }
    }
}
