<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->foreignId('employee_id')
            ->nullable()
            ->unique()
            ->after('password')
            ->constrained('employees')
            ->nullOnDelete();

            $table->foreignId('role_id')
            ->after('employee_id')
            ->constrained('roles')
            ->restrictOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropForeign(['employee_id']);

            $table->dropForeign(['role_id']);

            $table->dropColumn([
                'employee_id',
                'role_id'
            ]);
        });
    }
};
