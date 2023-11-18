<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ScholarExport implements FromView
{

    public function __construct(protected $scholars)
    {
    }
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view('exports.scholars', [
            'scholars' => $this->scholars
        ]);
    }
}
