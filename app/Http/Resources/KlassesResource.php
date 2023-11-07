<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KlassesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'subject' => SubjectResource::make($this->whenLoaded('sbuject')),
            'subject' => SubjectResource::make($this->whenLoaded('subject')),
            'evaluatee' =>EvaluateeResource::make($this->whenLoaded('evaluatee')),
            'subject_id' => $this->subject_id,
            'evaluatee_id' => $this->evaluatee_id,
        ];
    }
}
