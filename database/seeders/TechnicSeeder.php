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
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet euismod eros, et congue neque. Donec eget erat id turpis rhoncus pretium. Nullam blandit aliquet orci nec interdum. Vivamus eget lectus non urna ornare sollicitudin et eget orci. Nam sit amet porta magna. Quisque libero quam, feugiat sit amet leo a, imperdiet finibus justo. Sed nec aliquam nibh, id congue nisl. Phasellus odio arcu, viverra nec est quis, fringilla semper libero. Praesent gravida massa in libero consequat, id accumsan tellus laoreet. Quisque eu dapibus lorem, vitae volutpat est. Aliquam eget eros sed turpis dignissim varius. Fusce accumsan, lacus nec vulputate varius, sem nibh vestibulum sem, tincidunt condimentum sapien risus molestie velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. In feugiat venenatis nisl vel fringilla. Nulla laoreet iaculis libero, eget feugiat orci. Etiam ultricies nisl malesuada, viverra dui ac, commodo felis.',
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
