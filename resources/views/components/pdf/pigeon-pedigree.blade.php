<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigeon Pedigree</title>
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
            border: 1mm solid black;
            box-sizing: border-box;
            position: relative;
            padding: 10mm;
        }

        .user-rectangle,
        .pigeon-rectangle,
        .father-rectangle,
        .mother-rectangle,
        .father-father-rectangle,
        .father-mother-rectangle,
        .father-father-father-rectangle,
        .father-father-mother-rectangle,
        .father-mother-father-rectangle,
        .father-mother-mother-rectangle,
        .mother-father-rectangle,
        .mother-mother-rectangle,
        .mother-father-father-rectangle,
        .mother-father-mother-rectangle,
        .mother-mother-father-rectangle,
        .mother-mother-mother-rectangle {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 10px;
            box-sizing: border-box;
        }

        .user-rectangle {
            width: 390px;
            height: 140px;
            border: 1px solid gray;
            position: absolute;
            top: 5mm;
            left: 8mm;
        }

        .pigeon-rectangle {
            width: 210px;
            height: 692px;
            border: 1px solid gray;
            position: absolute;
            top: 180px;
            left: 8mm;
        }

        .father-rectangle {
            width: 160px;
            height: 250px;
            border: 1px solid gray;
            position: absolute;
            top: 180px;
            left: calc(8mm + 195px + 35px);
        }

        .mother-rectangle {
            width: 160px;
            height: 250px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 250px + 35px);
            left: calc(8mm + 195px + 35px);
        }

        .father-father-rectangle {
            width: 140px;
            height: 110px;
            border: 1px solid gray;
            position: absolute;
            top: 180px;
            left: calc(8mm + 195px + 35px + 150px + 28px);
        }

        .father-mother-rectangle {
            width: 140px;
            height: 110px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 120px + 20px);
            left: calc(8mm + 195px + 35px + 150px + 28px);
        }

        .father-mother-father-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 120px + 20px);
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .father-mother-mother-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 120px + 20px + 60px + 10px);
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .father-father-father-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: 180px;
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .father-father-mother-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 60px + 10px);
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .mother-father-rectangle {
            width: 140px;
            height: 110px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 250px + 35px);
            left: calc(8mm + 195px + 35px + 150px + 28px);
        }

        .mother-mother-rectangle {
            width: 140px;
            height: 110px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 250px + 35px + 120px + 20px);
            left: calc(8mm + 195px + 35px + 150px + 28px);
        }

        .mother-mother-father-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 250px + 35px + 120px + 20px);
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .mother-mother-mother-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 250px + 35px + 120px + 20px + 60px + 10px);
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .mother-father-father-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 250px + 35px);
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .mother-father-mother-rectangle {
            width: 120px;
            height: 40px;
            border: 1px solid gray;
            position: absolute;
            top: calc(180px + 250px + 35px + 60px + 10px);
            left: calc(8mm + 195px + 35px + 150px + 40px + 90px + 53px);
        }

        .logo {
            height: 70px;
            position: absolute;
            top: 15mm;
            right: 23mm;
            border-radius: 9px;
        }

        .qr-code-square {
            width: 130px;
            height: 130px;
            border: 2px solid black;
            position: absolute;
            bottom: 6mm;
            left: calc(195px + 17.3mm);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text-rectangle {
            width: 130px;
            height: 130px;
            position: absolute;
            bottom: 6mm;
            left: calc(195px + 70mm);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .text-rectangle p {
            margin: 2px 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
        }

        .pigeon-rectangle span {
            margin: 2px 0;
            font-size: 15px;
        }

        .father-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .father-father-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .father-mother-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .father-father-father-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .father-father-mother-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .father-mother-father-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .father-mother-mother-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .mother-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .mother-father-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .mother-mother-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .mother-father-father-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .mother-father-mother-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .mother-mother-father-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }

        .mother-mother-mother-rectangle span {
            margin: 2px 0;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="main-page">
        <div class="user-rectangle">
            <div>
                {{ Auth::user()->name }}
            </div>
            <div>
                {{ Auth::user()->email }}
            </div>
        </div>
        <div class="pigeon-rectangle">
            <h3>
                {{ $pigeon->band }}
            </h3>
            <span>
                {{ __('Name') }}: {{ $pigeon->name }}
            </span>
            <span>
                {{ __('Year') }}: {{ \Carbon\Carbon::parse($pigeon->date_hatched)->format('Y') }}
            </span>
            <span>
                {{ __('Sex') }}: {{ $pigeon->sex }}
            </span>
            <span>
                {{ __('Status') }}: {{ $pigeon->status }}
            </span>
            <span>
                {{ __('Family') }}: {{ $pigeon->family }}
            </span>
            <span>
                {{ __('Color') }}: {{ $pigeon->color }}
            </span>
            <span>
                {{ __('Eye') }}: {{ $pigeon->eye }}
            </span>
            <span>
                {{ $pigeon->notes }}
            </span>
        </div>
        <div class="father-rectangle">
            @if ($pigeon->sire->id)
                <h5>
                    {{ $pigeon->sire->band }}
                </h5>
                <span>
                    {{ __('Name') }}: {{ $pigeon->sire->name }}
                </span>
                <span>
                    {{ __('Year') }}: {{ \Carbon\Carbon::parse($pigeon->sire->date_hatched)->format('Y') }}
                </span>
                <span>
                    {{ __('Color') }}: {{ $pigeon->sire->color }}
                </span>
                <span>
                    {{ __('Eye') }}: {{ $pigeon->sire->eye }}
                </span>
                <span>
                    {{ __('Status') }}: {{ $pigeon->sire->status }}
                </span>
                <span>
                    {{ __('Family') }}: {{ $pigeon->sire->family }}
                </span>
                <span>
                    {{ $pigeon->sire->notes }}
                </span>
            @endif
        </div>
        <div class="father-father-rectangle">
            @if ($pigeon->sire->sire->id)
                <h5>
                    {{ $pigeon->sire->sire->band }}
                </h5>
                <span>
                    {{ __('Name') }}: {{ $pigeon->sire->sire->name }}
                </span>
                <span>
                    {{ __('Year') }}: {{ \Carbon\Carbon::parse($pigeon->sire->sire->date_hatched)->format('Y') }}
                </span>
                <span>
                    {{ __('Color') }}: {{ $pigeon->sire->sire->color }}
                </span>
                <span>
                    {{ __('Eye') }}: {{ $pigeon->sire->sire->eye }}
                </span>
            @endif
        </div>
        <div class="father-father-father-rectangle">
            @if ($pigeon->sire->sire->sire->id)
                <h5>
                    {{ $pigeon->sire->sire->sire->band }}
                </h5>
            @endif
        </div>
        <div class="father-father-mother-rectangle">
            @if ($pigeon->sire->sire->dam->id)
                <h5>
                    {{ $pigeon->sire->sire->dam->band }}
                </h5>
            @endif
        </div>
        <div class="father-mother-rectangle">
            @if ($pigeon->sire->dam->id)
                <h5>
                    {{ $pigeon->sire->dam->band }}
                </h5>
                <span>
                    {{ __('Name') }}: {{ $pigeon->sire->dam->name }}
                </span>
                <span>
                    {{ __('Year') }}: {{ \Carbon\Carbon::parse($pigeon->sire->dam->date_hatched)->format('Y') }}
                </span>
                <span>
                    {{ __('Color') }}: {{ $pigeon->sire->dam->color }}
                </span>
                <span>
                    {{ __('Eye') }}: {{ $pigeon->sire->dam->eye }}
                </span>
            @endif
        </div>
        <div class="father-mother-father-rectangle">
            @if ($pigeon->sire->dam->sire->id)
                <h5>
                    {{ $pigeon->sire->dam->sire->band }}
                </h5>
            @endif
        </div>
        <div class="father-mother-mother-rectangle">
            @if ($pigeon->sire->dam->dam->id)
                <h5>
                    {{ $pigeon->sire->dam->dam->band }}
                </h5>
            @endif
        </div>
        <div class="mother-rectangle">
            @if ($pigeon->dam->id)
                <h5>
                    {{ $pigeon->dam->band }}
                </h5>
                <span>
                    {{ __('Name') }}: {{ $pigeon->dam->name }}
                </span>
                <span>
                    {{ __('Year') }}: {{ \Carbon\Carbon::parse($pigeon->dam->date_hatched)->format('Y') }}
                </span>
                <span>
                    {{ __('Color') }}: {{ $pigeon->dam->color }}
                </span>
                <span>
                    {{ __('Eye') }}: {{ $pigeon->dam->eye }}
                </span>
                <span>
                    {{ __('Status') }}: {{ $pigeon->dam->status }}
                </span>
                <span>
                    {{ __('Family') }}: {{ $pigeon->dam->family }}
                </span>
                <span>
                    {{ $pigeon->dam->notes }}
                </span>
            @endif
        </div>
        <div class="mother-father-rectangle">
            @if ($pigeon->dam->sire->id)
                <h5>
                    {{ $pigeon->dam->sire->band }}
                </h5>
                <span>
                    {{ __('Name') }}: {{ $pigeon->dam->sire->name }}
                </span>
                <span>
                    {{ __('Year') }}: {{ \Carbon\Carbon::parse($pigeon->dam->sire->date_hatched)->format('Y') }}
                </span>
                <span>
                    {{ __('Color') }}: {{ $pigeon->dam->sire->color }}
                </span>
                <span>
                    {{ __('Eye') }}: {{ $pigeon->dam->sire->eye }}
                </span>
            @endif
        </div>
        <div class="mother-father-father-rectangle">
            @if ($pigeon->dam->sire->sire->id)
                <h5>
                    {{ $pigeon->dam->sire->sire->band }}
                </h5>
            @endif
        </div>
        <div class="mother-father-mother-rectangle">
            @if ($pigeon->dam->sire->dam->id)
                <h5>
                    {{ $pigeon->dam->sire->dam->band }}
                </h5>
            @endif
        </div>
        <div class="mother-mother-rectangle">
            @if ($pigeon->dam->dam->id)
                <h5>
                    {{ $pigeon->dam->dam->band }}
                </h5>
                <span>
                    {{ __('Name') }}: {{ $pigeon->dam->dam->name }}
                </span>
                <span>
                    {{ __('Year') }}: {{ \Carbon\Carbon::parse($pigeon->dam->dam->date_hatched)->format('Y') }}
                </span>
                <span>
                    {{ __('Color') }}: {{ $pigeon->dam->dam->color }}
                </span>
                <span>
                    {{ __('Eye') }}: {{ $pigeon->dam->dam->eye }}
                </span>
            @endif
        </div>
        <div class="mother-mother-father-rectangle">
            @if ($pigeon->dam->dam->sire->id)
                <h5>
                    {{ $pigeon->dam->dam->sire->band }}
                </h5>
            @endif
        </div>
        <div class="mother-mother-mother-rectangle">
            @if ($pigeon->dam->dam->dam->id)
                <h5>
                    {{ $pigeon->dam->dam->dam->band }}
                </h5>
            @endif
        </div>
        <img src="{{ asset('assets/images/brand/logo-dark.png') }}" alt="Logo" class="logo">
        <div class="qr-code-square">
            <img src="{{ $pigeon->qr_code }}" alt="QR Code" style="width: 100%;">
        </div>
        <div class="text-rectangle">
            <p>
                Scan this
            </p>
            <p>
                QR code
            </p>
            <p>
                to view
            </p>
            <p>
                pedigree
            </p>
        </div>
    </div>
</body>

</html>
