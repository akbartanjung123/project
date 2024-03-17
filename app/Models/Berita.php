<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'photo_berita',
        'judul',
        'isi',

    ];


    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->SetTimezone('UTC')->setTimezone('Asia/Makassar')->format('Y-m-d H:i');
    }

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->SetTimezone('UTC')->setTimezone('Asia/Makassar')->format('Y-m-d H:i');
    }

    public function getPhotoBeritaAttribute($value) {
        return env('ASSET_URL') ."/uploads/" .$value;
    }

}
