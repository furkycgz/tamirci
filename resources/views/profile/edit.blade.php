@extends('layouts.app') {{-- Bootstrap kullanan bir layout dosyan varsa bu şekilde genişlet --}}

@section('content')
<div class="container mt-5">

    <h2 class="fw-semibold text-dark mb-4">
        Profil
    </h2>

    {{-- Profil Bilgilerini Güncelle --}}
    <div class="card mb-4">
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- Şifreyi Güncelle --}}
    <div class="card mb-4">
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- Hesabı Sil --}}
    <div class="card mb-4">
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</div>
@endsection
