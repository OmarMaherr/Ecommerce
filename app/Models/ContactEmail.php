<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','subject' , 'email' , 'name' , 'message', 'contact_emails_status'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ContactEmailsStatus()
    {
        return $this->belongsTo(ContactEmailsStatus::class);
    }
}
