@extends('layouts.app')

@section('content')
    <h2>İşlem Güncelle - {{ $musteri->ad_soyad }}</h2>

    <form action="{{ route('musteriler.islem.update', [$musteri->id, $islem->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="yapilan_islem" class="form-label">Yapılan İşlem</label>
            <input type="text" name="yapilan_islem" id="yapilan_islem" class="form-control" value="{{ $islem->yapilan_islem }}" required>
        </div>

        <div class="mb-3">
            <label for="fiyat" class="form-label">Fiyat (₺)</label>
            <input type="number" name="fiyat" id="fiyat" class="form-control" step="0.01" value="{{ $islem->fiyat }}" required>
        </div>

        <button type="submit" class="btn btn-success">Güncelle</button>
        <a href="{{ route('musteriler.show', $musteri->id) }}" class="btn btn-secondary">İptal</a>
    </form>
@endsection
