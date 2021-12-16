<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task as ModelTask;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelTask::create([
            'name' => 'task name',
            'description' => "this is the description",
            'assigned_user' => 1,
            'max_ejecution' => '2021-12-31',
        ]);       
    }
}
