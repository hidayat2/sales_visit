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
        Schema::create('teknisis', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("email", 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("phone", 255);
            $table->text("alamat");
            $table->string("nama_bank", 255);
            $table->string("no_req", 255);
            $table->string("password", 255);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknisis');
    }
};
