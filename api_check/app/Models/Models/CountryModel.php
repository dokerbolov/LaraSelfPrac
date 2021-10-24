<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
  protected $table = 'country_lang';

  public $timestamps = false;

  protected $filltable = [
    'id',
    'alias',
    'name',
    'name_en'
  ];

  protected $guarded = [];
}
