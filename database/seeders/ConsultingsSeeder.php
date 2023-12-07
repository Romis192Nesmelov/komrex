<?php

namespace Database\Seeders;

use App\Models\Consulting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['image' => 'images/consulting/consulting1.jpg', 'head' => 'Подбор парка техники', 'text' => 'Подбор парка техники является одним из первых этапов планирования земляных работ, от которого существенно зависит выполнение проекта в срок и в соответствии с планом. На данном этапе необходимо определиться с типом и количеством землеройной техники, требуемым навесным оборудованием. Специалисты КОМРЭКС помогут вам подобрать правильный парк техники с учетом задач, сроков и бюджета вашего проекта.'],
            ['image' => 'images/consulting/consulting2.jpg', 'head' => 'Анализ эффективности использования парка техники', 'text' => ''],
            ['image' => 'images/consulting/consulting3.jpg', 'head' => 'Обучение персонала', 'text' => 'Компания КОМРЭКС оказывает весь спектр услуг по комплексногму техническому обслуживанию Вашего оборудования. Бренд - производитель Вашей землеройной и дорожной техники или ее возраст не имеют значения. Мы учтем сервисные возможности Вашей организации и обеспечим решение, отвечающее Вашим ожиданиям.'],
        ];

        foreach ($data as $item) {
            Consulting::create($item);
        }
    }
}
