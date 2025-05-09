<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LoanStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $loanStatuses = [
            ['name' => 'Pending'],
            ['name' => 'Approved'],
            ['name' => 'Rejected'],
        ];

        foreach($loanStatuses as $LoanStatus) {
            LoanStatus::create($LoanStatus);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_status');
    }
};
