<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Migrations\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('image_desktop')->nullable()->after('traffic_source');
            $table->string('image_mobile')->nullable()->after('image_desktop');
        });
    }

    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn(['image_desktop', 'image_mobile']);
        });
    }
};
