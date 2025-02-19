<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructorResource extends JsonResource
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
            'name' => $this->name,
            'departments' =>$this->extractDeparments($this->departments),
        ];
    }
    private function extractDeparments($values) // extract departments
    {
        $departments = [];

        foreach($values as $value){
            array_push($departments, $value->department);
        }

        return $departments;
    }
}
