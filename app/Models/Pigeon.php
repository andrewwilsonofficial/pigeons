<?php

namespace App\Models;

use Apirone\Lib\PhpQRCode\QRCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pigeon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'sire_id',
        'dam_id',
        'name',
        'band',
        'second_band',
        'color_description',
        'location',
        'family',
        'last_owner',
        'rating',
        'color',
        'eye',
        'leg',
        'markings',
        'status',
        'sex',
        'notes',
        'date_hatched',
        'is_public',
    ];

    public function getQrCodeAttribute()
    {
        $link = route('pigeons.view', $this);
        $options = [
            's' => 'qrm',
            'fc' => '#000000',
            'bc' => '#FFFFFF',
        ];

        $base64_qr_encoded = QRCode::png($link, $options);

        return $base64_qr_encoded;
    }

    public function sire()
    {
        return $this->belongsTo(Pigeon::class, 'sire_id')->withDefault([
            'name' => 'Unknown',
            'band' => 'Unknown',
        ]);
    }

    public function dam()
    {
        return $this->belongsTo(Pigeon::class, 'dam_id')->withDefault([
            'name' => 'Unknown',
            'band' => 'Unknown',
        ]);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'type_id')->where('type', 'pigeon');
    }

    function getCoverAttribute($value)
    {
        $attachment = $this->attachments()->first();
        if ($attachment) {
            return route('pigeons.attachmentCover', $attachment->id);
        } else {
            return asset('assets/images/pigeon.png');
        }
    }

    public function attachments()
    {
        return $this->hasMany(PigeonAttachment::class);
    }
}
