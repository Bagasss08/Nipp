<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('brand_name');
            $table->string('owner_name');

            $table->string('logo')->nullable();
            $table->string('banner')->nullable();

            $table->text('description');

            $table->string('email')->nullable();

            $table->string('whatsapp');

            $table->string('instagram')->nullable();

            $table->string('tiktok')->nullable();

            $table->string('youtube')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
