<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class courseMarksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = User::find($this->stdId);
        $name = $user['name'];
        return [
            'Student Name' => $name,
            'Assessment'=>$this->Assessment,
            'Marks'=>$this->Marks 
        ];
    }
}
