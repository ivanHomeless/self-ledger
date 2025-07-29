<?php

use App\Enums\FinanceType;
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
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', array_map(fn($t) => $t->value, FinanceType::cases()))
                ->default(FinanceType::Expense->value);
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('RUB'); // ISO-код, напр. RUB, USD, EUR

            $table->text('description')->nullable();
            $table->date('date');
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
