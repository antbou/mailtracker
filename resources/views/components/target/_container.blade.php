<div class="overflow-x-auto">
    <table class="table-auto w-full">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">ID</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">IP</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">browser / device / platform</div>
                </th>
                <th class="p-2 whitespace-nowrap">
                    <div class="font-semibold text-left">User Agent</div>
                </th>
            </tr>
        </thead>

        @foreach ($targets as $target)
            @include('components.target._target')
        @endforeach

    </table>
</div>
