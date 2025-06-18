<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Müşteriler - Tamirci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h1>Müşteriler</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('musteriler.create') }}" class="btn btn-primary mb-3">Yeni Müşteri Ekle</a>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
        <tr>
            <th>Ad Soyad</th>
            <th>Telefon</th>
            <th>Plaka</th>
            <th>Model</th>
            <th>İşlemler</th>
            <th>İşlem Ekle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($musteriler as $musteri)
            <tr>
                <td>{{ $musteri->ad_soyad }}</td>
                <td>{{ $musteri->telefon }}</td>
                <td>{{ $musteri->plaka }}</td>
                <td>{{ $musteri->model }}</td>
                <td>
                    <div class="mb-2">
                        <a href="{{ route('musteriler.edit', $musteri->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                        <a href="{{ route('musteriler.show', $musteri->id) }}" class="btn btn-sm btn-info">Detay</a>

                        <form action="{{ route('musteriler.destroy', $musteri->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bu müşteriyi silmek istediğinize emin misiniz?')">
                                Müşteryi Sil ! 
                            </button>
                        </form>
                    </div>

                    @if($musteri->islemler->count())
                        <ul class="list-unstyled mb-1">
                            @foreach($musteri->islemler as $islem)
                                <li>
                                    {{ $islem->yapilan_islem }} - {{ number_format($islem->fiyat, 2) }} ₺

                                    <form action="{{ route('islemler.destroy', $islem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ms-2"
                                                onclick="return confirm('Bu işlemi silmek istediğinize emin misiniz?')">
                                             Bu İşlemi Sil
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                        <div class="fw-bold text-success">
                            Toplam: {{ number_format($musteri->islemler->sum('fiyat'), 2) }} ₺
                        </div>
                    @else
                        <em>İşlem yok</em>
                    @endif
                </td>
                <td>
                    <a href="{{ route('musteriler.islem.create', $musteri->id) }}" class="btn btn-sm btn-primary">İşlem Ekle</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
