<?php

namespace App\Models;

use Apirone\Lib\PhpQRCode\QRCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
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

    public function getRaceDistanceAttribute()
    {
        try {
            $earthRadius = 6371000;

            $latFrom = deg2rad((float) $this->release_latitude);
            $lonFrom = deg2rad((float) $this->release_longitude);
            $latTo = deg2rad((float) $this->destination_latitude);
            $lonTo = deg2rad((float) $this->destination_longitude);

            $latDelta = $latTo - $latFrom;
            $lonDelta = $lonTo - $lonFrom;

            $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

            $distance = $angle * $earthRadius;

            // Covert the distance to readable units, depending on the distance
            if ($distance < 1000) {
                return round($distance) . ' m';
            } else {
                return round($distance / 1000, 2) . ' km';
            }
        } catch (\Throwable $th) {
            return __('Unknown');
        }
    }
}
