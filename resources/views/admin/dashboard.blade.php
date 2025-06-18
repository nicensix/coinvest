<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Users</p>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $users->count() }}</h3>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Wallets</p>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($totalWalletBalance, 2) }}</h3>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Admins</p>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $adminCount }}</h3>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Joined Today</p>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $todaysUsers }}</h3>
                </div>
            </div>

            {{-- Users Table --}}
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">👥 Users</h3>
                <table class="w-full text-sm text-left border-t border-gray-200 dark:border-gray-600">
                    <thead class="text-gray-700 dark:text-gray-300 border-b">
                        <tr>
                            <th class="py-2">Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Wallet</th>
                            <th>Joined</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100">
                        @foreach ($users as $user)
                            <tr class="border-t border-gray-100 dark:border-gray-700">
                                <td class="py-2">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @php $role = $user->getRoleNames()->first(); @endphp
                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-semibold
                                        {{ $role === 'admin' ? 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100'
                                                             : 'bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100' }}">
                                        {{ $role ?? '—' }}
                                    </span>
                                </td>
                                <td>${{ number_format($user->wallet->balance ?? 0, 2) }}</td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="text-indigo-600 hover:underline text-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>