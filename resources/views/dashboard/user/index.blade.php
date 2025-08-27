@extends('layouts.app')

@section('content')
<div class="mx-auto" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">

    <!-- Judul -->
    <h1
        class="text-xl py-5 font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent relative inline-block">
        Dashboard <span class="text-gray-400">→</span> Manajemen User
    </h1>

    <!-- Table Section -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div x-data="{ loadingTable: true }" x-init="setTimeout(() => loadingTable = false, 2000)">

            <!-- Header Action -->
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                <!-- Search Box -->
                <div>
                    <template x-if="loadingTable">
                        <div class="w-48 h-8 bg-gray-200 rounded animate-pulse"></div>
                    </template>
                    <template x-if="!loadingTable">
                        <input type="text" placeholder="Cari nama..."
                            class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-gey-300">
                    </template>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-center">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium">No</th>
                            <th class="px-6 py-3 text-sm font-medium">Nama</th>
                            <th class="px-6 py-3 text-sm font-medium">Email</th>
                            <th class="px-6 py-3 text-sm font-medium">Role</th>
                            
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-center text-sm">
                        @foreach ( $users as $user )
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold bg-blue-500 text-white rounded-full">
                                    Admin
                                </span>
                            </td>
                           
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
