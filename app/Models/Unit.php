<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:44:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Unit
 * 
 * @property int $id_unit
 * @property string $nama
 * 
 * @property \Illuminate\Database\Eloquent\Collection $pegawais
 *
 * @package App\Models
 */
class Unit extends Eloquent
{
	protected $table = 'unit';
	protected $primaryKey = 'id_unit';
	public $timestamps = false;

	protected $fillable = [
		'nama'
	];

	public function pegawais()
	{
		return $this->hasMany(\App\Models\Pegawai::class, 'id_unit');
	}
}
