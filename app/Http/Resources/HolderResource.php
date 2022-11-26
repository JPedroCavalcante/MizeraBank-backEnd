<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class HolderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'identifier' => $this->identifier,
            'birth_date' => Carbon::make($this->birth_date)->format('d/m/Y'),
            'phone' => $this->phone,
        ];
    }
}
