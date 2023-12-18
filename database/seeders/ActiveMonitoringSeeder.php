<?php

namespace Database\Seeders;

use App\Models\ActiveMonitoring;
use Illuminate\Database\Seeder;

class ActiveMonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
//            ['head' => 'Актив-М - это повышение эффективности эксплуатации, предупреждение катастрофических поломок, снижение затрат на владение.'],
            ['text' => 'Организация эффективной эксплуатации парка оборудования требует существенных ресурсов от компаний, включая организацию работ по сбору и хранению информации, ее обработку, качественную интерпретацию и разработку мер по повышению эффективности эксплуатации парка спецтехники.'],
            ['text' => 'Доверьте мониторинг своего оборудование профессионалам! Сфокусируйтесь на своем основном бизнесе, а за эксплуатацией вашего оборудования будем следить мы!'],
            ['image' => 'images/am_images/am_big.jpg', 'head' => 'АКТИВ-М - комплексный активный мониторинг парка спецтехники в режиме 24/7', 'text' => '<p>В рамках АКТИВ-М организация-владелец спецтехники будет регулярно получать отчеты и рекомендации, подготовленные нашими специалистами и направленные на повышение рентабельности производства за счет повышения эффективности эксплуатации оборудования, и на снижение операционных затрат за счет снижения времени непроизводительной работы оборудования и предупреждения катастрофических поломок и дорогостоящего простоя оборудования.</p>'],
            ['head' => '', 'text' => 'Список отслеживаемых параметров включает в себя как данные со штатной системы оборудования (CAN-шина, приборная панель): производственные показатели и диагностические коды и ошибки, так и с дополнительно установленных систем и датчиков.'],
        ];

        foreach ($data as $item) {
            ActiveMonitoring::create($item);
        }
    }
}
