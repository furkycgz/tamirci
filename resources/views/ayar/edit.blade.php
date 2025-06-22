@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Genel Ayarlar</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('ayar.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Şirket Adı</label>
            <input type="text" name="sirket_adi" class="form-control" value="{{ old('sirket_adi', $ayar->sirket_adi ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Adres</label>
            <textarea name="adres" class="form-control">{{ old('adres', $ayar->adres ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Logo Yükle</label>
            <input type="file" name="logo" class="form-control">
            <br>
            @if(isset($ayar->logo))
              <img src="{{ asset('storage/' . $ayar->logo) }}" alt="Logo" height="40" width="40" class="rounded-circle me-2" style="object-fit: cover;" />
            @endif
        </div>

        <ul>
            <li><button class="btn btn-primary">Kaydet</button></li>
            <li><a href="{{ route('musteriler.index') }}" class="btn btn-secondary mt-3">← Geri Dön</a></li>
        </ul>
        
    </form>

</div>
@endsection
