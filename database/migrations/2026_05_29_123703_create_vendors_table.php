<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('status')->default('active'); // active, warning, inactive
            $table->string('initials', 2)->nullable();
            $table->decimal('total_revenue', 10, 2)->default(0);
            $table->integer('active_users')->default(0);
            $table->string('commission')->default('2.5%');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
