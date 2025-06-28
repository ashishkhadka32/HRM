<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChecklistItem;

class ChecklistItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChecklistItem::insert([
            [
                'name' => 'Submit Government ID',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Complete Orientation Session',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Setup Work Email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
