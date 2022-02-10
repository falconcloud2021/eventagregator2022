<?php

namespace App\Http\Requests\Parser;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'parsed_event_name' => 'string|nullable',
            'parsed_event_type' => 'string|nullable',
            'parsed_event_category' => 'string|nullable',
            'parsed_event_description' => 'string|nullable',
            'parsed_event_link' => 'string|nullable',
            'parsed_geo_point' => 'string|nullable',
            'parsed_city' => 'string|nullable',
            'parsed_street' => 'string|nullable',
            'parsed_build_number' => 'string|nullable',
            'parsed_event_photo' => 'string|nullable',
            'parsed_source' => 'string|nullable',
            'parsed_registration_date' => 'date|nullable',
            'parsed_start_date' => 'date|nullable',
            'parsed_finish_date' => 'date|nullable',
        ];
    }
}
