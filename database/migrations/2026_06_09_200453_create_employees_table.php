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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('identity_document', 15)->unique();
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone_number', 8);
            $table->date('hire_date');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            
            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnDelete();
            
            $table->foreignId('position_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('schedule_id')
                ->constrained('work_schedules')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
