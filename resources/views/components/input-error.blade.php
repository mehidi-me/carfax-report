@props(['messages'])

@if ($messages)
    <ul style="margin: 10px;font-size: 12px" {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
