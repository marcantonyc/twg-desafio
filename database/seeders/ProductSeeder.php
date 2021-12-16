<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product as ModelProduct;
use App\Models\Invoice as ModelInvoice;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $invoices = ModelInvoice::all();

        foreach ($invoices as $invoice) {
            
            for ($i=0; $i < 10; $i++) { 
                $name = "name ".$invoice->id;
                $quantity = rand(1, 150);
                $price = 1000 * rand(1, 10);
                ModelProduct::create([
                    'invoice_id' => $invoice->id,
                    'name' => $name,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);        
            }
        }
    }
}
