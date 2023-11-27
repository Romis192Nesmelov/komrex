<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['head' => 'Наша миссия', 'text' => 'Обеспечить минимальную стоимость эксплуатации техники с учетом всех факторов, влияющих на затраты: выбор бренда, типоразмера, количество требуемой техники и сроков эксплуатации, методов замены и обновления парка.'],
            ['head' => 'Что мы предлагаем?', 'text' => 'Мы предлагаем комплексные решения и экспертизу для снижения удельных производственных затрат, повышения эффективности эксплуатации техники, сокращения количества простоев в работе оборудования за счет детального анализа параметров эксплуатации.'],
        ];

        foreach ($data as $item) {
            Content::create($item);
        }
    }
}
