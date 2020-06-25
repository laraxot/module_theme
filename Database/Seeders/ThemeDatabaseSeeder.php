<?php

namespace Modules\Theme\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ThemeDatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run() {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
