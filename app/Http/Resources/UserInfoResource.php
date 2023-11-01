<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'fullname' => $this->first_name . ' '.$this->middle_name .' '. $this->last_name,
            'year' => $this->year,
            'section' => $this->section,
            'mobile_number' => $this->mobile_number,
            'course' => $this->course,
            'email' => $this->email,
        ];
    }
}
