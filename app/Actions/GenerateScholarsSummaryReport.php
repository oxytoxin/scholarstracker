<?php

namespace App\Actions;

use App\Models\Scholar;
use App\Models\ScholarshipType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class GenerateScholarsSummaryReport
{
    private static function insertScholarRows(&$worksheet, $scholars, $rowStyle, $startRow)
    {
        $activeRow = $startRow;
        foreach ($scholars as $key => $scholar) {
            $worksheet->fromArray([
                'No.' => $key + 1,
                'Name' => $scholar->alt_full_name,
                'Campus' => $scholar->campus?->name,
                'Type of Scholarship' => $scholar->scholarship_type?->name,
                'Category' => $scholar->scholarship_category?->name,
                'Degree Program' => $scholar->degree_program?->name,
                'Delivering HEI' => $scholar->higher_education_institute?->name,
                'Contract Period' => $scholar->contract_start_date?->format('F Y') . ' - ' . $scholar->contract_end_date?->format('F Y'),
                'Extension Period' => $scholar->extension_period,
                'Status' => $scholar->scholarship_status?->name,
                'Date of Graduation' => $scholar->date_of_graduation?->format('m/d/Y'),
                'Number of Service Obligation' => $scholar->contract_start_date?->startOfYear()->diffInYears($scholar->contract_end_date?->startOfYear()) == 0 ? 2 : $scholar->contract_start_date?->startOfYear()->diffInYears($scholar->contract_end_date?->startOfYear()) * 2,
                'End of Service Obligation' => $scholar->end_of_service_obligation_date?->format('m/d/Y'),
                'Remarks' => $scholar->remarks,
            ], null, 'A' . $activeRow, true);
            $worksheet->duplicateStyle($rowStyle, 'A' . $activeRow . ':N' . $activeRow);
            $worksheet->insertNewRowBefore(++$activeRow);
        }
    }
    public static function handle($scholarship_type_id = null)
    {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(storage_path('templates/' . 'scholars profile summary.xlsx'));
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $path = storage_path('app/livewire-tmp/' . date_timestamp_get(now()) . '-scholars-summary.xlsx');
        $ongoingRow = 9;
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setTitle("Scholars Profile Summary");
        $rowStyle = $worksheet->getStyle('A' . $ongoingRow . ':S' . $ongoingRow);
        $ongoing_scholars = Scholar::whereRelation('scholarship_status', 'is_completed', false)
            ->when($scholarship_type_id, fn ($query) => $query->where('scholarship_type_id', $scholarship_type_id))
            ->with('campus', 'scholarship_type', 'scholarship_category', 'degree_program', 'higher_education_institute', 'scholarship_status')->get();
        $completed_scholars = Scholar::whereRelation('scholarship_status', 'is_completed', true)
            ->when($scholarship_type_id, fn ($query) => $query->where('scholarship_type_id', $scholarship_type_id))
            ->with('campus', 'scholarship_type', 'scholarship_category', 'degree_program', 'higher_education_institute', 'scholarship_status')->get();
        if ($scholarship_type = ScholarshipType::find($scholarship_type_id)) {
            $worksheet->setCellValue('A6', strtoupper($scholarship_type->name));
        } else {
            $worksheet->setCellValue('A6', 'ALL SCHOLARSHIP TYPES');
        }
        $completedRow = $ongoingRow + $ongoing_scholars->count() + 2;
        static::insertScholarRows($worksheet, $ongoing_scholars, $rowStyle, $ongoingRow);
        static::insertScholarRows($worksheet, $completed_scholars, $rowStyle, $completedRow);
        $total = $ongoing_scholars->count() + $completed_scholars->count();
        $worksheet->setCellValue('C' . (14 + $total), $ongoing_scholars->count());
        $worksheet->setCellValue('C' . (15 + $total), $completed_scholars->count());
        $worksheet->setCellValue('C' . (16 + $total), $total);
        $writer->save($path);
        return $path;
    }
}
