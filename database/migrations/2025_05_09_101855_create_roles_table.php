<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Staff'],
            ['name' => 'Customer']
        ];

        foreach($roles as $role) {
            Role::create($role);
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('roles');
        Schema::enableForeignKeyConstraints();
    }
};
