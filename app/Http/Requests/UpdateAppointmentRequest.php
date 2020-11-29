<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'appointment_id' => 'required|exists:appointments,id',
            'lawyer_id' => 'required|exists:users,id',
            'valid_from' => 'required|datetime',
            'valid_to' => 'required|datetime',
        ];
    }
}
