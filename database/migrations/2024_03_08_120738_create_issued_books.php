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
        Schema::create('issued_books', function (Blueprint $table) {
            $table->unsignedBigInteger('issued_books_detail_id');
            $table->unsignedBigInteger('book_id');
            // Add any additional columns you need for the pivot table here

            // Define foreign keys
            $table->foreign('issued_books_detail_id')->references('id')->on('issued_books_details')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_books');
    }
};
