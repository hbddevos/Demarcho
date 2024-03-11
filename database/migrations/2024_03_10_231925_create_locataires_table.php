<?php

use App\Models\Locataire;
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
        Schema::create('locataires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('profession');
            $table->integer('contact');
            $table->string('email')->nullable();
            $table->string('image_locataire')->nullable();
            $table->timestamps();
        });

        Schema::create('locataire_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Locataire::class);
            $table->foreignIdFor(User::class);
            $table->date('date_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locataires');
        Schema::dropIfExists('locataire_user');
    }
};
