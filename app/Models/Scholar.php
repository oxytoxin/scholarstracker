<?php

namespace App\Models;

use App\DTO\ScholarUpdateData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\DataCollection;

/**
 * @mixin IdeHelperScholar
 */
class Scholar extends Model
{
    use HasFactory;

    protected $casts = [
        'reentry_plan' => 'array',
        'updates' => DataCollection::class . ':' . ScholarUpdateData::class,
        'contract_start_date' => 'immutable_date',
        'contract_end_date' => 'immutable_date',
        'date_of_graduation' => 'immutable_date',
        'end_of_service_obligation_date' => 'immutable_date',
    ];

    public function scopeWithDetails(Builder $query)
    {
        return $query->with('campus', 'scholarship_type', 'scholarship_category', 'degree_program', 'higher_education_institute', 'scholarship_status');
    }

    public function scholarship_status()
    {
        return $this->belongsTo(ScholarshipStatus::class);
    }

    public function scholarship_category()
    {
        return $this->belongsTo(ScholarshipCategory::class);
    }

    public function scholarship_type()
    {
        return $this->belongsTo(ScholarshipType::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function degree_program()
    {
        return $this->belongsTo(DegreeProgram::class);
    }

    public function higher_education_institute()
    {
        return $this->belongsTo(HigherEducationInstitute::class);
    }

    public function hei_disconnection_reason()
    {
        return $this->belongsTo(HeiDisconnectionReason::class);
    }
}
