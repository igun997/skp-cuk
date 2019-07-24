<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:52:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SkpDetail
 * 
 * @property int $id_sd
 * @property int $id_skp
 * @property int $id_kegiatan
 * @property float $kuantitas
 * @property float $kualitas
 * 
 * @property \App\Models\Skp $skp
 * @property \App\Models\Kegiatan $kegiatan
 *
 * @package App\Models
 */
class SkpDetail extends Eloquent
{
	protected $table = 'skp_detail';
	protected $primaryKey = 'id_sd';
	public $timestamps = false;

	protected $casts = [
		'id_skp' => 'int',
		'id_kegiatan' => 'int',
		'kuantitas' => 'float',
		'kualitas' => 'float'
	];

	protected $fillable = [
		'id_skp',
		'id_kegiatan',
		'kuantitas',
		'kualitas'
	];

	public function skp()
	{
		return $this->belongsTo(\App\Models\Skp::class, 'id_skp');
	}

	public function kegiatan()
	{
		return $this->belongsTo(\App\Models\Kegiatan::class, 'id_kegiatan');
	}
}
