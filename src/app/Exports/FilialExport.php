<?php

namespace App\Exports;

use App\Models\Filial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class FilialExport implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $results;

    public function __construct(array $results = [])
    {
        $this->results = $results;
    }


    public function headings(): array
    {
        return [
            '#',
            'NOME',
            'ENDEREÇO',
            'INCRIÇÃO ESTADUAL',
            'CNPJ',
            'CRE_AT',
            'UPD_AT'
        ];
    }

    public function title(): string
    {
        return 'Filiais';
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {
    
                // last column as letter value (e.g., D)
                $last_column = Coordinate::stringFromColumnIndex(0);
    
                // calculate last row + 1 (total results + header rows + column headings row + new row)
                $last_row = count($this->results) + 2 + 1 + 1;
    
                // set up a style array for cell formatting
                $style_text_center = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ]
                ];
    
                // at row 1, insert 2 rows
                $event->sheet->insertNewRowBefore(1, 2);
    
                // merge cells for full-width
                $event->sheet->mergeCells(sprintf('A1:G1',$last_column));
                $event->sheet->mergeCells(sprintf('A2:G2',$last_column));
                $event->sheet->mergeCells(sprintf('A%d:G%d',$last_row,$last_row));
    
                // assign cell values
                $event->sheet->setCellValue('A1','LISTA DE FILIAIS');
                $event->sheet->setCellValue('A2','DESAFIO PHP - RODRIGO ADÃO DOS SANTOS');
                $event->sheet->setCellValue(sprintf('A%d',$last_row),'BASIS TECNOLOGIA DA INFORMACÃO COLATINA-ES ');
    
                // assign cell styles
                $event->sheet->getStyle('A1:A2')->applyFromArray($style_text_center);
                $event->sheet->getStyle(sprintf('A%d',$last_row))->applyFromArray($style_text_center);

            },
        ];
    }
    public function query()
    {
        return Filial::query()->whereIn('id',$this->results);   
    }
}
