<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Users Seed for the DataBase
        
            DB::table('users')->truncate();

            User::create(array(
            'id' => '1',
            'username' => 'sucri93@gmail.com',
            'password' => '$2y$10$hr350MrbctGzHLEAcNmWe.WsoVcgCjE/qzd86PlRI/oKjOAW/jYhS',
            'passcode' => '20325891',
            'ci' => 'V-24.597.378',
            'name' => 'Susana',
            'lastname' => 'Lares',
            'email' => 'sucri93@gmail.com',
            'age' => '20',
            'birthdate' => '24/03/1995',
            'gender' => 'F',
            'address' => 'Juan Griego',
            'status' => 'A',
            'user_level' => '1',
            'status_login' => 'A'

        ));
            User::create(array(
            'id' => '2',
            'username' => 'francisco032729@gmail.com',
            'password' => '$2y$10$Y8zkR4cPpT6ORLKz0VUXLOxZ8BbAdffNqxCv1jkvTABjmIJ0mM9q.',
            'passcode' => '6446189',
            'ci' => 'V-6.446.189',
            'name' => 'Francisco',
            'lastname' => 'Hernández',
            'email' => 'francisco032729@gmail.com',
            'age' => '50',
            'birthdate' => '19/06/1965',
            'gender' => 'M',
            'address' => 'El Cercado',
            'status' => 'A',
            'user_level' => '1',
            'status_login' => 'A'

        ));
            User::create(array(
            'id' => '3',
            'username' => 'kaleidy17@gmail.com',
            'password' => '$2y$10$47PJTaMjh5MWdfYowdte0u296uY.VV.Extp29HPfuCgsPQ6qWHUPe',
            'passcode' => '19512013',
            'ci' => 'V-19.512.013',
            'name' => 'Kaleidy',
            'lastname' => 'Hernández',
            'email' => 'kaleidy17@gmail.com',
            'age' => '24',
            'birthdate' => '20/03/1991',
            'gender' => 'F',
            'address' => 'Santa Ana',
            'status' => 'A',
            'user_level' => '1',
            'status_login' => 'A'

        ));
            User::create(array(
            'id' => '4',
            'username' => 'yelitzarojas578@gmail.com',
            'password' => '$2y$10$YDTsREzeFvFz3SgKN4PJiexAjpRPQxwcNIruxoBctwGvEhPKsDvjy',
            'passcode' => '13669760',
            'ci' => 'V-13.669.760',
            'name' => 'Yelitza',
            'lastname' => 'Rojas',
            'email' => 'yelitzarojas578@gmail.com',
            'age' => '38',
            'birthdate' => '30/07/1977',
            'gender' => 'F',
            'address' => 'Las Cabreras',
            'status' => 'A',
            'user_level' => '1',
            'status_login' => 'A'

        ));
            User::create(array(
            'id' => '5',
            'username' => 'unidadsanjudastadeo@gmail.com',
            'password' => '$2y$10$Y8zkR4cPpT6ORLKz0VUXLOxZ8BbAdffNqxCv1jkvTABjmIJ0mM9q.',
            'passcode' => '6446189',
            'ci' => 'V-6.868.266',
            'name' => 'Jitza',
            'lastname' => 'González',
            'email' => 'unidadsanjudastadeo@gmail.com',
            'age' => '50',
            'birthdate' => '30/07/1977',
            'gender' => 'F',
            'address' => 'El Cercado',
            'status' => 'A',
            'user_level' => '1',
            'status_login' => 'A'

        ));
    }
}