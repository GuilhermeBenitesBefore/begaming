<?php

use App\Badge;
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
        Schema::table('badges', function (Blueprint $table) {
            $table->string('descricao')->nullable()->after('deleted_at');
        });

        DB::table('badges')
            ->where('id', '=', Badge::ADMIRACAO)
            ->update([
                         'descricao' => 'Conhecido como “badge do elogio”, reconhecendo formalmente os elogios recebidos.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::BEM_ESTAR)
            ->update([
                         'descricao' => 'Ações relacionadas à qualidade de vida e à saúde, como adesão à academia parceira da Before (Via Olímpica), participação em eventos esportivos, redução de gordura corporal, etc.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::CURSOS_PALESTRAS)
            ->update([
                         'descricao' => 'Ações de desenvolvimento profissional, como graduações, participação em cursos e palestras presenciais ou online, promoção de eventos com temas relevantes.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::PALESTRAR)
            ->update([
                         'descricao' => 'Incentivo a compartilhar seu conhecimento com os demais, válido para palestras realizadas dentro e fora da Before, de pequeno a grande porte.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::DESEMPENHO_META)
            ->update([
                         'descricao' => ''
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::TEMPO_EMPRESA)
            ->update([
                         'descricao' => 'Conforme tempo de trabalho na Before, sendo conquistado de 4 em 4 anos.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::COMPETICOES_INTERNAS)
            ->update([
                         'descricao' => 'Disputas entre os times, fomentando um ambiente de trabalho mais descontraído e interação entre os colegas.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::CULTURA)
            ->update([
                         'descricao' => 'Reconhecimento do reconhecimento. Quanto mais badges você tiver, mais perto de ganhar este você estará, mostrando que está vivendo a cultura da Before.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::ATITUDE_EXTRAORDINARIA)
            ->update([
                         'descricao' => 'Para conquistar este badge, basta uma ação fora do comum que agregue valor à Before em qualquer sentido.'
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
            $table->dropColumn('descricao');
        });
    }
}
