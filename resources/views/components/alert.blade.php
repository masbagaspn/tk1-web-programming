@php
    $successs = $type === "success";
@endphp

<div @class([
    'alert animate-alert',
    'alert-success' => $successs,
])>
    {{ $text }}
</div>