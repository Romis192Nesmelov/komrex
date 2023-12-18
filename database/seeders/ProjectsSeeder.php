<?php

namespace Database\Seeders;

use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use App\Models\ProjectType;
use App\Models\Project;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Активный мониторинг', 'active' => 1],
            ['name' => 'КТО', 'active' => 1],
            ['name' => 'Консалтинг', 'active' => 0],
            ['name' => 'Поставки', 'active' => 1],
        ];

        $projects = [
            ['head' => 'Передача LiuGong CLG777A с установленной системой АКТИВ-М', 'date' => 1685620800, 'text' => '<p>В рамках передачи новой техники клиенту было выполнено подключение оборудования к услуге Актив-М 12 месяцев, которое включало в себя: </p><ul><li>блоки телеметрии</li><li>камеры вперед и назад с онлайн регистратором</li><li>датчик температуры гидравлики</li><li>ДУТ</li><li>Датчики угла наклона на стрелу погрузчика и экскаватора для отслеживания работы машины в том и другом режиме. </li><li>взятие проб масел на анализ</li></ul><p>Так же в рамках передачи техники состоялась передача гидромолота Reschke 500FX и гидробура Reschke RA 700.<p>', 'project_type_id' => 1, 'active' => 1],
            ['head' => 'АКТИВ-М на самосвале HOWO', 'date' => 1698840000, 'text' => '<p>Подключение самосвала Howo к услуге Актив-М. В ходе обсуждения с клиентом было решено оборудовать машину следующими системами:</p><ul><li><b>Система телеметрии</b> (местоположение, считывание CAN шины, отслеживание стилей вождения, получение кодов событий и ошибок, получение рабочих параметров ТС, объединение всех систем мониторинга и передача данных на сервер) </li><li>Подключение <b>коробки отбора мощности и установка <b>датчика угла наклона на кузов</b> (контроль использования кузова, контроль эксплуатации, время циклов, контроль движения с поднятым кузовом) </li><li><b>Онлайн видеорегистратор</b> в кабине (для контроля работы водителя)</li><li><b>ДУТ</b></li><li><b>Система контроля давления и температуры воздуха в шинах</b> (демо 3 месяца) (для предотвращения эксплуатации машины со спущенными шинами, что может привести к увеличению расхода топлива и износа шин, снижению общей безопасности управления ТС)<li><b>Система взвешивания</b> (демо 3 месяца) (для контроля загрузок и разгрузок, недогруза, перегруза, времени циклов). </li></ul>', 'project_type_id' => 1, 'active' => 1],
            ['head' => 'Подбор парка техники для выполнения земляных работ в сжатые сроки.', 'text' => '<p>Перед клиентом стояла задача в ограниченные сроки выполнить работы по перемещению грунта расчетным объемом 71000 м3. К нам клиент обратился с просьбой помочь рассчитать оптимальное технологическое звено исходя из сроков, возможности арендовать машины, общей стоимости работ и себестоимости 1м3. После посещения объекта и сбора необходимой информации нами были проведены расчеты, проанализированы несколько сценариев и предложены оптимальные варианты для выполнения поставленных задач.</p>', 'project_type_id' => 3, 'active' => 1],
        ];

        $projectsImages = [17,15,4];

        foreach ($types as $type) {
            ProjectType::create($type);
        }

        foreach ($projects as $k => $project) {
            $item = Project::create($project);
            for ($i=1;$i<=$projectsImages[$k];$i++) {
                ProjectImage::create([
                    'image' => 'images/projects/project_type'.$item->project_type_id.'/project'.$item->id.'_'.$i.'.jpg',
                    'project_id' => $item->id
                ]);
            }
        }
    }
}
