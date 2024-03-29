<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperScholarshipType
 */
class ScholarshipType extends Model
{
    use HasFactory;

    public function scholars()
    {
        return $this->hasMany(Scholar::class);
    }
}
