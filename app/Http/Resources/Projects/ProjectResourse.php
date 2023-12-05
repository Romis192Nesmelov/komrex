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
        return [
            'id' => $this->id,
            'head' => $this->head,
            'date' => $this->date,
            'text' => $this->text,
            'pdf' => $this->pdf,
            'size' => $this->presentation ? filesize(base_path('public/'.$this->presentation)) : 0,
            'images' => $this->images
        ];
    }
}
