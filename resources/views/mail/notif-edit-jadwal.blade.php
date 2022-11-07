@component('mail::message')
Jadwal Sedang diproses.

Mohon tunggu notifikasi selanjutnya.

Untuk melihat jadwal lebih lanjut kunjungi Website
E-Schedule, atau bisa langsung dengan klik tombol di bawah.

@component('mail::button', ['url' => ''])
Klik di sini
@endcomponent

Hormat Kami,<br>
Admin {{ config('app.name') }}
@endcomponent