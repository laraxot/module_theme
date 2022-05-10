<?php

declare(strict_types=1);

namespace Modules\Theme\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class ThemeDatabaseSeeder.
 */
class ThemeDatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
