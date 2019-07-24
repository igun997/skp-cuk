<?php

namespace App\Imports;

use App\Models\Kegiatan;
use Maatwebsite\Excel\Concerns\ToModel;

class KegiatanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kegiatan([
          "nama"=>$row[0],
          "kuantitas"=>$row[1],
          "satuan_kuantitas"=>$row[2],
          "id_unit"=>$row[3],
          "kualitas"=>$row[4],
          "waktu"=>$row[5],
          "biaya"=>$row[6],
        ]);
    }
}
