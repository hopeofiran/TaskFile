<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstFolder = Folder::query()->where('name', '/');
        if ($firstFolder->doesntExist()) {
            $firstFolder       = new Folder();
            $firstFolder->name = '/';
            $firstFolder->save();
        }
    }
}
