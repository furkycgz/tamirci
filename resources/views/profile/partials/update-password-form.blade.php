<section class="my-5">
    <h2 class="h5">Şifreyi Güncelle</h2>
    <p class="text-muted">Hesabınızı korumak için uzun ve rastgele bir şifre kullanın.</p>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label">Mevcut Şifre</label>
            <input type="password" name="current_password" id="current_password" class="form-control" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Yeni Şifre</label>
            <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Yeni Şifre (Tekrar)</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>

        @if (session('status') === 'password-updated')
            <div class="alert alert-success mt-3" role="alert">
                Şifre başarıyla güncellendi.
            </div>
        @endif
    </form>
</section>
