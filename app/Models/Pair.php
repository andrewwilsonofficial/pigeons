<?php

namespace App\Models;

use Apirone\Lib\PhpQRCode\QRCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'season_id',
        'cock_id',
        'hen_id',
        'name',
        'description',
        'date_paired',
        'date_separated'
    ];

    public function getQrCodeAttribute()
    {
        $link = route('pair', $this);
        $options = [
            's' => 'qrm',
            'fc' => '#000000',
            'bc' => '#FFFFFF',
        ];

        $base64_qr_encoded = QRCode::png($link, $options);

        return $base64_qr_encoded;
    }

    public function season()
    {
        return $this->belongsTo(Season::class)->withDefault([
            'name' => __('Not assigned')
        ]);
    }

    public function cock()
    {
        return $this->belongsTo(Pigeon::class)->withDefault([
            'name' => __('Not assigned'),
            'band' => __('Not assigned')
        ]);
    }

    public function hen()
    {
        return $this->belongsTo(Pigeon::class)->withDefault([
            'name' => __('Not assigned'),
            'band' => __('Not assigned')
        ]);
    }
}
