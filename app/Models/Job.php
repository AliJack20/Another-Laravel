<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class Job extends Model  {
    
    use HasFactory;
    protected $table = 'jobs';

    protected $guarded =[];

    public function employer() {

        return $this->belongsTo(EMployer::class);
    }

    public function tags() {

        return $this->belongsToMany;

    }



}

?>