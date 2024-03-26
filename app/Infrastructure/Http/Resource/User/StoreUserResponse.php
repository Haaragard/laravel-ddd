<?php

namespace App\Infrastructure\Http\Resource\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreUserResponse extends JsonResource
{
    public function toArray(Request $request)
    {
        if (is_null($this->resource)) {
            return [];
        }

        return [
            'data' => is_array($this->resource)
                ? $this->resource
                : $this->resource->toArray()
        ];
    }
}
