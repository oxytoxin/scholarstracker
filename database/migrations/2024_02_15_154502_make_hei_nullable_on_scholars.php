<?php

use App\Models\HigherEducationInstitute;
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
        Schema::table('scholars', function (Blueprint $table) {
            $table->dropForeign('scholars_higher_education_institute_id_foreign');
            $table->foreignId('higher_education_institute_id')->nullable()->change();
            $table->foreign('higher_education_institute_id')->references('id')->on('higher_education_institutes')->constrained()->nullOnDelete();
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
