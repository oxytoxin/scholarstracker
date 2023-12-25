<?php

namespace App\DTO;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ScholarUpdateData extends Data
{
    public function __construct(
        #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
        public $date,
        public string $details
    ) {
    }
}
