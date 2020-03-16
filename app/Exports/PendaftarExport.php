<?php

namespace App\Exports;

use App\PendaftarModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExport implements FromArray, WithHeadings
{
    use Exportable;

    private $nisn;
    /**
     * @var array
     */
    private $array;
    /**
     * @var array
     */
    private $headings;

    public function __construct($nisn)
    {
        $this->nisn = $nisn;
        $model =  new PendaftarModel();
        $get = $model->getAllDataByNisn($this->nisn);
        foreach ($get[0] as $g => $value)
        {
            $this->headings[] = $g;
        }
        $this->array =  $get->toArray();
    }


    /**
     * @inheritDoc
     */
    public function array(): array
    {
        return $this->array;
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return $this->headings;
    }
}
