<?php

namespace Database\Seeders;

use App\Models\OurValue;
use Illuminate\Database\Seeder;

class OurValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => 'images/our_values/home_icon1.svg',
                'head' => 'Эффективность',
                'text' => 'Мы всегда ставим на первое место эффективность, снижение затрат, защиту окружающей среды - как в организации процессов внутри компании, так и при работе с заказчиком',
                'active' => 1
            ],
            [
                'image' => 'images/our_values/home_icon2.svg',
                'head' => 'Бизнес-этикет',
                'text' => 'Мы ведем бизнес честно, в соответствии с законодательством РФ (и других стран нашей деятельности), внутренними правилами компании, условиями и с учетом интересов наших клиентов',
                'active' => 1
            ],
            [
                'image' => 'images/our_values/home_icon3.svg',
                'head' => 'Экспертиза',
                'text' => 'Мы уделяем пристальное внимание экспертизе. Развитие, сохранение и защита экспертизы, которой владеет компания, является ключевой ценностью для наших сотрудников',
                'active' => 1
            ],
            [
                'image' => 'images/our_values/home_icon4.svg',
                'head' => 'Люди',
                'text' => 'Наши люди - это хранители экспертизы. Мы заботимся о каждом сотруднике, обеспечиваем надежные рабочие места с достойной оплатой труда и перспективой карьерного роста',
                'active' => 1
            ],
        ];

        foreach ($data as $item) {
            OurValue::create($item);
        }
    }
}
