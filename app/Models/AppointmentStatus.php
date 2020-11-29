<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppointmentStatus extends Model
{
    use HasFactory;

    const STATUS_REQUESTED = 'requested';
    const STATUS_RESCHEDULED = 'rescheduled';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    /**
     * @return HasMany
     */
    public function appointment_status(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
