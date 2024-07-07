<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class folder
 *
 * @package App\Models
 * @property string                                        name
 * @property int                                           parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection childrenFolders
 * @property-read \Illuminate\Database\Eloquent\Collection childrenFiles
 * @property-read int                                      id
 * @property-read \App\Models\Folder                       parent
 * @property-read \DateTime                                created_at
 * @property-read \DateTime                                updated_at
 * @property-read \DateTime                                deleted_at
 */
class Folder extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo | $this
     */
    public function parent()
    {
        if ($this->parent_id == null) {
            return $this->belongsTo(static::class, 'id');
        }

        return $this->belongsTo(Folder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrenFolders()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrenFiles()
    {
        return $this->hasMany(File::class);
    }
}
