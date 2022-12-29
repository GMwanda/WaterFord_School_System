<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class assignmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            't_heading'=>'required|string',
            't_description'=>'required|string',
            't_dueDate'=>'required|date',
            't_courseId'=>'required',
            'assignmentFile'=>'nullable'
        ];
    }
}
