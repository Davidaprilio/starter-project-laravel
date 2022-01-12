<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir' => 'datetime',
    ];


    protected $appends = [
        'photo_url'
    ];

    /**
     * Get the Url Photo Profile from this User
     *
     * @return String
     */
    public function getPhotoUrlAttribute()
    {
        $link = explode('://', $this->photo);
        if($link[0] == 'http' || $link[0] == 'https') {
            return $this->photo;
        } else {
            return url("photo/{$this->photo}");
        }
    }

    /**
     * Get the Provinsi from this User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    /**
     * Get the Kota from this User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
    
    /**
     * Get the Kecamatan from this User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
