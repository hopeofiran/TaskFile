<?php

namespace App\Rules;

use App\Models\Folder;
use Illuminate\Contracts\Validation\Rule;

class FolderExist implements Rule
{

    private Folder $folder;

    /**
     * Create a new rule instance.
     *
     * @param  \App\Models\Folder  $folder
     */
    public function __construct(Folder $folder)
    {
        $this->folder = $folder;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->folder->exists ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The folder dose not exist');
    }
}
