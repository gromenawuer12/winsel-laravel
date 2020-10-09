<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        info(request()->input('start'));
        return [
            'start' => 'required|date_format:Y-m-d\TH:i:s',
            'duration' => 'required|date_format:H:i:s',
            'taskType' => 'required|numeric',
            'description' => 'required|string|max:150',
        ];
    }
}
