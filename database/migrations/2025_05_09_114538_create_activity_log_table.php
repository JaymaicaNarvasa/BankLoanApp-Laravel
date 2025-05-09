<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AcitivityLog;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loan_application')->onDelete('cascade');
            $table->foreignId('loan_status_id')->constrained('loan_status')->onDelete('cascade');
            $table->foreignId('loan_type_id')->constrained('loan_type')->onDelete('cascade');
            $table->int('amt_to_pay');
            $table->date('date')->nullable();
        });

        $actlogs = [
            [
                'amt_to_pay' => '10500',
                'loan_id' => 1,
                'loan_status_id' => 1,
                'loan_type_id' => 1,
            ],
        ];

        foreach($actlogs as $AcitivityLog){
            AcitivityLog::create($AcitivityLog);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_log');
    }
};
