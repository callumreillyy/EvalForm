<?php

namespace App\Models;

use CodeIgniter\Model;

class TextQuestionModel extends Model
{
    protected $table = 'TextQuestion'; 
    protected $primaryKey = 'text_question_id'; 
    protected $allowedFields = ['question', 'number', 'response'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}