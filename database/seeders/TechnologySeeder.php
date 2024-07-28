<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // disabilito relazione tra tabelle se voglio usare truncate perchè non posso eliminare dei campi che hanno relazioni
        Schema::disableForeignKeyConstraints();
        // svuoto tabella per non duplicare seed
        Technology::truncate();

        // popolo technology con array
        $technologies = ['Frontend', 'Backend', 'Big Data', 'Cloud', 'IA', 'Machine learning'];

        // ciclo per popolare entità technology
        foreach ($technologies as $technology) {
            $new_technology = new Technology();

            $new_technology->name = $technology;
            $new_technology->slug = Str::of($new_technology->name)->slug();

            // salvo e lancio istanze nel database
            $new_technology->save();
        }
        //  dopo operazioni riabilito relazione tra tabelle type e project
        Schema::enableForeignKeyConstraints();
    }
}
