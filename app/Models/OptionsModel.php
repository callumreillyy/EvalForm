<?php

namespace App\Models;

use CodeIgniter\Model;

class OptionsModel extends Model
{
    protected $table = 'Options'; 
    protected $primaryKey = 'option_id'; 
    protected $allowedFields = ['option', 'selected'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}
