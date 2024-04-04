<?php

namespace Modules\Sistema\Entities;

use App\Entities\BaseModel;

class Cidade extends BaseModel
{
    protected $table = 'cidade';

    protected $fillable = [
        'id_cidade',
        'cidade',
        'uf',
        'regiao',
    ];
}
