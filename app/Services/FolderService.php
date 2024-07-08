<?php

namespace App\Services;

use App\Contracts\FolderRepositoryInterface;

class FolderService
{
    protected FolderRepositoryInterface $folderRepository;

    public function __construct(FolderRepositoryInterface $folderRepository)
    {
        $this->folderRepository = $folderRepository;
    }

    public function create(array $data)
    {
        return $this->folderRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->folderRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->folderRepository->delete($id);
    }

    public function all()
    {
        return $this->folderRepository->all();
    }

    public function find($id)
    {
        return $this->folderRepository->find($id);
    }
}
