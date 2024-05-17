<?php

namespace App\Models;

use CodeIgniter\Model;

class MultipleQuestionModel extends Model
{
    protected $table = 'MultipleQuestion'; 
    protected $primaryKey = 'multiple_question_id'; 
    protected $allowedFields = ['question', 'number'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}
