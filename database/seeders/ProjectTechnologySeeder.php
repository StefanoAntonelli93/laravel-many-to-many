<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectTechnology;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ciclo x5
        for ($i = 0; $i < 5; $i++) {
            // creo nuova istanza project_technology
            $new_project_technology = new ProjectTechnology();

            // prendo in oridne casuale il primo id di project e technology
            $new_project_technology->project_id = Project::inRandomOrder()->first()->id;
            $new_project_technology->technology_id = Technology::inRandomOrder()->first()->id;
            // salvo modifiche nel seeder
            $new_project_technology->save();
        }
    }
}
