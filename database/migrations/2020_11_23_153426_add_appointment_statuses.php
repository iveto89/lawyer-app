<?php

use Illuminate\Database\Migrations\Migration;

class AddAppointmentStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('appointment_statuses')->insert([
            [
                'name' => 'requested',
            ],
            [
                'name' => 'rescheduled',
            ],
            [
                'name' => 'approved',
            ],
            [
                'name' => 'rejected',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $names = ['requested', 'rescheduled', 'approved', 'rejected'];

        DB::table('appointment_statuses')->whereIn('name', $names)->delete();
    }
}
