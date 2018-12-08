<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->delete();
        DB::table('faqs')->insert([
            0 => [
                'id' => '1',
                'question' => 'O que é o Bolsa livre?',
                'slug' => 'o-que-e-o-bolsa-livre',
                'answer' => 'O BolsaLivre.com é um site que oferece para toda e qualquer pessoa, bolsas de estudos parciais, disponibilizadas por instituições particulares parceiras.',
                'total_read' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            1 => [
                'id' => '2',
                'question' => 'O bolsa livre é mesmo para todos?',
                'slug' => 'o-bolsa-livre-e-mesmo-para-todos',
                'answer' => 'Sim. As bolsas são disponibilizadas para todas pessoas, que querem estudar pagando menos, que são antenadas em oportunidades e descontos, com mensalidades que cabem no bolso.',
                'total_read' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            2 => [
                'id' => '3',
                'question' => 'Como emitir o comprovante de pré-matrícula?',
                'slug' => 'como-emitir-o-comprovante-de-pre-matricula',
                'answer' => 'Após escolher a sua bolsa, clique em QUERO ESTA BOLSA, inscreva-se etapa seguinte - dados que vão constar no seu Comprovante de Pré-Matricula para conferência na instituição de ensino, clique em FINALIZAR COMPRA, efetue o pagamento pelo PagSeguro - através de boleto ou cartão de crédito - receba a confirmação por e-mail e a liberação do Comprovante de Pré Matrícula por e-mail e na sua conta no site.',
                'total_read' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            3 => [
                'id' => '4',
                'question' => 'Como saber que a bolsa está liberada para efetivar a matrícula?',
                'slug' => 'como-saber-que-a-bolsa-esta-liberada-para-efetivar-a-matricula',
                'answer' => 'Logo que o Comprovante de Pré-Matricula estiver disponível. A liberação do documento acontece após a compensação pagamento da taxa de inscrição, que é realizada aqui mesmo no site, via cartão de crédito ou boleto bancário. Ao contrario de outros projetos, o pagamento realizado é de uma taxa única, referente e equivalente a primeira mensalidade da instituição já com a bolsa, e garante a bolsa por toda etapa de formação ou por todo curso escolhido.',
                'total_read' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            4 => [
                'id' => '5',
                'question' => 'O Bolsa Livre Programa Educaional é seguro?',
                'slug' => 'o-bolsa-livre-programa-educaional-e-seguro',
                'answer' => 'Sim! Contribuímos com a educação no Rio de Janeiro desde 2011 em projetos similares através de sites, em projeto social de alfabetização de jovens que não tinham mais perspectivas.',
                'total_read' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            5 => [
                'id' => '6',
                'question' => 'O percentual da bolsa é válido durante toda etapa de formação?',
                'slug' => 'o-percentual-da-bolsa-e-valido-durante-toda-etapa-de-formacao',
                'answer' => 'Sim! Naturalmente podem ocorrer reajustes, mas o percentual liberado no comprovante de pré-matricula é valido até a conclusão do curso ou etapa de formação.',
                'total_read' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            6 => [
                'id' => '7',
                'question' => 'Caso aconteça algum problema com a matrícula ou com a bolsa?',
                'slug' => 'caso-aconteca-algum-problema-com-a-matrícula-ou-com-a-bolsa',
                'answer' => 'Vamos conferir o ocorrido, e prestar esclarecimentos imediatamente. Se a matrícula não puder ser efetivada vale a nossa política “bolsa garantida ou seu dinheiro de volta”, realizamos o estorno do valor integral pago ao site Bolsa Livre.',
                'total_read' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
