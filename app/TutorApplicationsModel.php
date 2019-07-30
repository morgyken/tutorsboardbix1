<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorApplicationsModel extends Model
{
    protected $table = 'tutor_applications_models';
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';

    protected $fillable =[
    						'qualification', 'course', 'paypalemail', 
    						'phone', 'email'
    						];
}
