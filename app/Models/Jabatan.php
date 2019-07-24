<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:44:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Jabatan
 * 
 * @property int $id_jabatan
 * @property string $jabatan
 * 
 * @property \Illuminate\Database\Eloquent\Collection $pegawais
 *
 * @package App\Models
 */
class Jabatan extends Eloquent
{
	protected $table = 'jabatan';
	protected $primaryKey = 'id_jabatan';
	public $timestamps = false;

	protected $fillable = [
		'jabatan'
	];

	public function pegawais()
	{
		return $this->hasMany(\App\Models\Pegawai::class, 'id_jabatan');
	}
}
