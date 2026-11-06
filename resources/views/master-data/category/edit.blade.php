<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Ubah Kategori</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}"
                            class="mt-1 block w-full rounded-md border-gray-300">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300">{{ old('description', $category->description) }}</textarea>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
                        <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700">Batal</a>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>