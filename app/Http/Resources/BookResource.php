<?php

namespace App\Http\Resources;

use App\Models\Book;
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
            'category' => Book::find($this->category_id)->categories->category_name,
            'publish_at' => $this->publish_at,
            'country' => $this->country,
            'page_no' => $this->page_no
        ];
    }
}
