<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Builder\Class_;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'X TJA 1',
                'slug' => 'x-tja-1',
            ],
            [
                'name' => 'X TJA 2',
                'slug' => 'x-tja-2',
            ],
            [
                'name' => 'X TJA 3',
                'slug' => 'x-tja-3',
            ],
        ];

        foreach ($classes as $studentClass) {
            $class = new StudentClass();

            $class->name = $studentClass['name'];
            $class->slug = $studentClass['slug'];

            $class->save();
        }
    }
}
