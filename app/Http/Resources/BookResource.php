<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'author_name' => $this->author_name,
            'title' => $this->title,
            'category_id' => $this->category_id,
            'publish_at' => $this->publish_at,
            'country' => $this->country,
            'page_no' => $this->page_no
        ];
    }
}
