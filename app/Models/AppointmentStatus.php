<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppointmentStatus extends Model
{
    use HasFactory;

    /**
     * @return HasMany
     */
    public function appointment_status(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
