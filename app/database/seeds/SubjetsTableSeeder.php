<?php

class SubjetsTableSeeder extends Seeder {

    public function run()
    {
        // Subjets Seeds For DB
         DB::table('subjets')->truncate();

        Subjets::create(array(
            'id' => '1',
            'name_sub' => 'Lectura y Caligrafía',
        ));

        Subjets::create(array(
            'id' => '2',
            'name_sub' => 'Ciencias y Tecnologías',
        ));

        Subjets::create(array(
            'id' => '3',
            'name_sub' => 'Castellano',
        ));

        Subjets::create(array(
            'id' => '4',
            'name_sub' => 'Sociales',
       ));

        Subjets::create(array(
            'id' => '5',
            'name_sub' => 'Seguridad Vial',
        ));

        Subjets::create(array(
            'id' => '6',
            'name_sub' => 'Matemáticas',
        ));

        Subjets::create(array(
            'id' => '7',
            'name_sub' => 'Deporte',
        ));

        Subjets::create(array(
            'id' => '8',
            'name_sub' => 'Bailoterapia',
        ));

        Subjets::create(array(
            'id' => '9',
            'name_sub' => 'Inglés',
        ));

        Subjets::create(array(
            'id' => '10',
            'name_sub' => 'Proyecto',
        ));

        Subjets::create(array(
            'id' => '11',
            'name_sub' => 'Artes Plásticas',
        ));

        Subjets::create(array(
            'id' => '12',
            'name_sub' => 'Interculturalidad',
        ));

    }
}