<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Tabel Statistik Pegawai untuk User -->
                    <div class="mt-6">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-2 px-4 border-b">Total Pegawai Aktif</th>
                                    <th class="py-2 px-4 border-b">Total Pegawai Laki-laki</th>
                                    <th class="py-2 px-4 border-b">Total Pegawai Perempuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="py-2 px-4 border-b">{{ $totalActive }}</td>
                                    <td class="py-2 px-4 border-b">{{ $totalMale }}</td>
                                    <td class="py-2 px-4 border-b">{{ $totalFemale }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Tabel Statistik Pegawai -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
