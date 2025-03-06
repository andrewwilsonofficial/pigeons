<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pair</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
        }

        .main-page {
            width: 196mm;
            height: 243mm;
            box-sizing: border-box;
            position: relative;
            padding: 10mm;
        }

        .breeding-card {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .sire {
            position: absolute;
            top: 96mm;
            left: 65mm;
            font-size: 12px;
            font-family:'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .dam {
            position: absolute;
            top: 96mm;
            left: 115mm;
            font-size: 12px;
            font-family:'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .season {
            position: absolute;
            top: 110mm;
            left: 65mm;
            font-size: 12px;
            font-family:'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .pair {
            position: absolute;
            top: 110mm;
            left: 115mm;
            font-size: 12px;
            font-family:'Times New Roman', Times, serif;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <img src="{{ asset('breeding-card.jpg') }}" class="breeding-card">
    <div class="main-page">
        <img src="{{ $pair->qr_code }}" style="width: 60px; height: 60px; position: absolute; top: 90.5mm; left: 39mm;">
        <span class="sire">
            {{ $pair->cock->band }}
        </span>
        <span class="dam">
            {{ $pair->hen->band }}
        </span>
        <span class="season">
            {{ $pair->season->name }}
        </span>
        <span class="pair">
            {{ $pair->name }}
        </span>
    </div>
</body>

</html>
