<?php

use App\Enums\FollowUpStatus;
use App\Enums\MessageTemplate;
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
        Schema::create('client_follow_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->dateTime('next_contact_at');
            $table->dateTime('last_contacted_at')->nullable();
            $table->enum('message_template', array_map(fn($s) => $s->value, MessageTemplate::cases()))
                ->default(MessageTemplate::Formal->value);
            $table->enum('status', array_map(fn($s) => $s->value, FollowUpStatus::cases()))
                ->default(FollowUpStatus::Pending->value);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_follow_ups');
    }
};
