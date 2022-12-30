<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $v = $this->is_admin;
        $role = null;
        if($v == 2){
            $role = "Lecturer";
        } else if($v == 1){
            $role = "Administrator";
        } else {
            $role = "Student";
        }
        return [
            'Name' => $this->name,
            'Gender' => $this->gender,
            'Date Of Birth' => $this->DOB,
            'Email' => $this->email,
            'Phone Number' => $this->phone_number,
            'Address' => $this->address,
            'Role' => $role
        ];
    }
}
