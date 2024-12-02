<x-guest-layout>
        <main>
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
        </main>
</x-guest-layout>
