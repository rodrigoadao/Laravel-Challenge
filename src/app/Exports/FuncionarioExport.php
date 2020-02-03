<?php

namespace App\Exports;

use App\Models\Funcionario;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class FuncionarioExport implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
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
            'FILIAL_ID',
            'NOME',
            'ENDEREÇO',
            'DATA DE NASCIMENTO',
            'SEXO',
            'CPF',
            'CARGO',
            'SALÁRIO',
            'SITUAÇÃO',
            'CRE_AT',
            'UPD_AT'
        ];
    }

    public function title(): string
    {
        return 'Funcionário';
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
                $event->sheet->mergeCells(sprintf('A1:L1',$last_column));
                $event->sheet->mergeCells(sprintf('A2:L2',$last_column));
                $event->sheet->mergeCells(sprintf('A%d:L%d',$last_row,$last_row));
    
                // assign cell values
                $event->sheet->setCellValue('A1','LISTA DE FUNCIONÁRIOS');
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
        return Funcionario::query()->select('id','filial_id','nome','endereco','dtNacimento','sexo','cpf','cargo','salario','situacao','created_at', 'updated_at')->whereIn('id',$this->results);   
    }
}
