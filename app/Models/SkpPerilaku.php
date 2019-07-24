<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:44:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SkpPerilaku
 * 
 * @property int $id_sp
 * @property int $id_skp
 * @property float $orientasi_pelayanan
 * @property float $integritas
 * @property float $komitmen
 * @property float $disiplin
 * @property float $kerjasama
 * @property float $kepemimpinan
 * 
 * @property \App\Models\Skp $skp
 *
 * @package App\Models
 */
class SkpPerilaku extends Eloquent
{
	protected $table = 'skp_perilaku';
	protected $primaryKey = 'id_sp';
	public $timestamps = false;

	protected $casts = [
		'id_skp' => 'int',
		'orientasi_pelayanan' => 'float',
		'integritas' => 'float',
		'komitmen' => 'float',
		'disiplin' => 'float',
		'kerjasama' => 'float',
		'kepemimpinan' => 'float'
	];

	protected $fillable = [
		'id_skp',
		'orientasi_pelayanan',
		'integritas',
		'komitmen',
		'disiplin',
		'kerjasama',
		'kepemimpinan'
	];

	public function skp()
	{
		return $this->belongsTo(\App\Models\Skp::class, 'id_skp');
	}
}
