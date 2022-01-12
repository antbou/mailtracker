@extends('layouts/layout')

@section('content')
<div class="flex flex-col justify-center h-full">
    <!-- Table -->
    <div class="w-full mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
        <header class="px-5 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Mail tracking</h2>
        </header>
        <div class="p-3">
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Content</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Email</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Develivred at</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Open at</div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-sm divide-y divide-gray-100">
                    @forelse($mails as $mail)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="font-medium text-gray-800">{{$mail->title}}</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{$mail->email}}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">{{$mail->created_at}}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">{{$mail->state->slug === 'OPN' ? $mail->created_at : 'None'}}</div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
