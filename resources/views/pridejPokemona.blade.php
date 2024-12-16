<x-app-layout>
    <section>
        @if(Session::has("message"))
            <p>{{ Session::get("message") }}</p>
        @endif
        <form
            action="{{ route('admin.pridatPokemona') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div>
                <x-label for="pokemon-name" value="Název pokémona" />
                <x-input name="pokemon-name" id="pokemon-name" required />
                <x-input-error for="pokemon-name" />
            </div>
            <div>
                <x-label for="pokemon-typ" value="Typ pokémona" />
                <select name="pokemon-typ" id="pokemon-typ">
                    @foreach ($typy as $typ)
                        <option value="{{ $typ->id }}">{{ $typ->nazev }}</option>
                    @endforeach
                </select>
                <x-input-error for="pokemon-typ" />
            </div>
            <div>
                <x-label for="pokemon-image" value="Obrázek pokémona" />
                <x-input name="pokemon-image" type="file" id="pokemon-image" required />
                <x-input-error for="pokemon-image" />
            </div>
            <div class="mt-2">
                <x-button>
                    Přidej pokémona
                </x-button>
            </div>
        </form>
    </section>
</x-app-layout>
