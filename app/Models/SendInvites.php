<?php

namespace App\Models;

use App\User;
use App\Models\SendInvitesTitle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class SendInvites extends Model
{

    protected $table = 'send_invites';

    protected $fillable = [
          'user_id',
          'type',
          'subject',
          'phone',
          'email',
          'name',
          'purl',
          'message',
          'personal_video',
          'elite_business_challenge',
          'elite_health_challenge',
          'data_1',
          'data_2',
          'data_3',
          'data_4',
          'data_5',
          'data_6',
          'data_7',
          'data_8',
          'data_9',
          'data_10',
          'data_11',
          'data_12',
          'data_13',
          'data_14',
          'data_15',
          'data_16',
          'data_17',
          'data_18',
          'data_19',
          'data_20',
          'data_21',
          'data_22',
          'data_23',
          'data_24',
          'data_25',
          'data_26',
          'data_27',
          'data_28',
          'data_29',
          'data_30',
          'data_31',
          'data_32',
          'data_33',
          'data_34',
          'data_35',
          'data_36',
          'data_37',
          'data_38',
          'data_39',
          'data_40',
          'data_41',
          'data_42',
          'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function send_invite_titles()
    {
        return $this->hasMany(SendInvitesTitle::class, 'invite_id', 'id');
    }

}
