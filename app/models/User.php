<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $fillable = ['username', 'email', 'password','test','status'];

}