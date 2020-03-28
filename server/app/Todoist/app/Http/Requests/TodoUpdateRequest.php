<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoUpdateRequest extends FormRequest
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
        return [
            "completed_at" => "date",
            "content" => "max:1024|string",
            "dueData" => "date",
            "projectId" => "integer",
            "priorityId" => "integer",
            "sectionId" => "integer",
        ];
    }
}
