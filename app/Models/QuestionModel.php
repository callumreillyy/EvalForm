<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'Questions'; 
    protected $primaryKey = 'question_id'; 
    protected $allowedFields = ['number', 'type', 'question'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}
