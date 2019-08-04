<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */

use Illuminate\Database\Eloquent\Model as Eloquent;

class Review extends Eloquent
{
    protected $fillable = ['first_name', 'last_name','email', 'input_income','input_payment','budget','test'];



}