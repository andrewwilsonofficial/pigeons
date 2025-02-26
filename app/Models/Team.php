<?php

namespace App\Models;

use Apirone\Lib\PhpQRCode\QRCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'pigeons',
    ];

    public function getQrCodeAttribute()
    {
        $link = route('team', $this);
        $options = [
            's' => 'qrm',
            'fc' => '#000000',
            'bc' => '#FFFFFF',
        ];

        $base64_qr_encoded = QRCode::png($link, $options);

        return $base64_qr_encoded;
    }

    public function pigeons()
    {
        $pigeonIds = json_decode($this->pigeons, true);
        $pigeonIds = array_map('intval', $pigeonIds);

        return Pigeon::whereIn('id', $pigeonIds)->get();
    }
}
