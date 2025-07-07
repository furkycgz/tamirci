@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>{{ $musteri->ad_soyad }} için İşlem(ler) Ekle</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $hata)
                    <li>{{ $hata }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('musteriler.islemler.store', $musteri->id) }}">
        @csrf

        <div id="islem-listesi">
            <div class="islem-item mb-4 border p-3 rounded">
                <h5>1. İşlem</h5>
                <div class="mb-3">
                    <label class="form-label">Yapılan İşlem</label>
                    <input type="text" name="islemler[0][yapilan_islem]" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fiyat (₺)</label>
                    <input type="number" step="0.01" name="islemler[0][fiyat]" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-outline-success mb-3" onclick="islemEkle()">+ İşlem Ekle</button>

        <br>
        <button type="submit" class="btn btn-primary">Tümünü Kaydet</button>
        <a href="{{ route('musteriler.show', $musteri->id) }}" class="btn btn-secondary">Geri</a>
    </form>
</div>

<script>
    let islemSayisi = 1;

    function islemEkle() {
        const liste = document.getElementById('islem-listesi');

        const div = document.createElement('div');
        div.classList.add('islem-item', 'mb-4', 'border', 'p-3', 'rounded');

        div.innerHTML = `
            <h5>${islemSayisi + 1}. İşlem</h5>
            <div class="mb-3">
                <label class="form-label">Yapılan İşlem</label>
                <input type="text" name="islemler[${islemSayisi}][yapilan_islem]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fiyat (₺)</label>
                <input type="number" step="0.01" name="islemler[${islemSayisi}][fiyat]" class="form-control" required>
            </div>
        `;

        liste.appendChild(div);
        islemSayisi++;
    }
</script>
@endsection
