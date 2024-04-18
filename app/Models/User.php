<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'is_admin',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }


    public static function createUser($name, $password, $isa) {
        $newUser = new User;
        $newUser->name = $name;
        $newUser->password = $password;
        $newUser->is_admin = $isa;
        $newUser->save();
    }

    public static function getUsers() {
        $non_admin_users = User::where('is_admin', 0)->get();
        $admin_users = User::where('is_admin', 1)->get();
         // dd($non_admin_users);
        return [$non_admin_users, $admin_users];
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'user__invoices', 'user_id', 'invoice_id');
    }
}
