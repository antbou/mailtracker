<tbody class="text-sm divide-y divide-gray-100">
    <tr>
        <td class="p-2 whitespace-nowrap">
            <div class="flex items-center">
                <div class="font-medium text-gray-800">{{ $target->id }}</div>
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="flex items-center">
                <div class="font-medium text-gray-800">{{ $target->ip }}</div>
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <?php $agent->setUserAgent($target->user_agent); ?>
            <div class="text-left">{{ $agent->browser() }} / {{ $agent->device() }} / {{ $agent->platform() }}
            </div>
        </td>
        <td class="p-2 whitespace-nowrap">
            <div class="text-left">{{ Str::words($target->user_agent, 6, $end = ' ...') }}</div>
        </td>
    </tr>
</tbody>
