<x-admin-layout>
    <x-slot name="title">Category</x-slot>

    <div>
        <h5 class="fw-semibold">Daftar Kategori</h5>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary my-3">Tambah Kategori</a>

        <form action="{{ route('admin.category.index') }}" method="get">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control border" placeholder="Cari User" name="query"
                    aria-label="Cari user" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="d-flex justify-content-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex gap-3 justify-content-center">
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="post"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
