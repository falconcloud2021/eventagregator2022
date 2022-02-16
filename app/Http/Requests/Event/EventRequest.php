<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'event_name' => 'required|string',
            'event_type' => 'required|string|max:45',
            'category_id' => 'integer|nullable',
            'event_description' => 'required|string',
            'city' => 'required|string',
            'place' => 'required|string',
            'street' => 'nullable|string',
            'build_number' => 'nullable|string',
            'geo_point' => 'nullable|string',
            'registration_date' => 'required|date',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'event_link' => 'nullable|string',
            'event_status' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_desc' => 'nullable|string',
            'rating' => 'nullable|integer',
            'url' => 'nullable|string',
            'event_source' => 'nullable|string',
        ];
    }
}
