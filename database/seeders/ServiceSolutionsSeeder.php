<?php

namespace Database\Seeders;

use App\Models\ServiceSolution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['head' => 'Профессиональные инспекции', 'text' => '<p>Мы предлагаем два вида инспекций: базовая и глубокая/детальная, а также поможем взять пробы масла, сдать их в лабораторию и интерпретировать результаты анализов. В результате вы получите детальный отчет с фото/видео и рекомендациями по ремонту.</p><ul><li>Для оценки текущего технического состояния и необходимого ремонта;</li><li>Для поддержания оборудования в рабочем состоянии, исключения катастрофической дорогостоящей поломки и внепланового длительного простоя.</li></ul>'],
            ['head' => 'Комплексное техническое обслуживание', 'text' => '<p>Компания КОМРЭКС оказывает услуги по комплексному техническому обслуживанию оборудования с учетом сервисных возможностей вашей организации. Мы проведем ТО, поставим материалы для него, обеспечим контроль технического состояния машин и расскажем, как избежать простоев в работе техники. Мы сделаем для вас наиболее выгодное предложение для поддержания техники в рабочем состоянии.</p>'],
            ['head' => 'Текущие ремонты', 'text' => '<p>Высококвалифицированные инженеры-механики полевого сервиса КОМРЭКС проведут своевременную диагностику и помогут выбрать оптимальный метод проведения необходимого текущего ремонта. Своевременная поставка запчастей любых брендов сократит время простоя.</p>'],
            ['head' => 'Восстановление агрегатов и компонентов', 'text' => '<p>Рекомендации по ремонтопригодности, экономической эффективности и оптимизации оборотного фонда агрегатов и компонентов для ваших землеройных и дорожных машин сократят сроки проведения крупных ремонтов. Разумные цены, четкие сроки поставки и гарантия на все услуги позволят вам провести ремонт или замену агрегатов с минимальными затратами и простоем оборудования.</p>'],
        ];

        foreach ($data as $k => $item) {
            $item['image'] = 'images/service_solutions/ss'.($k+1).'.jpg';
            $item['active'] = 1;
            ServiceSolution::create($item);
        }
    }
}
