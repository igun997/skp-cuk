<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 15 Jul 2019 04:09:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Kegiatan
 * 
 * @property int $id_kegiatan
 * @property string $nama
 * @property float $kuantitas
 * @property string $satuan_kuantitas
 * @property int $id_unit
 * @property float $kualitas
 * @property int $waktu
 * @property float $biaya
 * 
 * @property \App\Models\Unit $unit
 * @property \Illuminate\Database\Eloquent\Collection $skp_details
 *
 * @package App\Models
 */
class Kegiatan extends Eloquent
{
	protected $table = 'kegiatan';
	protected $primaryKey = 'id_kegiatan';
	public $timestamps = false;

	protected $casts = [
		'kuantitas' => 'float',
		'id_unit' => 'int',
		'kualitas' => 'float',
		'waktu' => 'int',
		'biaya' => 'float'
	];

	protected $fillable = [
		'nama',
		'kuantitas',
		'satuan_kuantitas',
		'id_unit',
		'kualitas',
		'waktu',
		'biaya'
	];

	public function unit()
	{
		return $this->belongsTo(\App\Models\Unit::class, 'id_unit');
	}

	public function skp_details()
	{
		return $this->hasMany(\App\Models\SkpDetail::class, 'id_kegiatan');
	}
}
