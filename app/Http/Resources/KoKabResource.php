<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KoKabResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_kokab'     => $this->id_kokab,
            'nama_kokab'   => $this->nama_kokab,
            'provinsi'     => $this->provinsi ? $this->provinsi->nama_provinsi : null,
        ];
    }
}
