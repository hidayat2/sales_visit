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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained();
            $table->foreignId('user_id')->nullable()->index();
            //$table->string('user_id');
            //$table->unsignedBigInteger('author_id');

            //$table->foreign('author_id')->references('id')->on('m_user');

            $table->date('visit_date');
            //$table->string('company_name');
            $table->foreignId('company_id')->nullable()->index();
             // $table->foreignId('company_id')->constrained(
            //     table: 'companies',     //akan terhubung ke table users
            //     indexName: 'visit_company_id' // nama index ny bebas yang terhubung ke author_id
            // );
            $table->text('description');
            //$table->string('status')->default('visit'); // Status awal: visit
            $table->foreignId('status')->default('1')->index();
            //$table->foreignId('status')->constrained()->default('1');
            //$table->enum('status', ['visit', 'follow', 'penawaran', 'deal'])->default('visit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
