@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>{{ $musteri->ad_soyad }} için İşlem Ekle</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $hata)
                    <li>{{ $hata }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('musteriler.islem.store', $musteri->id) }}">
        @csrf
        <div class="mb-3">
            <label for="yapilan_islem" class="form-label">Yapılan İşlem</label>
            <input type="text" class="form-control" id="yapilan_islem" name="yapilan_islem" value="{{ old('yapilan_islem') }}" required />
        </div>
        <div class="mb-3">
            <label for="fiyat" class="form-label">Fiyat (₺)</label>
            <input type="number" step="0.01" class="form-control" id="fiyat" name="fiyat" value="{{ old('fiyat') }}" required />
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="{{ route('musteriler.show', $musteri->id) }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
@endsection
