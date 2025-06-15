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
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name', 30);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('registration_date')->useCurrent();
            $table->timestamp('last_login_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }


};
