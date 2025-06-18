@extends('layouts.app')

@section('content')
    <h2>Müşteri Bilgilerini Güncelle</h2>

    <form action="{{ route('musteriler.update', $musteri->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ad_soyad" class="form-label">Ad Soyad</label>
            <input type="text" name="ad_soyad" class="form-control" id="ad_soyad" value="{{ $musteri->ad_soyad }}" required>
        </div>

        <div class="mb-3">
            <label for="telefon" class="form-label">Telefon</label>
            <input type="text" name="telefon" class="form-control" id="telefon" value="{{ $musteri->telefon }}" required>
        </div>

        <div class="mb-3">
            <label for="plaka" class="form-label">Plaka</label>
            <input type="text" name="plaka" class="form-control" id="plaka" value="{{ $musteri->plaka }}" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control" id="model" value="{{ $musteri->model }}" required>
        </div>

        <button type="submit" class="btn btn-success">Kaydet</button>
        <a href="{{ route('musteriler.index') }}" class="btn btn-secondary">Geri</a>
    </form>
@endsection
