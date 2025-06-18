<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Role & Permission Manager
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto space-y-8">
            @foreach ($roles as $role)
                <div class="bg-white dark:bg-gray-800 shadow p-6 rounded">
                    <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">{{ ucfirst($role->name) }}</h3>

                    <form method="POST" action="{{ route('admin.roles.updatePermissions', $role) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($permissions as $permission)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="permissions[]"
                                           value="{{ $permission->name }}"
                                           {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">
                                Update Permissions
                            </button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>