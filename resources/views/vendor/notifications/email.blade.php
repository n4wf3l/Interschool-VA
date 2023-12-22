{{-- resources/views/emails/verification.blade.php --}}

@component('mail::message')
{{-- Subject --}}
# Bevestiging emailadres



{{-- Intro Lines --}}
Klik op de knop hieronder om uw emailadres te bevestigen.

{{-- Action Button --}}
@isset($actionText)
@php
$color = $level === 'success' || $level === 'error' ? $level : 'primary';
@endphp
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
Bedankt,
Ehb Voetbal App.

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(

"Als u problemen ondervindt bij het klikken op de knop \":actionText\", kopieer en plak dan de URL hieronder\n".
'in uw webbrowser:',
[
'actionText' => $actionText,
]
) [{{ $displayableActionUrl }}]({{ $actionUrl }})
@endslot
@endisset
@endcomponent