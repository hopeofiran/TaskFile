<?php

namespace App\Repositories;

use App\Contracts\FolderRepositoryInterface;
use App\Models\Folder;

class FolderRepository implements FolderRepositoryInterface
{
    public function all()
    {
        return Folder::all();
    }

    public function create(array $data)
    {
        return Folder::create($data);
    }

    public function update(array $data, $id)
    {
        $user = Folder::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = Folder::findOrFail($id);
        $user->delete();
    }

    public function find($id)
    {
        return Folder::findOrFail($id);
    }
}
