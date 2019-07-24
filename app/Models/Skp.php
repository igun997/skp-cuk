<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 24 Jul 2019 00:58:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Skp
 *
 * @property int $id_skp
 * @property string $nip_pejabat
 * @property string $nip_pegawai
 * @property string $status
 * @property \Carbon\Carbon $tahun
 *
 * @property \App\Models\Pegawai $pegawai
 * @property \Illuminate\Database\Eloquent\Collection $skp_details
 * @property \Illuminate\Database\Eloquent\Collection $skp_perilakus
 *
 * @package App\Models
 */
class Skp extends Eloquent
{
	protected $table = 'skp';
	protected $primaryKey = 'id_skp';
	public $timestamps = false;


	protected $fillable = [
		'nip_pejabat',
		'nip_pegawai',
		'status',
		'tahun'
	];

	public function pejabat()
	{
		return $this->belongsTo(\App\Models\Pegawai::class, 'nip_pejabat');
	}
	public function pegawai()
	{
		return $this->belongsTo(\App\Models\Pegawai::class, 'nip_pegawai');
	}

	public function skp_details()
	{
		return $this->hasMany(\App\Models\SkpDetail::class, 'id_skp');
	}

	public function skp_perilakus()
	{
		return $this->hasMany(\App\Models\SkpPerilaku::class, 'id_skp');
	}
}
