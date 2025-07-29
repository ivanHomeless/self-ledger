<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAttachment extends Model
{
    /** @use HasFactory<\Database\Factories\FileAttachmentFactory> */
    use HasFactory;

    protected $fillable = [
        'file_path',
        'name',
        'client_id',
        'project_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
