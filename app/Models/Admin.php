<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 18:44:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property int $id_admin
 * @property string $username
 * @property string $password
 *
 * @package App\Models
 */
class Admin extends Eloquent
{
	protected $table = 'admin';
	protected $primaryKey = 'id_admin';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password'
	];
}
