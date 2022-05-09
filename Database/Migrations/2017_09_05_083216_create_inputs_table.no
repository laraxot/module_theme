<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\FormX\Models\Input as MyModel;

/**
 * Class CreateInputsTable.
 */
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
* Class CreateInputsTable
*/
class CreateInputsTable extends XotBaseMigration {
    public function getTable(): string {
        return with(new MyModel())->getTable();
    }

    /**
     * db up.
     *
     * @return void
     */
    public function up() {
        /*
        * create
        **/
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('type', 50)->nullable();
                $table->string('sub_type', 50)->nullable();

                $table->string('updated_by', 255)->nullable();
                $table->string('created_by', 255)->nullable();
                $table->timestamps();
            });
        }
        /*
        * update
        **/
        $this->tableUpdate(
            function (Blueprint $table) {
            /*
            if (! $this->hasColumn( 'updated_by')) {
                $table->string('updated_by', 255)->nullable()->after('updated_at');
            }
            if (! $this->hasColumn( 'created_by')) {
                $table->string('created_by', 255)->nullable()->after('created_at');
            }
            if (! $this->hasColumn( 'parent_id')) {
                $table->nullableMorphs('parent');
            }
            */
        });
    }

    /**
     * Undocumented function.
     *
     * @return void
     */

}
