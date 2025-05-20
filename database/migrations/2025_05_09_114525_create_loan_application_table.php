<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Loan_application;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('loan_status_id')->constrained('loan_statuses')->onDelete('cascade');
            $table->foreignId('loan_type_id')->constrained('loan_types')->onDelete('cascade');
            $table->string('amount');
            $table->string('tenure_value');
            $table->string('tenure_unit');
            $table->string('interest_rate');
            $table->timestamp('application_date')->nullable();
        });

        // Remove incorrect seeding data for loan_application

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('loan_application');
        Schema::enableForeignKeyConstraints();
    }
};
