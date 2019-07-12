<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'team_id',
        'unsubscribed_status',
        'first_name',
        'last_name',
        'phone',
        'email',
        'sticky_phone_number_id',
        'twitter_id',
        'fb_messenger_id',
        'time_zone'
    ];

    protected $casts = [
        'team_id' => 'integer',
        'sticky_phone_number_id' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function setTeamIdAttribute($value)
    {
        $this->attributes['team_id'] = intval($value);
    }

    public function setStickyPhoneNumberIdAttribute($value)
    {
        $this->attributes['firststicky_phone_number_id_name'] = intval($value);
    }

    public function customAttributes()
    {
        return $this->hasMany(CustomAttribute::class);
    }

    public static function getFields() {
        return (new static)->fillable;
    }


}
