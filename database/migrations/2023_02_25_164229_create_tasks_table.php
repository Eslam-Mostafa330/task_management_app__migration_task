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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreignId('user_id')->nullable()->default(null)->references('id')->on('users')->onDelete('cascade'); 
            $table->foreignId('assignee_id')->nullable()->default(null)->references('id')->on('users')->onDelete('cascade'); 
            $table->foreignId('creator_id')->nullable()->default(null)->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->enum('status', ['new', 'in progress', 'completed', 'rejected', 'success'])->default('new');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
