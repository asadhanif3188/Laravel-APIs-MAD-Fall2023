<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;


class DoctorSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            [
                'name'              => 'Haseeb',
                'specialization'    => 'Dil ka',
                'designation'       => 'Asst Prof.',
                'experience'        => 10,
                'gender'            => 'male',
            ],

            [
                'name'              => 'Umer',
                'specialization'    => 'Jiger ka',
                'designation'       => 'Asst Prof.',
                'experience'        => 8,
                'gender'            => 'male',
            ],
        ];

        foreach($doctors as $dtr)
        {
            Doctor::create($dtr);
        }

    }
}
