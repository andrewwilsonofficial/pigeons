<?php

namespace App\Models;

use Apirone\Lib\PhpQRCode\QRCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'type',
        'date',
        'club_name',
        'club_number',
        'club_location',
        'combine_name',
        'release_point_name',
        'release_longitude',
        'release_latitude',
        'destination_point_name',
        'destination_longitude',
        'destination_latitude',
        'release_temperature',
        'release_weather',
        'release_notes',
        'destination_temperature',
        'destination_weather',
        'destination_notes',
        'total_birds',
        'total_lofts',
        'release_time',
    ];

    public function getQrCodeAttribute()
    {
        $link = route('race', $this);
        $options = [
            's' => 'qrm',
            'fc' => '#000000',
            'bc' => '#FFFFFF',
        ];

        $base64_qr_encoded = QRCode::png($link, $options);

        return $base64_qr_encoded;
    }
}
