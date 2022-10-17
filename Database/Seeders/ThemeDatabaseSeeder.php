<?php

declare(strict_types=1);

namespace Modules\Theme\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class ThemeDatabaseSeeder.
 */
<<<<<<< HEAD
class ThemeDatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
=======
class ThemeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
>>>>>>> ede0df7 (first)
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
