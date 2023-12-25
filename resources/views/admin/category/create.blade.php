<x-admin-layout>
    <x-slot name="title">Category Create</x-slot>

    <div>
        <h5 class="fw-semibold">Tambah Kategori</h5>
        <p>Silahkan admin untuk menambahkan kategori yang anda inginkan</p>
        <form method="post" action="{{ route('admin.category.store') }}" class="my-4">
            @csrf
            <div class="form-floating mb-2">
                <input type="text" class="form-control border border-secondary w-50 rounded" id="name"
                    placeholder="name" name="name" value="{{ old('name') }}">
                <label for="name">Name</label>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <button type="submit" class="btn btn-primary mt-2 w-50">Tambah Kategori</button>
        </form>
    </div>
</x-admin-layout>
