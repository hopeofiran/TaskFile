<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Folder */
class FolderResource extends JsonResource
{
    /**
     * @var array
     */
    protected $response = [];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = [
            'id'   => $this->id,
            'name' => $this->name,
        ];
        return $response + $this->response;
    }
    public function withParent()
    {
        $this->response['parent'] = new FolderResource($this->parent);
        return $this;
    }

    /**
     * @param  callable|null  $callback
     *
     * @return $this
     */
    public function withFolderChildren(callable $callback = null)
    {
        $this->response['folder_children'] = $callback ?
            ($this->childrenFolders != null) ?
                call_user_func($callback, FolderResource::make($this->childrenFolders())) :
                null :
            FolderResource::collection($this->childrenFolders);
        return $this;
    }
}
