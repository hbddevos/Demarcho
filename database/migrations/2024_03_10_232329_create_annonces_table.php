<?php

use App\Models\Annonce;
use App\Models\TypeAnnonce;
use App\Models\User;
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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('image')->nullable();
            $table->foreignIdFor(TypeAnnonce::class)->constrained()->noActionOnDelete();
            $table->timestamps();
        });
        
        
        Schema::create('annonce_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Annonce::class);
            $table->foreignIdFor(User::class);
            $table->date('date_publication');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
        Schema::dropIfExists('annonce_user');
    }
};
