<x-app-layout>

    <section class="bg-white w-full">
        @if($errors->any())
            <ul>
            @foreach ($erros as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form action="{{ route('pridaniTypu') }}" method="POST">
            @csrf
            <div style="padding:10px">
                <label for="nazev">Název:</label>
                <input type="text" name="typ-nazev" id="nazev" placeholder="Název typu">
            </div>
            <div style="padding:10px">
                <label for="barva">Barva:</label>
                <input type="color" name="typ-color" id="barva">
            </div>
            <div style="padding:10px">
                {{--
                <input type="submit" name="odesliBarvu">
                --}}
                <x-button>Odešli</x-button>
            </div>
        </form>
    </section>

    <section class="bg-white flex justify-center w-full">
        <table>
            <tr>
                <th>Název</th>
                <th>Barva</th>
                <th>Počet pokémonů</th>
                <th> </th>
            </tr>
            @foreach ($typy as $typ)
            <tr>
                <td>{{ $typ->nazev }}</td>
                <td
                    style="background:{{ $typ->barva }}">
                    {{ $typ->barva }}
                </td>
                <td>{{ count($typ->pokemon) }}</td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </section>
</x-app-layout>
