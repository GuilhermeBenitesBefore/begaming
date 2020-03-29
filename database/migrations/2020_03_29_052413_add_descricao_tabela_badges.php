<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescricaoTabelaBadges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasColumn('badges', 'descricao')) {
            try {
                Schema::table('badges', function (Blueprint $table) {
                    $table->string('descricao')->nullable()->after('deleted_at');
                });
            }catch (Exception $e){
                echo $e;
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('badges', 'descricao')) {
            try {
                Schema::table('badges', function (Blueprint $table) {
                    $table->dropColumn('descricao');
                });
            }catch(Exception $e){
                echo $e;
            }
        }
    }
}
