<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class AccountResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'number' => $this->number,
            'account_type' => $this->account_type,
            'balance' => $this->balance,
            'Holder' => new HolderResource($this->holder),
        ];
    }
}
