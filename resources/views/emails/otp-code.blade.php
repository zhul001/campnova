@component('mail::message')
    # Verifikasi Kode OTP

    Gunakan kode berikut untuk mengatur ulang password Anda:

    ## **{{ $otp }}**

    Kode ini akan kedaluwarsa dalam 2 menit.

    Jika Anda tidak meminta perubahan ini, abaikan email ini.

    Terima kasih,<br>
    {{ config('app.name') }}
@endcomponent
