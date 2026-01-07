<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700">Name *</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                   class="w-full border px-3 py-2 rounded" required>
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Email *</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                   class="w-full border px-3 py-2 rounded" required>
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Role</label>
                            <select name="role_id" class="w-full border px-3 py-2 rounded">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $role->name == $user->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('users.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                            <button type="submit"
                               class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
