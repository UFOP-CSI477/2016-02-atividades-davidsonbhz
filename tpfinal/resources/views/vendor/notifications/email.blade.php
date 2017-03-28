@component('mail::message')

Olá!<br>
Uma redefinição de senha foi solicitada para sua conta.<br>
Clique no botão abaixo para alterar sua senha.

{{-- Action Button --}}
@if (isset($actionText))
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endif

<!-- Salutation -->
@if (! empty($salutation))
{{ $salutation }}
@else
Atenciosamente,<br>Rumo a universidade UFOP
@endif

<!-- Subcopy -->
@if (isset($actionText))
@component('mail::subcopy')
Se tiver problemas ao clicar no botão "{{ $actionText }}", copie e cole o URL abaixo
Em seu navegador da Web: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endif
@endcomponent
