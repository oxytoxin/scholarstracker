<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Campus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Campus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campus query()
 * @method static \Illuminate\Database\Eloquent\Builder|Campus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCampus {}
}

namespace App\Models{
/**
 * App\Models\DegreeProgram
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeProgram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeProgram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeProgram query()
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeProgram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeProgram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeProgram whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeProgram whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDegreeProgram {}
}

namespace App\Models{
/**
 * App\Models\HigherEducationInstitute
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HigherEducationInstitute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HigherEducationInstitute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HigherEducationInstitute query()
 * @method static \Illuminate\Database\Eloquent\Builder|HigherEducationInstitute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HigherEducationInstitute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HigherEducationInstitute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HigherEducationInstitute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperHigherEducationInstitute {}
}

namespace App\Models{
/**
 * App\Models\Scholar
 *
 * @property int $id
 * @property string|null $profile_photo
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_initial
 * @property string|null $full_name
 * @property string|null $alt_full_name
 * @property int $scholarship_type_id
 * @property int $scholarship_category_id
 * @property int $degree_program_id
 * @property int $higher_education_institute_id
 * @property int $scholarship_status_id
 * @property \Carbon\CarbonImmutable $contract_start_date
 * @property \Carbon\CarbonImmutable $contract_end_date
 * @property string|null $status
 * @property string|null $extension_period
 * @property \Carbon\CarbonImmutable|null $date_of_graduation
 * @property \Carbon\CarbonImmutable|null $end_of_service_obligation_date
 * @property string|null $remarks
 * @property int $connected_to_hei
 * @property int $extension_requested
 * @property string|null $extension_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Campus|null $campus
 * @property-read \App\Models\DegreeProgram $degree_program
 * @property-read \App\Models\HigherEducationInstitute $higher_education_institute
 * @property-read \App\Models\ScholarshipCategory $scholarship_category
 * @property-read \App\Models\ScholarshipStatus $scholarship_status
 * @property-read \App\Models\ScholarshipType $scholarship_type
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereAltFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereConnectedToHei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereContractEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereContractStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereDateOfGraduation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereDegreeProgramId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereEndOfServiceObligationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereExtensionPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereExtensionRequested($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereExtensionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereHigherEducationInstituteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereMiddleInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereProfilePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereScholarshipCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereScholarshipStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereScholarshipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scholar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperScholar {}
}

namespace App\Models{
/**
 * App\Models\ScholarshipCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperScholarshipCategory {}
}

namespace App\Models{
/**
 * App\Models\ScholarshipStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperScholarshipStatus {}
}

namespace App\Models{
/**
 * App\Models\ScholarshipType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScholarshipType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperScholarshipType {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

