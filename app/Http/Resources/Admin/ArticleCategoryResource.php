<?php

namespace App\Http\Resources\Admin;

use App\Helpers\TimeHelper;
use Illuminate\Http\Resources\Json\Resource;

class ArticleCategoryResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'code'          => $this->code,
            'created_at'    => TimeHelper::timestampToString($this->created_at),
            'updated_at'    => TimeHelper::timestampToString($this->updated_at),
        ];
    }
}