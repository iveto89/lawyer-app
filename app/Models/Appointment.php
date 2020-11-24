<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_status_id',
        'citizen_id',
        'lawyer_id',
        'valid_from',
        'valid_to',
    ];

    protected $casts = [
        'valid_from' => 'datetime',
        'valid_to' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function appointment_status(): BelongsTo
    {
        return $this->belongsTo(AppointmentStatus::class);
    }

    /**
     * @return BelongsTo
     */
    public function citizen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'citizen_id', 'id', 'users');
    }

    /**
     * @return BelongsTo
     */
    public function lawyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'lawyer_id', 'id', 'users');
    }
}
