<?php

namespace App\Http\Resources\Projects;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $months = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];

        return [
            'id' => $this->id,
            'head' => $this->head,
            'date' => $months[(int)date('n', $this->date)-1].' '.date('Y',$this->date),
            'text' => $this->text,
            'pdf' => asset($this->pdf),
            'size' => $this->pdf ? filesize(base_path('public/'.$this->pdf)) : 0,
            'images' => $this->images
        ];
    }
}
