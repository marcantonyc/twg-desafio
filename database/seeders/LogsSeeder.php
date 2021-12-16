<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Logs as ModelLogs;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            ModelLogs::create([
                'description' => 'im a description '.$i,
                'task_id' => 1,
            ]);        
        }
    }
}
