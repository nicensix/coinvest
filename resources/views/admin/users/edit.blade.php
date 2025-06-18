<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Edit User – {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div>
                    <label class="block font-medium text-sm text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full mt-1 border-gray-300 rounded shadow-sm" />
                </div>

                {{-- Email --}}
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full mt-1 border-gray-300 rounded shadow-sm" />
                </div>

                {{-- Status --}}
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">Status</label>
                    <select name="status" class="w-full mt-1 border-gray-300 rounded shadow-sm">
                        <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="banned" {{ $user->status === 'banned' ? 'selected' : '' }}>Banned</option>
                    </select>
                </div>

                {{-- Role --}}
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700">Role</label>
                    <select name="role" class="w-full mt-1 border-gray-300 rounded shadow-sm">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Submit --}}
                <div class="mt-6">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>