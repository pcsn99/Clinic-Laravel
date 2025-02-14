<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_id')->unique();
            $table->string('password');
            $table->string('course');
            $table->string('college');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->timestamps();
        });

        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('staff_id')->unique();
            $table->timestamps();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permission_name');
            $table->timestamps();
        });

        Schema::create('group_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('staff_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->date('date');
            $table->integer('slots_available');
            $table->foreignId('created_by')->constrained('staff')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
            $table->enum('status', ['present', 'completed', 'not_present']);
            $table->foreignId('updated_by')->nullable()->constrained('staff')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('certificate_path')->nullable();
            $table->timestamps();
        });

        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade');
            $table->date('date');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('purpose');
            $table->foreignId('doctor_id')->constrained('staff')->onDelete('cascade');
            $table->foreignId('result_id')->constrained('results')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logbooks');
        Schema::dropIfExists('results');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('staff_groups');
        Schema::dropIfExists('group_permissions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('students');
    }
};
