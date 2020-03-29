<?php

use Illuminate\Database\Schema\Blueprint;
//----- models -----

//----- bases ----
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateThemesTable extends XotBaseMigration {
    //use XotBaseMigrationTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //-- CREATE --
        if (! $this->tableExists()) {
            $this->getConn()->create($this->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('version')->nullable();
                $table->text('txt')->nullable();
                $table->string('link')->nullable();
                $table->integer('status')->nullable();
            });
        }//end create

        //-- UPDATE --
        $this->getConn()->table($this->getTable(), function (Blueprint $table) {
            if (! $this->hasColumn('updated_at')) {
                $table->timestamps();
            }
            if (! $this->hasColumn('updated_by')) {
                $table->string('updated_by')->nullable()->after('updated_at');
                $table->string('created_by')->nullable()->after('created_at');
            }
        }); //end update
    }

    //end function up
}
