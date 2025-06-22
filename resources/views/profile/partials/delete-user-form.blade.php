<section class="my-5">
    <h2 class="h5">Hesabı Sil</h2>

    <p class="text-muted">
        Hesabınız silindiğinde tüm verileriniz kalıcı olarak silinir. Lütfen önemli bilgileri önceden yedekleyin.
    </p>

    <!-- Trigger Modal -->
    <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        Hesabı Sil
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Hesabı Sil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Hesabınız kalıcı olarak silinecek. Lütfen onaylamak için şifrenizi girin.
                        </p>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                        <button type="submit" class="btn btn-danger">Hesabı Sil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
