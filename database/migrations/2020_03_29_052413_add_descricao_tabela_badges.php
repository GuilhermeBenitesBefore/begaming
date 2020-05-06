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
            $table->longText('descricao')->nullable()->after('deleted_at');
        });

        DB::table('badges')
            ->where('id', '=', Badge::ADMIRACAO)
            ->update([
                         'descricao' => 'Conhecido como “badge do elogio”, reconhecendo formalmente os elogios recebidos. Uma forma de mostrar que todos reconhecem suas virtudes!'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::BEM_ESTAR)
            ->update([
                         'descricao' => 'Este badge pontua ações relacionadas à qualidade de vida e à saúde, como adesão à academia parceira da Before (Via Olímpica) e participação em eventos esportivos, etc. É um estímulo para termos uma vida saudável!'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::CURSOS_PALESTRAS)
            ->update([
                         'descricao' => 'Ações de desenvolvimento profissional, como graduações, participação em cursos e palestras presenciais ou online, promoção de eventos com temas relevantes. Um incentivo para buscar conhecimento!'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::PALESTRAR)
            ->update([
                         'descricao' => 'Incentivo à compartilhar seu conhecimento com os demais, válido tanto para palestras realizadas dentro e fora da Before, de pequeno a grande porte. Mais um incentivo para dividirmos conhecimento e colaborarmos com a vida das pessoas!'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::DESEMPENHO_META)
            ->update([
                         'descricao' => 'Reconhecimento relacionado às metas estabelecidas e atingidas no time, contabilizando o acumulado durante o ano. Cada time possui suas metas e entendemos que, para atingi-las, é preciso que aja dedicação de cada um. No final do ano, vamos conferir quais times atingiram as metas e se o seu time atingiu, você ganha também!'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::TEMPO_EMPRESA)
            ->update([
                         'descricao' => 'Conforme tempo de trabalho na Before, sendo conquistado de 4 em 4 anos. Nossa valorização da sua dedicação à Before!'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::COMPETICOES_INTERNAS)
            ->update([
                         'descricao' => 'Disputas entre os times em datas específicas ou momentos oportunos, fomentando um ambiente de trabalho mais descontraído e interação entre os colegas. Estímulo para que todos brinquem e colaborem para um dia a dia de trabalho mais interessante!'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::CULTURA)
            ->update([
                         'descricao' => 'Reconhecimento do reconhecimento. Quanto mais badges você tiver, mais perto de ganhar este você estará, mostrando que está vivendo a cultura da Before.'
                     ]);

        DB::table('badges')
            ->where('id', '=', Badge::ATITUDE_EXTRAORDINARIA)
            ->update([
                         'descricao' => 'Para conquistar este badge, basta uma ação fora do comum que agregue valor à Before em qualquer sentido. Nós reconhecemos quando você vai além dos seus limites e nós acreditamos no seu potencial!'
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
