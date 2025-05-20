<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('user_status_id')->constrained('user_statuses')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('address');
            $table->timestamps();
        });

        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '+63798887567',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'address' => 'Sample',
                'role_id' => 1,
                'user_status_id' => 1,
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
};
