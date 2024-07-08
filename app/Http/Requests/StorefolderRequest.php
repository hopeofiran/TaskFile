<?php

namespace App\Http\Requests;

use App\Rules\FolderExist;
use Illuminate\Foundation\Http\FormRequest;

class StoreFolderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $stringLength         = config('app.default_max_string_length');
        return [
            'name'      => "required|string|max:{$stringLength}",
            'parent_id' => [
                "required",
                "exists:folders,id",
                new FolderExist($this->input('parent_id')),
            ],
        ];
    }
}
