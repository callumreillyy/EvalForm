<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'Surveys';
    protected $primaryKey = 'survey_id';
    protected $allowedFields = ['title', 'description', 'respondants'];
    protected $useTimestamps = true;
}
