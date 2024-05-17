<?php

namespace App\Models;

use CodeIgniter\Model;

class OptionModel extends Model
{
    protected $table = 'Option'; 
    protected $primaryKey = 'option_id'; 
    protected $allowedFields = ['option_text'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}