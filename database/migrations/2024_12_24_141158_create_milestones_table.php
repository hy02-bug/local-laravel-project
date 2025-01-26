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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('grant_id'); // FK to grants table
            $table->string('milestone_name'); // Milestone name
            $table->date('target_completion_date'); // Target date for completion
            $table->text('deliverable'); // Deliverable description
            $table->string('status'); // Milestone status
            $table->text('remark')->nullable(); // Optional remarks
            $table->timestamp('date_updated')->nullable(); // Last updated timestamp
            $table->timestamps(); // Laravel's created_at and updated_at timestamps

            // Foreign key constraint
            $table->foreign('grant_id')->references('id')->on('grants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
