<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Wave\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'verification_code',
        'verified',
        'trial_ends_at',
        'phone_number',
        'country',
        'states',
        'user_type',
        'role_id',
        'sector',
    ];

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
        'trial_ends_at' => 'datetime',
    ];
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('username')->unique()->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('username')->nullable()->change();
        });
    }

    public function dealrooms()
    {
        return $this->belongsToMany(DealRoom::class, 'dealrooms_users', 'user_id', 'dealroom_id');
    }

    public function scopeRoleThirteen($query)
    {
        return $query->where('role_id', 13);
    }
}
