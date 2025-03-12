<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4>Admin Dashboard Page</h4>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('admin.logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Tabel Statistik Pegawai -->
                    <div class="mt-6">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-2 px-4 border-b">Total Pegawai Active</th>
                                    <th class="py-2 px-4 border-b">Pegawai Laki-laki</th>
                                    <th class="py-2 px-4 border-b">Pegawai Perempuan</th>
                                    <th class="py-2 px-4 border-b">Pegawai Permanen</th>
                                    <th class="py-2 px-4 border-b">Pegawai Kontrak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="py-2 px-4 border-b">{{ $totalActive }}</td>
                                    <td class="py-2 px-4 border-b">{{ $totalMale }}</td>
                                    <td class="py-2 px-4 border-b">{{ $totalFemale }}</td>
                                    <td class="py-2 px-4 border-b">{{ $totalPermanen }}</td>
                                    <td class="py-2 px-4 border-b">{{ $totalKontrak }}</td>
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
