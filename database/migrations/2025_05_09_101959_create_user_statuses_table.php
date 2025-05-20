<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $userStatuses = [
            ['name' => 'Active'],
            ['name' => 'Inactive'],
        ];

        foreach($userStatuses as $UserStatus) {
            UserStatus::create($UserStatus);
        }
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_statuses');
        Schema::enableForeignKeyConstraints();
    }
};
