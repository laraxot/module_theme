<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateBaseDatasTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('validator')->nullable();
                $table->string('default_value')->nullable();
                $table->boolean('mandatory');
                $table->string('type');
                $table->integer('category_id');
                $table->timestamps();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('updated_by')) {
                    $table->string('updated_by')->nullable()->after('updated_at');
                    $table->string('created_by')->nullable()->after('created_at');
                }
            }
        ); // end update
    }
}
