@component('mail::message')
Jadwal Baru {{ $validatedData['kegiatan_id'] }}

{{ $validatedData['keterangan'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
