<?php

use App\Badge;
use App\Point;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class AddNiveisTabelaBadges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('badges', function (Blueprint $table) {
            $table->integer('pontuacao_nivel_classic');
            $table->integer('pontuacao_nivel_silver');
            $table->integer('pontuacao_nivel_gold');
            $table->integer('pontuacao_nivel_black');
        });

        DB::table('badges')
            ->where('id', '=', Badge::ADMIRACAO)
            ->update([
                         'pontuacao_nivel_classic' => 4,
                         'pontuacao_nivel_silver'  => 8,
                         'pontuacao_nivel_gold'    => 12,
                         'pontuacao_nivel_black'   => 16,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::BEM_ESTAR)
            ->update([
                         'pontuacao_nivel_classic' => 100,
                         'pontuacao_nivel_silver'  => 200,
                         'pontuacao_nivel_gold'    => 300,
                         'pontuacao_nivel_black'   => 400,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::CURSOS_PALESTRAS)
            ->update([
                         'pontuacao_nivel_classic' => 150,
                         'pontuacao_nivel_silver'  => 250,
                         'pontuacao_nivel_gold'    => 350,
                         'pontuacao_nivel_black'   => 500,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::PALESTRAR)
            ->update([
                         'pontuacao_nivel_classic' => 15,
                         'pontuacao_nivel_silver'  => 30,
                         'pontuacao_nivel_gold'    => 45,
                         'pontuacao_nivel_black'   => 60,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::DESEMPENHO_META)
            ->update([
                         'pontuacao_nivel_classic' => 80,
                         'pontuacao_nivel_silver'  => 100,
                         'pontuacao_nivel_gold'    => 110,
                         'pontuacao_nivel_black'   => 120,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::TEMPO_EMPRESA)
            ->update([
                         'pontuacao_nivel_classic' => 4,
                         'pontuacao_nivel_silver'  => 8,
                         'pontuacao_nivel_gold'    => 12,
                         'pontuacao_nivel_black'   => 16,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::COMPETICOES_INTERNAS)
            ->update([
                         'pontuacao_nivel_classic' => 10,
                         'pontuacao_nivel_silver'  => 20,
                         'pontuacao_nivel_gold'    => 30,
                         'pontuacao_nivel_black'   => 40,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::CULTURA)
            ->update([
                         'pontuacao_nivel_classic' => 4,
                         'pontuacao_nivel_silver'  => 8,
                         'pontuacao_nivel_gold'    => 12,
                         'pontuacao_nivel_black'   => 16,
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::ATITUDE_EXTRAORDINARIA)
            ->update([
                         'pontuacao_nivel_classic' => 1,
                         'pontuacao_nivel_silver'  => 1,
                         'pontuacao_nivel_gold'    => 1,
                         'pontuacao_nivel_black'   => 1,
                     ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('badges', function (Blueprint $table) {
            $table->dropColumn(['pontuacao_nivel_classic',
                                'pontuacao_nivel_silver',
                                'pontuacao_nivel_gold',
                                'pontuacao_nivel_black']);
        });
    }
}
