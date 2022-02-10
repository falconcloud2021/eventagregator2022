<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parser extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'parsed_data';

    public function startDateForInput()
    {
        return Carbon::parse($this->parsed_start_date)->format('Y-m-d\TH:i');
    }

    public function finishDateForInput()
    {
        return Carbon::parse($this->parsed_finish_date)->format('Y-m-d\TH:i');
    }

    public function registrationDateForInput()
    {
        return Carbon::parse($this->parsed_registration_date)->format('Y-m-d\TH:i');
    }
}
