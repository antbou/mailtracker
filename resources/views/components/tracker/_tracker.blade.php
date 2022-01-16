<tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">

    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Objet</span>
        {{ $tracker->title }}
    </td>
    <td
        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Adresse
            email</span>
        {{ $tracker->email }}
    </td>
    <td
        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Créer A</span>
        {{ $tracker->created_at }}
    </td>
    <td
        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nombre
            d'ouverture</span>
        {{ count($tracker->targets()->get()) }}
    </td>
    <td
        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
        @if ($tracker->state->name === 'OPN')

        @endif
        <span
            class="rounded {{ $tracker->state->slug === 'OPN' ? 'bg-green-400' : 'bg-yellow-400' }} py-1 px-3 text-xs font-bold">{{ $tracker->state->name }}</span>
    </td>
    <td
        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
        <a href="{{ route('tracker.show', ['tracker' => $tracker]) }}"
            class="text-blue-400 hover:text-blue-600 underline">Détails</a>
        <a href="{{ route('tracker.edit', ['tracker' => $tracker]) }}" class="text-blue-400 hover:text-blue-600 underline pl-3">Edit</a>
        <form class="inline" action="{{route('tracker.destroy',['tracker' => $tracker])}}" method="post">
            @csrf
            @method('delete')
            <button title="Destroy">
                <a class="text-blue-400 hover:text-blue-600 underline pl-3">Remove</a>
            </button>
        </form>
    </td>
    <td
        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Link</span>
        <div x-data="{ input: '{{ route('tracking', $tracker) }}' }">
            <button class="text-blue-400 hover:text-blue-600 underline pl-3" type="button" @click="$clipboard(input)">
                Copy to Clipboard
            </button>
        </div>
    </td>
</tr>
