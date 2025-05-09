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
            $$table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('loan_status_id')->constrained('loan_status')->onDelete('cascade');
            $table->foreignId('loan_type_id')->constrained('loan_type')->onDelete('cascade');
            $table->string('amount');
            $table->string('tenure_value');
            $table->string('tenure_unit');
            $table->string('interest_rate');
            $table->timestamps('application_date')->nullable();
        });

        $applications = [
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '+63798887567',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'address' => 'Sample',
                'role_id' => 1,
                'status_id' => 1,
            ],
        ];

        foreach($applications as $application) {
            Loan_application::create($application);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_application');
    }
};
