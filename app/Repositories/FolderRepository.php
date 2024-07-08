<?php

namespace App\Repositories;

use App\Contracts\FolderRepositoryInterface;
use App\Models\Folder;

class FolderRepository implements FolderRepositoryInterface
{
    protected Folder $folder;
    public function __construct(Folder $folder)
    {
        $this->folder = $folder;
    }

    public function getAll()
    {
        $this->folder;
    }

    public function getById($id)
    {
        $this->folder->findById($id);
    }

    public function create($name, $parent_id)
    {
        // TODO: Implement create() method.
    }

    public function update($name, $parent_id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
