<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:44:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pegawai
 * 
 * @property string $nip
 * @property string $password
 * @property string $nama
 * @property int $id_golongan
 * @property int $id_jabatan
 * @property int $id_unit
 * @property string $jk
 * 
 * @property \App\Models\Golongan $golongan
 * @property \App\Models\Jabatan $jabatan
 * @property \App\Models\Unit $unit
 * @property \Illuminate\Database\Eloquent\Collection $skps
 * @property \Illuminate\Database\Eloquent\Collection $skp_details
 *
 * @package App\Models
 */
class Pegawai extends Eloquent
{
	protected $table = 'pegawai';
	protected $primaryKey = 'nip';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_golongan' => 'int',
		'id_jabatan' => 'int',
		'id_unit' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password',
		'nip',
		'nama',
		'id_golongan',
		'id_jabatan',
		'id_unit',
		'jk'
	];

	public function golongan()
	{
		return $this->belongsTo(\App\Models\Golongan::class, 'id_golongan');
	}

	public function jabatan()
	{
		return $this->belongsTo(\App\Models\Jabatan::class, 'id_jabatan');
	}

	public function unit()
	{
		return $this->belongsTo(\App\Models\Unit::class, 'id_unit');
	}

	public function skps()
	{
		return $this->hasMany(\App\Models\Skp::class, 'nip_pejabat');
	}

	public function skp_details()
	{
		return $this->hasMany(\App\Models\SkpDetail::class, 'nip');
	}
}
