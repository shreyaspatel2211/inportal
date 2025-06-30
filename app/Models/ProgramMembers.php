<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProgramController;

class ProgramMembers extends Model
{
 protected $table = 'program_members';

    protected $fillable = ['program_id', 'user_id', 'member_data', 'file', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'member');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program');
    }
}
