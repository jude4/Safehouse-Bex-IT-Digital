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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('square_areas')->nullable();
            $table->string('status')->nullable();
            $table->string('city')->nullable();
            $table->string('date_available')->nullable();
            $table->string('year_built')->nullable();

            $table->string('property_name')->nullable();
            $table->string('property_type')->nullable();
            $table->string('units')->nullable();
            $table->string('property_address')->nullable();
            $table->text('about_property')->nullable();
            $table->string('listing_type')->nullable();
            $table->double('property_price')->default(0);
            $table->string('payment_type')->nullable();
            
            $table->string('laundry')->nullable();
            $table->string('cooling')->nullable();
            $table->string('size')->nullable();
            $table->string('lot_size')->nullable();
            $table->string('heating')->nullable();
            $table->string('parking_area')->nullable();

            $table->timestamps();
        });

        Schema::create('listing_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->cascadeOnDelete();
            $table->string('property_video')->nullable();
            $table->timestamps();
        });

        Schema::create('listing_media_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_media_id')->constrained('listing_media')->cascadeOnDelete();
            $table->binary('image_path')->nullable();
            $table->timestamps();
        });

        Schema::create('listing_amenity_features', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->foreignId('listing_id')->constrained('listings')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
        Schema::dropIfExists('listing_amenity_features');
        Schema::dropIfExists('listing_media');
        Schema::dropIfExists('listing_media_images');
      
    }
};
