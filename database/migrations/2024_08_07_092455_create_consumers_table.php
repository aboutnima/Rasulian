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
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone')->nullable();
            $table->enum('contact_preference', \App\Enum\ConsumerContactPreference::values())->default(\App\Enum\ConsumerContactPreference::Email->value);
            $table->string('city');
            $table->enum('state', ['0', '1']);
            $table->char('zipcode', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumers');
    }
};
