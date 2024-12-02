<x-guest-layout>
        <main id="detail">
            <div class="card no-blur">
                <h2>{{ $pokemon->nazev }}</h2>
                <img
                    src="{{ asset('images/' . $pokemon->url_obrazku) }}"
                    alt="{{ $pokemon->nazev }}"
                >
                <div class="types">
                    <a href="{{ route('typy', ["typ" => $pokemon->typ->id ]) }}">
                    <span style="background: {{ $pokemon->typ->barva }}">
                        {{ $pokemon->typ->nazev }}
                    </span>
                    </a>
                </div>
            </div>
        </main>
    </x-guest-layout>
