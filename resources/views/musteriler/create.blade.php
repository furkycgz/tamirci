@extends('layouts.app')

@section('content')
    <div class="card shadow p-4">
        <h2 class="mb-4">Yeni Müşteri Ekleyiniz</h2>

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

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Kaydet</button>
                <a href="{{ route('musteriler.index') }}" class="btn btn-secondary">İptal</a>
            </div>
        </form>
    </div>
@endsection
