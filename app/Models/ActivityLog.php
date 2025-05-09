<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'amt_to_pay',
        'loan_id',
        'loan_status_id',
        'loan_type_id',
        'user_status_id',
        'date'
    ];

    public function Application() {
        return $this->belongsTo(Loan_application::class);
    }

    public function Status() {
        return $this->belongsTo(LoanStatus::class); 
    }

    public function Type() {
        return $this->belongsTo(LoanType::class); 
    }
}
