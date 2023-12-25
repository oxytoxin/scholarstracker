<?php

use App\Models\Campus;
use App\Models\DegreeProgram;
use App\Models\HeiDisconnectionReason;
use App\Models\ScholarshipType;
use App\Models\ScholarshipCategory;
use Illuminate\Support\Facades\Schema;
use App\Models\HigherEducationInstitute;
use App\Models\ScholarshipStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->string('profile_photo')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_initial')->nullable();
            $table->string('full_name')->virtualAs("CONCAT(first_name, ' ', IFNULL(CONCAT(middle_initial, '.'), ''), ' ', last_name)");
            $table->string('alt_full_name')->virtualAs("CONCAT(last_name, ', ', first_name, ' ', IFNULL(CONCAT(middle_initial, '.'), ''))");
            $table->foreignIdFor(Campus::class)->constrained();
            $table->foreignIdFor(ScholarshipType::class)->constrained();
            $table->foreignIdFor(ScholarshipCategory::class)->nullable()->constrained();
            $table->foreignIdFor(DegreeProgram::class)->constrained();
            $table->foreignIdFor(HigherEducationInstitute::class)->constrained();
            $table->foreignIdFor(HeiDisconnectionReason::class)->nullable()->constrained();
            $table->foreignIdFor(ScholarshipStatus::class)->constrained();
            $table->date('contract_start_date');
            $table->date('contract_end_date');
            $table->string('status')->nullable();
            $table->string('extension_period')->nullable();
            $table->date('date_of_graduation')->nullable();
            $table->date('end_of_service_obligation_date')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('connected_to_hei')->default(true);
            $table->boolean('extension_requested')->default(false);
            $table->string('extension_status')->nullable();
            $table->json('reentry_plan')->default(DB::raw('(JSON_ARRAY())'));
            $table->json('updates')->default(DB::raw('(JSON_ARRAY())'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholars');
    }
};
