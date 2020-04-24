<?php

namespace App\Exports;

use App\PendaftarModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarRaportExport implements FromArray, WithHeadings
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
        $get = $model->getDataRaport($this->nisn)[0]->raport;
        $decode = json_decode($get);
        foreach ($decode as $g => $value)
        {
            $this->headings[] = 'Semester';
            $this->array[$g][] = $g;
            foreach ($value as $v)
            {
                $this->headings[] = $v->display;
                $this->array[$g][] = $v->value;
             }
        }
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
