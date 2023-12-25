<x-app-layout>
    <x-slot name="title">Homepage</x-slot>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-5 border py-3 px-4 rounded">
                <form action="{{ route('note.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Note title">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example" id="category"
                            name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content" style="resize:none"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah Notes</button>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
