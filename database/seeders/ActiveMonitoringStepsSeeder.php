<?php

namespace Database\Seeders;
use App\Models\ActiveMonitoringStep;
use Illuminate\Database\Seeder;

class ActiveMonitoringStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => 'images/am_images/am_step1.jpg',
                'head' => 'Выбор оборудования',
                'text' => 'На данном этапе происходит согласование объема подключения, зависит от конфигурации машины и пожеланий клиента по мониторингу.',
                'active' => 1
            ],
            [
                'image' => 'images/am_images/am_step2.jpg',
                'head' => 'Заключение договора и подключение оборудования',
                'text' => 'Наша бригада выезжает на подключение оборудования по согласованию в удобный для клиента день.',
                'active' => 1
            ],
            [
                'image' => 'images/am_images/am_step3.jpg',
                'head' => 'Настройка телеметрии, системных параметров и оповещений',
                'text' => 'Мы проверяем качество подключения и отображения рабочих параметров в системе мониторинга.',
                'active' => 1
            ],
            [
                'image' => 'images/am_images/am_step4.jpg',
                'head' => 'Согласование формата и наполнения отчетов',
                'text' => 'Мы готовы настроить формат отчета исходя из задач и пожеланий клиента.',
                'active' => 1
            ],
        ];

        foreach ($data as $item) {
            ActiveMonitoringStep::create($item);
        }
    }
}
