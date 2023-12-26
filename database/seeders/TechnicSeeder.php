<?php

namespace Database\Seeders;

use App\Models\ConstructiveFeature;
use App\Models\Technic;
use App\Models\TechnicImage;
use App\Models\TechnicType;
use Illuminate\Database\Seeder;

class TechnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataTypes = [
            ['name' => 'Погрузчики', 'active' => 1],
            ['name' => 'Бульдозеры', 'active' => 1],
            ['name' => 'Автогрейдеры', 'active' => 1],
            ['name' => 'Грунтовые катки', 'active' => 1],
            ['name' => 'Экскаваторы гусеничные', 'active' => 1],
        ];

        $dataTechnic = [
            [
                'name' => 'SEM636D',
                'weight' => 9900,
                'power' => 125,
                'load_capacity' => 3000,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 1
            ],
            [
                'name' => 'SEM653D',
                'weight' => 16600,
                'power' => 220,
                'load_capacity' => 5000,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 1
            ],
            [
                'name' => 'SEM655D',
                'weight' => 16800,
                'power' => 220,
                'load_capacity' => 5000,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 1
            ],
            [
                'name' => 'SEM656D',
                'weight' => 16900,
                'power' => 220,
                'load_capacity' => 5000,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 1
            ],
            [
                'name' => 'SEM658D',
                'weight' => 17200,
                'power' => 220,
                'load_capacity' => 5000,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 1
            ],
            [
                'name' => 'SEM660D',
                'weight' => 20000,
                'power' => 240,
                'load_capacity' => 6000,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 1
            ],
            [
                'name' => 'SEM668D',
                'weight' => 20100,
                'power' => 240,
                'load_capacity' => 6000,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 1
            ],
            [
                'name' => 'SEM816D',
                'weight' => 16900,
                'power' => 131,
                'traction_force' => 280,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 2
            ],
            [
                'name' => 'SEM826D',
                'weight' => 24000,
                'power' => 191,
                'traction_force' => 350,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 2
            ],
            [
                'name' => 'SEM832F',
                'weight' => 38700,
                'power' => 253,
                'traction_force' => 624,
                'komrex' => false,
                'active' => false,
                'technic_type_id' => 2
            ],
            [
                'name' => 'SEM915',
                'weight' => 12500,
                'power' => 110,
                'traction_force' => 71,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 3
            ],
            [
                'name' => 'SEM917',
                'weight' => 13800,
                'power' => 125,
                'traction_force' => 78,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 3
            ],
            [
                'name' => 'SEM919',
                'weight' => 15000,
                'power' => 140,
                'traction_force' => 78,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 3
            ],
            [
                'name' => 'SEM921',
                'weight' => 15900,
                'power' => 162,
                'traction_force' => 85,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 3
            ],
            [
                'name' => 'SEM922 AWD',
                'weight' => 16600,
                'power' => 162,
                'traction_force' => 112,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 3
            ],
            [
                'name' => 'SEM510',
                'weight' => 10000,
                'power' => 97.5,
                'drum_static_pressure' => 217,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 4
            ],
            [
                'name' => 'SEM512',
                'weight' => 12000,
                'power' => 97.5,
                'drum_static_pressure' => 317,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 4
            ],
            [
                'name' => 'SEM514F',
                'weight' => 12000,
                'power' => 125,
                'drum_static_pressure' => 377,
                'komrex' => false,
                'active' => false,
                'technic_type_id' => 4
            ],
            [
                'name' => 'SEM518',
                'weight' => 12000,
                'power' => 129,
                'drum_static_pressure' => 415,
                'komrex' => false,
                'active' => true,
                'technic_type_id' => 4
            ],
            [
                'name' => 'KOMREX KX230',
                'weight' => 22300,
                'power' => 124,
                'engine_model' => 'Cummins QSB7',
                'komrex' => true,
                'characteristics' => '<table class="table table-striped"><tbody><tr><td class="text-start">ПАРАМЕТР</td><td class="text-center">ЕДИНИЦА ИЗМЕРЕНИЯ</td><td class="text-center">ЗНАЧЕНИЕ</td></tr><tr><td class="text-start">Рабочий&nbsp;вес</td><td class="text-center">кг</td><td class="text-center">22 300</td></tr><tr><td class="text-start">Вместимость&nbsp;ковша</td><td class="text-center">м&sup3;</td><td class="text-center">1.0</td></tr><tr><td class="text-start">Усилие&nbsp;копания на&nbsp;ковше</td><td class="text-center">кН</td><td class="text-center">146.4</td></tr><tr><td class="text-start">Скорость&nbsp;вращения башни</td><td class="text-center">об/мин</td><td class="text-center">10.7</td></tr><tr><td class="text-start">Длина&nbsp;стрелы</td><td class="text-center">мм</td><td class="text-center">5 700</td></tr><tr><td class="text-start">Длина&nbsp;рукояти</td><td class="text-center">мм</td><td class="text-center">2 900</td></tr><tr><td class="text-start">Противовес</td><td class="text-center">кг</td><td class="text-center">3 900</td></tr><tr><td class="text-start">Емкость&nbsp;топливного&nbsp;бака</td><td class="text-center">литры</td><td class="text-center">350</td></tr><tr><td class="text-start">ДВИГАТЕЛЬ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-start">Модель</td><td class="text-center">&nbsp;</td><td class="text-center">Cummins&nbsp;&nbsp;QSB7</td></tr><tr><td class="text-start">Объем двигателя</td><td class="text-center">литры</td><td class="text-center">6.7</td></tr><tr><td class="text-start">Мощность</td><td class="text-center">кВт</td><td class="text-center">124</td></tr><tr><td class="text-start">Предел&nbsp;выбросов</td><td class="text-center">&nbsp;</td><td class="text-center">TIER&nbsp;3</td></tr><tr><td class="text-start">ХОДОВАЯ ЧАСТЬ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-start">Длина&nbsp;ходовой</td><td class="text-center">мм</td><td class="text-center">4 460</td></tr><tr><td class="text-start">Ширина колеи (по центру гусениц)</td><td class="text-center">мм</td><td class="text-center">2 400</td></tr><tr><td class="text-start">Количество&nbsp;гусеничных&nbsp;башмаков</td><td class="text-center">&nbsp;</td><td class="text-center">98</td></tr><tr><td class="text-start">Ширина&nbsp;башмаков</td><td class="text-center">мм</td><td class="text-center">600</td></tr><tr><td class="text-start">Количество&nbsp;нижних&nbsp;роликов</td><td class="text-center">&nbsp;</td><td class="text-center">18</td></tr><tr><td class="text-start">Количество&nbsp;несущих&nbsp;роликов</td><td class="text-center">&nbsp;</td><td class="text-center">4</td></tr><tr><td class="text-start">ГИДРАВЛИЧЕСКАЯ&nbsp;СИСТЕМА</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-start">Модель&nbsp;гидравлического&nbsp;насоса</td><td class="text-center">&nbsp;</td><td class="text-center">Kawasaki&nbsp;&nbsp;K3V112DT-1X8R-9NZ1-V</td></tr><tr><td class="text-start">Гидромотор поворота башни&nbsp;</td><td class="text-center">&nbsp;</td><td class="text-center">Doosan&nbsp;M2X130CHB</td></tr><tr><td class="text-start">Модель&nbsp;главного&nbsp;гидравлического&nbsp;клапана&nbsp;</td><td class="text-center">&nbsp;</td><td class="text-center">Kawasaki&nbsp;&nbsp;KMX15RA/B45065B</td></tr><tr><td class="text-start">Скорость&nbsp;потока</td><td class="text-center">л/мин</td><td class="text-center">2 х 212</td></tr><tr><td class="text-start">Максимальное давление</td><td class="text-center">MPa</td><td class="text-center">34.3</td></tr><tr><td class="text-start">Емкость&nbsp;гидравлической системы</td><td class="text-center">литры</td><td class="text-center">240</td></tr><tr><td class="text-start">ГАБАРИТЫ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-start">Общая&nbsp;длина</td><td class="text-center">мм</td><td class="text-center">9 600</td></tr><tr><td class="text-start">Общая&nbsp;ширина</td><td class="text-center">мм</td><td class="text-center">3 000</td></tr><tr><td class="text-start">Общая&nbsp;высота&nbsp;(верхняя&nbsp;часть&nbsp;стрелы)</td><td class="text-center">мм</td><td class="text-center">3 005</td></tr><tr><td class="text-start">Общая&nbsp;высота&nbsp;(верх&nbsp;кабины)</td><td class="text-center">мм</td><td class="text-center">3 000</td></tr><tr><td class="text-start">Дорожный&nbsp;просвет</td><td class="text-center">мм</td><td class="text-center">475</td></tr><tr><td class="text-start">Радиус&nbsp;поворота&nbsp;задней части платформы</td><td class="text-center">мм</td><td class="text-center">2 794</td></tr><tr><td class="text-start">Ширина&nbsp;башмака&nbsp;гусеницы</td><td class="text-center">мм</td><td class="text-center">600</td></tr><tr><td class="text-start">Ширина&nbsp;верхней&nbsp;конструкции</td><td class="text-center">мм</td><td class="text-center">2 800</td></tr><tr><td class="text-start">Минимальный&nbsp;радиус&nbsp;поворота</td><td class="text-center">мм</td><td class="text-center">3 560</td></tr><tr><td class="text-start">Дорожный&nbsp;просвет&nbsp;под противовесом</td><td class="text-center">мм</td><td class="text-center">1 096</td></tr><tr><td class="text-start">Длина&nbsp;опорной части гусениц</td><td class="text-center">мм</td><td class="text-center">3 660</td></tr><tr><td class="text-start">РАБОЧИЕ&nbsp;ДИАПАЗОНЫ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-start">Максимальная&nbsp;высота&nbsp;резания</td><td class="text-center">мм</td><td class="text-center">9 616</td></tr><tr><td class="text-start">Максимальная&nbsp;высота&nbsp;загрузки</td><td class="text-center">мм</td><td class="text-center">6 830</td></tr><tr><td class="text-start">Максимальная&nbsp;глубина&nbsp;копания</td><td class="text-center">мм</td><td class="text-center">6 592</td></tr><tr><td class="text-start">Максимальная глубина выемки с горизонтальным плоским</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-start">дном длиной 2 500 мм</td><td class="text-center">мм</td><td class="text-center">6 090</td></tr><tr><td class="text-start">Максимальный вылет&nbsp;на уровне опорной поверхности</td><td class="text-center">мм</td><td class="text-center">9 752</td></tr></tbody></table>',
                'description' => '<p>Гидравлические экскаваторы KOMREX KX230 – это Ваш надежный партнер на стройплощадке. Машина может быть оснащена ковшом объемом от 1 до 1.2 м3, общего назначения либо усиленным, а также гидролиниями высокого давления для подключения навесного оборудования. Все компоненты, узлы и агрегаты изготовлены всемирно известными брендами: Kawasaki, Doosan, Eaton, что обеспечивает высокую надежность, стабильную производительность и эффективность эксплуатации. А оснащение машины системой активного комплексного мониторинга АКТИВ-М поможет повысить полезную работу машины и снизить эксплуатационные затраты.</p>',
                'active' => true,
                'technic_type_id' => 5
            ],
        ];

        $dataConstructiveFeature = [
            [
                'head' => 'Система активного комплексного мониторинга',
                'text' => '<p>Все экскаваторы KOMREX оснащены системой активного комплексного мониторинга АКТИВ-М, которая позволяет наблюдать за основными рабочими параметрами машины в режиме реального времени, отслеживать геопозицию, полезную работу (под нагрузкой), работу на холостом ходу и простои, видеть уровень и расход топлива, а также заправки и сливы топлива, отслеживать интервалы ТО.</p>',
            ],
            [
                'head' => 'Электронный двигатель Cummins QSB7',
                'text' => '<p>Электронный двигатель Cummins QSB7 с электронным блоком управления и системой впрыска топлива Common Rail имеет отличную топливную экономичность в сочетании с высокой полезной мощностью. Двигатель соответствует требованиям стандарта Tier 3 США и Stage IIIA ЕС. Система фильтрации топлива с тремя фильтрами и влагоотделителем надежно очищает топливо перед его подачей в двигатель.</p>',
            ],
            [
                'head' => 'Режим автоматического холостого хода',
                'text' => '<p>Машина оборудована системой автоматического холостого хода, которая переводит обороты двигателя на холостые в случае отсутствия нагрузки на гидравлику, что дополнительно позволяет снизить расход топлива.</p>',
            ],
            [
                'head' => 'Гидравлические насосы и гидрораспределитель Kawasaki',
                'text' => '<p>Kawasaki – мировой лидер в разработке и производстве гидравлических насосов. Гидравлические компоненты этой фирмы обеспечивают надежность, стабильную производительность и эффективность работы экскаваторов KOMREX во всем диапазоне нагрузок.</p>',
            ],
            [
                'head' => 'Двухступенчатая фильтрация впускного воздуха',
                'text' => '<p>Экскаваторы KOMREX оснащены системой предварительной фильтрации воздуха (циклон), что позволяет продлить срок службы основных воздушных фильтров двигателя. Фильтр-циклон: это  повышенная степень фильтрации впускного воздуха и быстрая и удобная очистка.</p>',
            ],
            [
                'head' => 'Кабина оператора',
                'text' => '<p>Комфортная кабина оснащена системой климат-контроля и радио. Сиденье оператора с механическими регулировками обеспечивает комфортную посадку оператора. Посадка и выход из кабины осуществляются без препятствий. Остекление кабины имеет хорошую обзорность.</p>',
            ],
            [
                'head' => 'Защитные решетки',
                'text' => '<p>Кабина экскаватора KOMREX KX230 оснащена системами безопасности ROPS/FOPS, а также защитными решетками на лобовом стекле и крыше, которые дополнительно защищают оператора спецтехники от падения незакрепленных предметов, инструмента, а также того или иного оборудования, применяемого на объекте.</p>',
            ],
            [
                'head' => 'Основной дисплей и наружные камеры',
                'text' => '<p>Машина оборудована камерами бокового и заднего вида вместе с дополнительным ЖК дисплеем в кабине оператора. Это позволяет повысить безопасность и комфорт эксплуатации машины и снизить усталость оператора. Камеры могут работать при низких температурах окружающей среды, а также надежно защищены от внешнего воздействия.</p>',
            ],
        ];

        $images = glob(base_path('public/images/technics/*'));

        foreach ($dataTypes as $type) {
            TechnicType::create($type);
        }

        $technicId = 0;
        foreach ($dataTechnic as $technic) {
            $item = Technic::create($technic);
            $technicId = $item->id;
            if ($technic['active']) {
                foreach ($images as $image) {
                    $pathInfo = pathinfo($image);
                    if (preg_match('/^(technic_('.str_replace(' ','_', $technic['name']).')_(\d+))$/ui',$pathInfo['filename'])) {
                        TechnicImage::create([
                            'image' => 'images/technics/'.$pathInfo['basename'],
                            'technic_id' => $technicId
                        ]);
                    }
                }
            }
        }

        foreach ($dataConstructiveFeature as $k => $item) {
            $item['image'] = 'images/tech_images/tech_image'.($k + 1).'.jpg';
            $item['technic_id'] = $technicId;
            $item['active'] = 1;
            ConstructiveFeature::create($item);
        }
    }
}
