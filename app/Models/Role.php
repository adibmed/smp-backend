<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public const IS_SUBMITTER = "submitter";
    public const IS_REVIEWER = "reviewer";
    public const IS_CLIENT = "client";

    /**
     * @return HasMany
     */
    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
