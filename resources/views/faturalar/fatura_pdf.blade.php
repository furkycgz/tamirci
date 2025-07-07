<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Fatura</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
        .logo { max-height: 80px; }
        .company { margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="company">
        @if($ayarlar)
            @if($ayarlar->logo)
                <img src="{{ public_path('storage/' . $ayarlar->logo) }}" class="logo" alt="Logo">
            @endif
            <h2>{{ $ayarlar->sirket_adi }}</h2>
            <p>{{ $ayarlar->adres }}</p>
        @else
            <h2>Şirket Bilgisi Tanımlı Değil</h2>
        @endif
    </div>

    <h3>Müşteri Bilgileri</h3>
    <p><strong>Ad Soyad:</strong> {{ $musteri->ad_soyad }}</p>
    <p><strong>Telefon:</strong> {{ $musteri->telefon }}</p>
    <p><strong>Araba:</strong> {{ $musteri->model }} - {{ $musteri->plaka }}</p>

    <h3>İşlem Listesi</h3>
    <table>
        <thead>
            <tr>
                <th>Tarih</th>
                <th>İşlem</th>
                <th>Fiyat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($islemler as $islem)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($islem->created_at)->format('d.m.Y') }}</td>
                    <td>{{ $islem->yapilan_islem }}</td>
                    <td>{{ number_format($islem->fiyat, 2, ',', '.') }} TL</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 style="text-align: right; margin-top: 20px;">
        Toplam: {{ number_format($islemler->sum('fiyat'), 2, ',', '.') }} TL
    </h4>

</body>
</html>
