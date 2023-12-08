<?php

namespace Database\Seeders;

use App\Models\Technic;
use App\Models\TechnicImage;
use App\Models\TechnicType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TechnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Экскаваторы гусеничные', 'active' => 1],
            ['name' => 'Экскаваторы колесные', 'active' => 1],
            ['name' => 'Бульдозеры гусеничные', 'active' => 1],
            ['name' => 'Автогрейдеры', 'active' => 1],
        ];

        foreach ($data as $item) {
            $technicType = TechnicType::create($item);
            for ($i=0;$i<rand(10,100);$i++) {
                $technic = Technic::create([
                    'name' => Str::random(3).rand(100,500),
                    'weight' => rand(10000,50000),
                    'power' => rand(100,300),
                    'engine_model' => Str::random(2).rand(10,50).Str::random(2).rand(10,50),
                    'komrex' => rand(1,0),
                    'characteristics' => '<table class="table table-striped"><tbody><tr><td class="text-left">ПАРАМЕТР</td><td class="text-center">ЕДИНИЦА ИЗМЕРЕНИЯ</td><td class="text-center">ЗНАЧЕНИЕ</td></tr><tr><td class="text-left">Рабочий&nbsp;вес</td><td class="text-center">кг</td><td class="text-center">22300</td></tr><tr><td class="text-left">Вместимость&nbsp;ковша</td><td class="text-center">м?</td><td class="text-center">1.00</td></tr><tr><td class="text-left">Усилие&nbsp;копания на&nbsp;ковше</td><td class="text-center">кН</td><td class="text-center">146.4</td></tr><tr><td class="text-left">Скорость&nbsp;вращения башни</td><td class="text-center">об/мин</td><td class="text-center">10.июл</td></tr><tr><td class="text-left">Длина&nbsp;стрелы</td><td class="text-center">мм</td><td class="text-center">5700</td></tr><tr><td class="text-left">Длина&nbsp;рукояти</td><td class="text-center">мм</td><td class="text-center">2900</td></tr><tr><td class="text-left">Противовес</td><td class="text-center">кг</td><td class="text-center">3900</td></tr><tr><td class="text-left">Емкость&nbsp;топливного&nbsp;бака</td><td class="text-center">литры</td><td class="text-center">350</td></tr><tr><td class="text-left">ДВИГАТЕЛЬ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-left">Модель</td><td class="text-center">&nbsp;</td><td class="text-center">Cummins&nbsp;&nbsp;QSB7</td></tr><tr><td class="text-left">Объем двигателя</td><td class="text-center">литры</td><td class="text-center">06.июл</td></tr><tr><td class="text-left">Мощность</td><td class="text-center">кВт</td><td class="text-center">124</td></tr><tr><td class="text-left">Предел&nbsp;выбросов</td><td class="text-center">&nbsp;</td><td class="text-center">TIER&nbsp;3</td></tr><tr><td class="text-left">ХОДОВАЯ ЧАСТЬ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-left">Длина&nbsp;ходовой</td><td class="text-center">мм</td><td class="text-center">4460</td></tr><tr><td class="text-left">Ширина колеи (по центру гусениц)</td><td class="text-center">мм</td><td class="text-center">2400</td></tr><tr><td class="text-left">Количество&nbsp;гусеничных&nbsp;башмаков</td><td class="text-center">&nbsp;</td><td class="text-center">98</td></tr><tr><td class="text-left">Ширина&nbsp;башмаков</td><td class="text-center">мм</td><td class="text-center">600</td></tr><tr><td class="text-left">Количество&nbsp;нижних&nbsp;роликов</td><td class="text-center">&nbsp;</td><td class="text-center">18</td></tr><tr><td class="text-left">Количество&nbsp;несущих&nbsp;роликов</td><td class="text-center">&nbsp;</td><td class="text-center">4</td></tr><tr><td class="text-left">ГИДРАВЛИЧЕСКАЯ&nbsp;СИСТЕМА</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-left">Модель&nbsp;гидравлического&nbsp;насоса</td><td class="text-center">&nbsp;</td><td class="text-center">Kawasaki&nbsp;&nbsp;K3V112DT-1X8R-9NZ1-V</td></tr><tr><td class="text-left">Гидромотор поворота башни&nbsp;</td><td class="text-center">&nbsp;</td><td class="text-center">Doosan&nbsp;M2X130CHB</td></tr><tr><td class="text-left">Модель&nbsp;главного&nbsp;гидравлического&nbsp;клапана&nbsp;</td><td class="text-center">&nbsp;</td><td class="text-center">Kawasaki&nbsp;&nbsp;KMX15RA/B45065B</td></tr><tr><td class="text-left">Скорость&nbsp;потока</td><td class="text-center">л/мин</td><td class="text-center">2*212</td></tr><tr><td class="text-left">Максимальное давление</td><td class="text-center">MPa</td><td class="text-center">34.3</td></tr><tr><td class="text-left">Емкость&nbsp;гидравлической системы</td><td class="text-center">литры</td><td class="text-center">240</td></tr><tr><td class="text-left">ГАБАРИТЫ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-left">Общая&nbsp;длина</td><td class="text-center">мм</td><td class="text-center">9600</td></tr><tr><td class="text-left">Общая&nbsp;ширина</td><td class="text-center">мм</td><td class="text-center">3000</td></tr><tr><td class="text-left">Общая&nbsp;высота&nbsp;(верхняя&nbsp;часть&nbsp;стрелы)</td><td class="text-center">мм</td><td class="text-center">3005</td></tr><tr><td class="text-left">Общая&nbsp;высота&nbsp;(верх&nbsp;кабины)</td><td class="text-center">мм</td><td class="text-center">3000</td></tr><tr><td class="text-left">Дорожный&nbsp;просвет</td><td class="text-center">мм</td><td class="text-center">475</td></tr><tr><td class="text-left">Радиус&nbsp;поворота&nbsp;задней части платформы</td><td class="text-center">мм</td><td class="text-center">2794</td></tr><tr><td class="text-left">Ширина&nbsp;башмака&nbsp;гусеницы</td><td class="text-center">мм</td><td class="text-center">600</td></tr><tr><td class="text-left">Ширина&nbsp;верхней&nbsp;конструкции</td><td class="text-center">мм</td><td class="text-center">2800</td></tr><tr><td class="text-left">Минимальный&nbsp;радиус&nbsp;поворота</td><td class="text-center">мм</td><td class="text-center">3560</td></tr><tr><td class="text-left">Дорожный&nbsp;просвет&nbsp;под противовесом</td><td class="text-center">мм</td><td class="text-center">1096</td></tr><tr><td class="text-left">Длина&nbsp;опорной части гусениц</td><td class="text-center">мм</td><td class="text-center">3660</td></tr><tr><td class="text-left">РАБОЧИЕ&nbsp;ДИАПАЗОНЫ</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-left">Максимальная&nbsp;высота&nbsp;резания</td><td class="text-center">мм</td><td class="text-center">9616</td></tr><tr><td class="text-left">Максимальная&nbsp;высота&nbsp;загрузки</td><td class="text-center">мм</td><td class="text-center">6830</td></tr><tr><td class="text-left">Максимальная&nbsp;глубина&nbsp;копания</td><td class="text-center">мм</td><td class="text-center">6592</td></tr><tr><td class="text-left">Максимальная глубина выемки с горизонтальным плоским</td><td class="text-center">мм</td><td class="text-center">6090</td></tr><tr><td class="text-left">дном длиной 2500 мм</td><td class="text-center">&nbsp;</td><td class="text-center">&nbsp;</td></tr><tr><td class="text-left">Максимальный вылет&nbsp;на уровне опорной поверхности</td><td class="text-center">мм</td><td class="text-center">9752</td></tr></tbody></table>',
                    'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet euismod eros, et congue neque. Donec eget erat id turpis rhoncus pretium. Nullam blandit aliquet orci nec interdum. Vivamus eget lectus non urna ornare sollicitudin et eget orci. Nam sit amet porta magna. Quisque libero quam, feugiat sit amet leo a, imperdiet finibus justo. Sed nec aliquam nibh, id congue nisl. Phasellus odio arcu, viverra nec est quis, fringilla semper libero. Praesent gravida massa in libero consequat, id accumsan tellus laoreet. Quisque eu dapibus lorem, vitae volutpat est. Aliquam eget eros sed turpis dignissim varius. Fusce accumsan, lacus nec vulputate varius, sem nibh vestibulum sem, tincidunt condimentum sapien risus molestie velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. In feugiat venenatis nisl vel fringilla. Nulla laoreet iaculis libero, eget feugiat orci. Etiam ultricies nisl malesuada, viverra dui ac, commodo felis.</p>',
                    'active' => 1,
                    'technic_type_id' => $technicType->id
                ]);

                for ($im=1;$im<=3;$im++) {
                    TechnicImage::create([
                        'image' => 'images/technics/technic'.$im.'.jpg',
                        'technic_id' => $technic->id
                    ]);
                }
            }
        }
    }
}
