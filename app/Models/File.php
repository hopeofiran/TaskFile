<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class File
 *
 * @package App\Models
 *
 * @package App\Models
 * @property string                  name
 * @property string                  type
 * @property int                     size
 * @property-read int                id
 * @property-read int                folder_id
 * @property-read \App\Models\Folder folder
 * @property-read \DateTime          created_at
 * @property-read \DateTime          uploaded_at
 * @property-read \DateTime          updated_at
 * @property-read \DateTime          deleted_at
 */
class File extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    /**
     * @return \DateTime
     */
    public function getUploadedAtAttribute()
    {
        return $this->created_at;
    }
}
