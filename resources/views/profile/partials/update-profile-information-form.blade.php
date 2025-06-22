<section class="my-5">
    <h2 class="h5">Profil Bilgisi</h2>
    <p class="text-muted">Hesap bilgilerinizi ve e-posta adresinizi güncelleyin.</p>

    <!-- E-posta doğrulama tekrar gönderme formu -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profil güncelleme formu -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Ad Soyad</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-posta</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2">
                    E-posta adresiniz doğrulanmamış.
                    <button form="send-verification" class="btn btn-sm btn-outline-secondary ms-2">Yeniden gönder</button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="text-success mt-2">
                        Yeni doğrulama bağlantısı e-posta adresinize gönderildi.
                    </div>
                @endif
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success mt-3" role="alert">
                Profil bilgileri başarıyla güncellendi.
            </div>
        @endif
    </form>
</section>
