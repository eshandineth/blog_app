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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Add name column
            $table->string('email')->unique();  // Add email column
            $table->string('password');  // Add password column
            $table->timestamp('email_verified_at')->nullable();  // Add email verification timestamp
            $table->rememberToken();  // For "remember me" feature
            $table->timestamps();  // Created at & Updated at columns
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
