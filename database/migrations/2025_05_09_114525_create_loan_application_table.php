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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('loan_status_id')->constrained('loan_statuses')->onDelete('cascade');
            $table->foreignId('loan_type_id')->constrained('loan_types')->onDelete('cascade');
            $table->string('amount');
            $table->string('interest_rate');
            $table->timestamps();
        });

        $users = [
            [
                'user_id' => 1,
                'loan_status_id' => 3,
                'loan_type_id' => 2,
                'amount' => '10000',
                'interest_rate' => '0.5',
            ],
        ];

        foreach($users as $user) {
            Loan_application::create($user);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('loan_applications');
        Schema::enableForeignKeyConstraints();
    }
};
