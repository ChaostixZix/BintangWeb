<?php

namespace App\Exports;

use App\PendaftarModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExportAll implements FromArray, WithHeadings
{
    use Exportable;

    /**
     * @var array
     */
    private $array;
    /**
     * @var array
     */
    private $headings;

    public function __construct()
    {
        $model =  new PendaftarModel();
        $get = $model->getAllData();
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
