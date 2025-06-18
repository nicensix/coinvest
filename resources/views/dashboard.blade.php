<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-900 p-6 rounded shadow">
            <h1 class="text-2xl font-bold mb-2">Welcome, {{ Auth::user()->name }} 👋</h1>
            <p>You are logged in as <strong>{{ Auth::user()->getRoleNames()->first() }}</strong>.</p>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">💰 Wallet</h2>
            <p>
                Balance: 
                <span class="text-green-600 font-bold">
                    ${{ number_format(Auth::user()->wallet->balance ?? 0, 2) }}
                </span>
            </p>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">📦 Recent Investments</h2>
            <ul class="list-disc pl-6">
                @forelse (Auth::user()->investments as $investment)
                    <li>
                        {{ ucfirst($investment->investment_type) }} - ₦{{ number_format($investment->amount, 2) }} ({{ $investment->status }})
                    </li>
                @empty
                    <li>No investments yet.</li>
                @endforelse
            </ul>
        </div>

    </div>
</div>
</x-app-layout>
