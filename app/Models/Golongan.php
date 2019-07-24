<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:44:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Golongan
 * 
 * @property int $id_golongan
 * @property string $gol
 * 
 * @property \Illuminate\Database\Eloquent\Collection $pegawais
 *
 * @package App\Models
 */
class Golongan extends Eloquent
{
	protected $table = 'golongan';
	protected $primaryKey = 'id_golongan';
	public $timestamps = false;

	protected $fillable = [
		'gol'
	];

	public function pegawais()
	{
		return $this->hasMany(\App\Models\Pegawai::class, 'id_golongan');
	}
}
