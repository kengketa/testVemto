<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use Searchable;

    protected $fillable = ['role_id', 'slug', 'description', 'enable'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'enable' => 'boolean',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
