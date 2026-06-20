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
        Schema::create('trips', function (Blueprint $table) {

            $table->id();

            $table->foreignId('profile_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->string('destination');

            $table->string('thumbnail');

            $table->longText('description');

            $table->string('meeting_point');

            $table->enum('trip_type', [
                'gunung',
                'curug',
                'pantai',
                'camping',
                'lainnya'
            ]);

            $table->decimal('price');

            $table->integer('quota');

            $table->integer('booked')
                ->default(0);

            $table->date('start_date');

            $table->date('end_date');

            $table->enum('status', [
                'upcoming',
                'completed',
                'full',
                'cancelled'
            ]);

            $table->boolean('published')
                ->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
