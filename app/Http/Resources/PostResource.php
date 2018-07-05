<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PostResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        //podemos ponerle el nombre que queramos
        //y estamos utilizando el $post como parametro en el contructor
        //pero acá se llama resource y se utiliza asi $this->resource = $post

        return [
            'titulo' => $this->resource->title,
            'owner' => $this->resource->owner,
        ];
    }
}
