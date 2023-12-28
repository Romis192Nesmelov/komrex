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
            ['name' => 'Консалтинг', 'active' => 1],
            ['name' => 'Поставки', 'active' => 1],
        ];

        $projects = [
            [
                'head' => 'АКТИВ-М на самосвале HOWO',
                'date' => 1698840000,
                'text' => '<p>Подключение самосвала Howo к услуге Актив-М. В ходе обсуждения с клиентом было решено оборудовать машину следующими системами:</p><ul><li><b>Система телеметрии</b> (местоположение, считывание CAN шины, отслеживание стилей вождения, получение кодов событий и ошибок, получение рабочих параметров ТС, объединение всех систем мониторинга и передача данных на сервер) </li><li>Подключение <b>коробки отбора мощности и установка <b>датчика угла наклона на кузов</b> (контроль использования кузова, контроль эксплуатации, время циклов, контроль движения с поднятым кузовом) </li><li><b>Онлайн видеорегистратор</b> в кабине (для контроля работы водителя)</li><li><b>ДУТ</b></li><li><b>Система контроля давления и температуры воздуха в шинах</b> (демо 3 месяца) (для предотвращения эксплуатации машины со спущенными шинами, что может привести к увеличению расхода топлива и износа шин, снижению общей безопасности управления ТС)<li><b>Система взвешивания</b> (демо 3 месяца) (для контроля загрузок и разгрузок, недогруза, перегруза, времени циклов). </li></ul>',
                'project_type_id' => 1,
                'active' => 1
            ],
            [
                'head' => 'АКТИВ-М на XCMG XE150WB',
                'date' => 1698840000,
                'text' => '<p>В ходе обсуждения с клиентом было решено подключить машину к системе АКТИВ-М и оборудовать ее следующими устройствами:</p><ul><li>блок телеметрии для подключения к CAN машины для отслеживания параметров работы</li><li>блок телеметрии с выносной антенной для подключения к CAN двигателя для отслеживания его работы</li><li>датчик угла наклона на стрелу для отслеживания полезной работы машины</li><li>датчик уровня топлива Bluetooth</li></ul><p>В ходе наблюдения за эксплуатацией машины были замечены сливы топлива в ночные часы, о чем клиент был своевременно проинформирован. Было решено заменить крышку горловины топливного бака на крышку с замком, после чего сливы топлива прекратились.</p>',
                'project_type_id' => 1,
                'active' => 1
            ],
            [
                'head' => 'Подбор парка техники для земляных работ.',
                'text' => '<p>Перед клиентом стояла задача в ограниченные сроки выполнить работы по перемещению грунта расчетным объемом 71000 м3. К нам клиент обратился с просьбой помочь рассчитать оптимальное технологическое звено исходя из сроков, возможности арендовать машины, общей стоимости работ и себестоимости 1м3. После посещения объекта и сбора необходимой информации нами были проведены расчеты, проанализированы несколько сценариев и предложены оптимальные варианты для выполнения поставленных задач.</p>',
                'project_type_id' => 3,
                'active' => 1
            ],
            [
                'head' => 'Инспекция б/у JCB JS160W',
                'text' => '<p>Для оценки целесообразности приобретения б/у колесного экскаватора JCB JS160W по просьбе клиента была проведена детальная инспекция всей машины с применением диагностического оборудования. В частности, были выявлены критические проблемы, которые могли бы привести к серьезным поломкам и дорогостоящему ремонту. По результатам инспекции клиенту был предоставлен отчет с общей оценкой состояния машины, а также детальные комментарии с фото/видео, рекомендациями по решению потенциальных проблем, а также ориентировочную стоимость дальнейшего ремонта и восстановления.</p>',
                'project_type_id' => 3,
                'active' => 1
            ],
            [
                'head' => 'Передача LiuGong CLG777A с АКТИВ-М',
                'date' => 1685620800,
                'text' => '<p>Экскаватор-погрузчик LiuGong CLG 777A подключен к системе активного комплексного мониторинга АКТИВ-М.</p><p>В рамках поставки состоялась передача гидромолота Reschke 500FX и гидробура Reschke RA 700.<p>',
                'project_type_id' => 4,
                'active' => 1
            ],
        ];

        $projectsImages = [
            [
                'images/projects/project_type1/project1_1.jpg',
                'images/projects/project_type1/project1_2.jpg',
                'images/projects/project_type1/project1_3.jpg',
                'images/projects/project_type1/project1_4.jpg',
                'images/projects/project_type1/project1_5.jpg',
                'images/projects/project_type1/project1_6.jpg',
                'images/projects/project_type1/project1_7.jpg',
                'images/projects/project_type1/project1_8.jpg',
                'images/projects/project_type1/project1_9.jpg',
                'images/projects/project_type1/project1_10.jpg',
                'images/projects/project_type1/project1_11.jpg',
                'images/projects/project_type1/project1_12.jpg',
                'images/projects/project_type1/project1_13.jpg',
                'images/projects/project_type1/project1_14.jpg',
                'images/projects/project_type1/project1_15.jpg',
            ],
            [
                'images/projects/project_type1/project2_16.jpg',
                'images/projects/project_type1/project2_17.jpg',
                'images/projects/project_type1/project2_18.jpg',
                'images/projects/project_type1/project2_19.jpg',
                'images/projects/project_type1/project2_20.jpg',
            ],
            [
                'images/projects/project_type3/project3_21.jpg',
                'images/projects/project_type3/project3_22.jpg',
                'images/projects/project_type3/project3_23.jpg',
                'images/projects/project_type3/project3_24.jpg',
            ],
            [
                'images/projects/project_type3/project4_25.jpg',
                'images/projects/project_type3/project4_26.jpg',
                'images/projects/project_type3/project4_27.jpg',
                'images/projects/project_type3/project4_28.jpg',
                'images/projects/project_type3/project4_29.jpg',
            ],
            [
                'images/projects/project_type4/project4_30.jpg',
                'images/projects/project_type4/project4_31.jpg',
                'images/projects/project_type4/project4_32.jpg',
                'images/projects/project_type4/project4_33.jpg',
                'images/projects/project_type4/project4_34.jpg',
                'images/projects/project_type4/project4_35.jpg',
                'images/projects/project_type4/project4_36.jpg',
            ],
        ];

        foreach ($types as $type) {
            ProjectType::create($type);
        }

        $imagesCounter = 0;
        foreach ($projects as $project) {
            $item = Project::create($project);
            foreach ($projectsImages[$imagesCounter] as $projectsImage) {
                ProjectImage::create([
                    'image' => $projectsImage,
                    'project_id' => $item->id
                ]);
            }
            $imagesCounter++;
        }
    }
}
