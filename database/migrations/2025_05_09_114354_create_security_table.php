<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Security;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('security', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('question');
            $table->string('answer');
            $table->timestamps();
        });

        $securities = [
            [
                'user_id' => 1,
                'question' => 'What is the name of your first pet?',
                'answer' => 'inky',
            ],
        ];

        foreach($securities as $security) {
            Security::create($security);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security');
    }
};
