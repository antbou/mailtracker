<?php

namespace App\Http\Requests;

use App\Models\State;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTrackerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'object' => 'required|max:255',
            'email-address' => 'required|email|max:255',
            'state' => Rule::in(State::allAvailable()->pluck('slug')),
        ];
    }
}
