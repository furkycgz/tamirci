@extends('layouts.app')

@section('content')
    <h2>Yeni Müşteri Ekle</h2>

    <form action="{{ route('musteriler.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="ad_soyad" class="form-label">Ad Soyad</label>
            <input type="text" name="ad_soyad" class="form-control" id="ad_soyad" required>
        </div>

        <div class="mb-3">
            <label for="telefon" class="form-label">Telefon</label>
            <input type="text" name="telefon" class="form-control" id="telefon" required>
        </div>

        <div class="mb-3">
            <label for="plaka" class="form-label">Plaka</label>
            <input type="text" name="plaka" class="form-control" id="plaka" required>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control" id="model" required>
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="{{ route('musteriler.index') }}" class="btn btn-secondary">İptal</a>
    </form>
@endsection
