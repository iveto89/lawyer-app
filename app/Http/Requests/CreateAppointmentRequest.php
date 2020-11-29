<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validFrom = Carbon::parse($this->get('valid_from'));
        $endOfDay = $validFrom->copy()->endOfDay();

        return [
            'lawyer_id' => 'required|exists:users,id',
            'valid_from' => 'required|date|after:now',
            'valid_to' => 'required|date|after_or_equal:valid_from|before_or_equal:' . $endOfDay,
        ];
    }
}
