<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LoanType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $loantypeStatuses = [
            ['name' => 'Home'],
            ['name' => 'Medical'],
            ['name' => 'Personal'],
            ['name' => 'Education'],
        ];

        foreach($loantypeStatuses as $LoanType) {
            LoanType::create($LoanType);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_type');
    }
};
