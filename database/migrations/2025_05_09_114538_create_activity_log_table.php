<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ActivityLog;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loan_application')->onDelete('cascade');
            $table->foreignId('loan_status_id')->constrained('loan_statuses')->onDelete('cascade');
            $table->foreignId('loan_type_id')->constrained('loan_types')->onDelete('cascade');
            $table->integer('amt_to_pay');
            $table->date('date')->nullable();
            $table->timestamps();
        });

        // Remove seeding data to avoid foreign key constraint errors
        // $actlogs = [
        //     [
        //         'amt_to_pay' => '10500',
        //         'loan_id' => 1,
        //         'loan_status_id' => 1,
        //         'loan_type_id' => 1,
        //     ],
        // ];

        // foreach($actlogs as $activityLog){
        //     ActivityLog::create($activityLog);
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
