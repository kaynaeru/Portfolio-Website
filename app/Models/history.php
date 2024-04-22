<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class history extends Model
{
    use HasFactory;
    protected $table = "history";
    protected $fillable = [
        'title', 
        'type', 
        'start_date', 
        'end_date', 
        'info1', 
        'info2', 
        'info3',
        'content'
    ];
    protected $appends =['start_date_eng','end_date_eng'];
    public function getStartDateEngAttribute(){
        return Carbon::parse($this->attributes['start_date'])->translatedFormat('d F Y');
    }
    public function getEndDateEngAttribute(){
        if($this->attributes['end_date']){
            return Carbon::parse($this->attributes['end_date'])->translatedFormat('d F Y');
        }
        else{
            return 'Present';
        }
    }
}
