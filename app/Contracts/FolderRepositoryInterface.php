<?php

namespace App\Contracts;

interface FolderRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create($name, $parent_id);

    public function update($name, $parent_id);

    public function destroy($id);
}
