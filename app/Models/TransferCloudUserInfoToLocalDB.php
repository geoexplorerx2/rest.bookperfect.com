<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferCloudUserInfoToLocalDB extends Model
{
    use HasFactory;
    protected $table = 'userTable';
    protected $fillable = [
        'userName', 'userEmailID', 'userCountry', 'userAgency', 'userSurname',
        'userProfile', 'userIsB2C', 'userRegisterViaAPI',
    ];
}
