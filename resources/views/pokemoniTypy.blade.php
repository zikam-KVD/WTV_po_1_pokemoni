<x-guest-layout>
        <main>
            @if(count($pokemons) > 0)
                @foreach ($pokemons as $poke)
                <div class="card">
                    <img
                        src="{{ asset('images/' . $poke->url_obrazku) }}"
                        alt="{{ $poke->nazev }}"
                    >
                    <a href="{{ route("detail", ["id" => $poke->id]) }}">
                        <i class="fa-brands fa-searchengin"></i>
                    </a>
                </div>
                @endforeach
            @else
                <p>Nebyly nalezeny pokemoni typu {{ $typ }}.</p>
            @endif
        </main>
</x-guest-layout>
