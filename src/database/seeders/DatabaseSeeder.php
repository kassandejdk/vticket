<?php

namespace Database\Seeders;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
      
        DB::table('entreprises')->insert([
            ['libelle'=>'UBA','description'=>'banque UBA'],
            ['libelle'=>'Coris bank','description'=>'banque Coris bank'],
            ['libelle'=>'Eco Bank','description'=>'banque Eco Bank'],
            ['libelle'=>'Ministere fonction publique','description'=>'Ministere de la fonction publique'],
        ]);
        DB::table('services')->insert([
            ['libelle'=>'Depot','entreprise_id'=>1],
            ['libelle'=>'Depot','entreprise_id'=>2],
            ['libelle'=>'Depot','entreprise_id'=>3],
            ['libelle'=>'Retrait','entreprise_id'=>2],
            ['libelle'=>'Creation de compte','entreprise_id'=>2],
            ['libelle'=>'Retrait','entreprise_id'=>4],
            ['libelle'=>'Entretien','entreprise_id'=>4],
        ]);

        User::factory(1)->create([
            'name'=>'KASSANDE Judiacel',
            'email'=>'jdkasdel@gmail.com',
            'password'=>Hash::make('delwende'),
            'role'=>'admin',
            'entreprise_id'=>1,
        ]);

        User::factory(1)->create([
            'name' => 'BADO Yves',
            'email' => 'yves@gmail.com',
            'password' => Hash::make('delwende'),
        ]);
    }
}
