<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('cover_image_alt')->nullable()->after('cover_image');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->string('cover_image_alt')->nullable()->after('cover_image');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('image_alt')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('cover_image_alt');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('cover_image_alt');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('image_alt');
        });
    }
};
