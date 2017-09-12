<?php

class GradesTableSeeder extends Seeder {

    public function run()
    {
        // Grade Seedes for the DataBase
         DB::table('grades')->truncate();

            Grades::create(array(
            'id' => '1',
            'name_grade' => '1er Grado',
            'name_section' => 'U'
        ));

            Grades::create(array(
            'id' => '2',
            'name_grade' => '2do Grado',
            'name_section' => 'A'
        ));

            Grades::create(array(
            'id' => '3',
            'name_grade' => '2do Grado',
            'name_section' => 'B'
        ));

            Grades::create(array(
            'id' => '4',
            'name_grade' => '3er Grado',
            'name_section' => 'U'
        ));

            Grades::create(array(
            'id' => '5',
            'name_grade' => '4to Grado',
            'name_section' => 'U'
        ));

            Grades::create(array(
            'id' => '6',
            'name_grade' => '5to Grado',
            'name_section' => 'U'
        ));

            Grades::create(array(
            'id' => '7',
            'name_grade' => '6to Grado',
            'name_section' => 'A'
        ));

            Grades::create(array(
            'id' => '8',
            'name_grade' => '6to Grado',
            'name_section' => 'B'
        ));

    }
}