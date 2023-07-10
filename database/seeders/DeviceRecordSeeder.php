<?php

namespace Database\Seeders;

use App\Models\DeviceRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            $factory = DeviceRecord::factory(rand(1, 7));

            if ($i % 2 == 0) {
                $factory = $factory->wrong();
                if (rand(1, 2) == 2) {
                    $factory = $factory->trashed();
                }
            }

            if ($i % 2 != 0 && rand(1, 2) == 2) {
                $factory = $factory->verified();
            }

            $factory->create();
        }
    }
}
