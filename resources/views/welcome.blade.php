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
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="font-medium text-gray-800">Alex Shatov</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">alexshatov@gmail.com</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">21.12.2021</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">None</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="font-medium text-gray-800">Business test</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">dsadasd@gmail.com</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">21.12.2021</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">21.12.2021</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="font-medium text-gray-800">Mail testing</div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">mailtracker@gmail.com</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">30.12.2021</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">None</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
