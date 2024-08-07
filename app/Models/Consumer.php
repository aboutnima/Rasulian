<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enum\ConsumerContactPreference;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Consumer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];
    protected $appends = [
        'full_name'
    ];
    protected function casts(): array
    {
        return [
            'contact_preference' => ConsumerContactPreference::class
        ];
    }

    // Attributes
//    public function firstname($value): Attribute
//    {
//        return Attribute::make(
//            set: fn () => ucfirst($value)
//        );
//    }

//    public function lastname($value): Attribute
//    {
//        return Attribute::make(
//            set: fn () => ucfirst($value)
//        );
//    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->firstname . ' ' . $this->lastname
        );
    }

    // Relations
    public function insurance(): HasMany
    {
        return $this->hasMany(Insurance::class);
    }
}
