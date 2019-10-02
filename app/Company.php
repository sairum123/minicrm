<?php

namespace App;

use App\Mail\WelcomeMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class Company extends Model
{
    protected $guarded = [];

    public static function boot(){
        //triger an event to send email
        Parent::boot();
        static::created(function($company){
            //sending email to admin for this test purpose
            Mail::to('admin@admin.com')->send(new welcomeMail($company));
        });
        static::deleted(function($company){
            //deleting an logo from directory when company record is deleted
            $image_path = "storage/".$company->logo;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        });
    }

    //scope query for companies dropdown component
    public function scopeForDropdown($query)
    {
        return $query->pluck('name', 'id');
    }
}
