<?php

namespace App\Actions;

class GenerateWorksheetForScholarsProfileReport
{
    public static function handle($scholars, string $worksheetTitle, &$worksheetTemplate, &$spreadsheet)
    {
        $startRow = 12;
        $activeRow = $startRow;
        $worksheet = clone $worksheetTemplate;
        $worksheet->setTitle(strtoupper($worksheetTitle));
        $worksheet->setCellValue('A10', strtoupper($worksheetTitle));
        $spreadsheet->addSheet($worksheet);
        foreach ($scholars as $scholar) {
            $rowStyle = $worksheet->getStyle('A' . $startRow . ':S' . $startRow);
            if ($scholar->profile_photo) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setPath(storage_path('app/public/profile_photos/' . $scholar->profile_photo));
                $drawing->setHeight(100);
                $drawing->setWidth(100);
                $drawing->setCoordinates('B' . $activeRow);
                $drawing->setWorksheet($worksheet);
                $drawing->setOffsetX(40);
                $drawing->setOffsetY(40);
            }
            $worksheet->fromArray([
                'Personnel No.' => $activeRow - $startRow + 1,
                'Photo' => '',
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
                'Is the scholar still connected with the Sending Higher Education Institution? (Yes / No)' => $scholar->connected_to_hei ? 'Yes' : 'No',
                'The scholar is no longer connected due to: (Resignation, Termination, Health Reasons, Others)' => $scholar->hei_disconnection_reason?->name,
                'Does the scholar have a request for extension? (Yes / No)' => $scholar->extension_requested ? 'Yes' : 'No',
                'If yes, what is the status of the request? (Pending, Approved, Disapproved)' => $scholar->extension_status,
            ], null, 'A' . $activeRow, true);
            $worksheet->duplicateStyle($rowStyle, 'A' . $activeRow . ':S' . $activeRow);
            $worksheet->getRowDimension($activeRow)->setRowHeight(140, 'px');
            $activeRow++;
        }
    }
}
