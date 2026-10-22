@php
    $value = (int) ($value ?? 0);
    $max = max(1, (int) ($max ?? $value));
    $tone = $tone ?? 'violet';
    $percent = $value > 0
        ? (int) min(100, max(12, (int) round(($value / $max) * 100)))
        : 0;

    $toneGradients = [
        'violet' => 'linear-gradient(90deg, #7c3aed 0%, #6366f1 100%)',
        'pink' => 'linear-gradient(90deg, #db2777 0%, #f472b6 100%)',
        'emerald' => 'linear-gradient(90deg, #059669 0%, #34d399 100%)',
        'indigo' => 'linear-gradient(90deg, #4f46e5 0%, #818cf8 100%)',
        'slate' => 'linear-gradient(90deg, #475569 0%, #94a3b8 100%)',
    ];
    $gradient = $toneGradients[$tone] ?? $toneGradients['violet'];
@endphp

@if($value > 0)
    <div
        class="stats-meter"
        role="img"
        aria-label="Oran {{ $percent }} yüzde"
    >
        <div class="stats-meter__track" style="height:10px;border-radius:9999px;background:#e2e8f0;overflow:hidden;">
            <div
                class="stats-meter__fill"
                style="display:block;height:10px;width:{{ $percent }}%;border-radius:9999px;background:{{ $gradient }};"
            ></div>
        </div>
    </div>
@endif
