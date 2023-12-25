<x-app-layout>
    <x-slot name="title">Homepage</x-slot>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="{{ route('note.create') }}" class="btn btn-primary mb-3">Tambah Notes</a>

                <div class="input-group mb-3">
                    <form action="{{ route('home') }}" method="get" class="w-100">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control border" placeholder="Cari note" name="query"
                                aria-label="Cari user" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="mb-2">
                    @if (session()->has('success'))
                        <x-success-alert statusText="{{ session()->get('success') }}"></x-success-alert>
                    @endif
                    @if (session()->has('edit'))
                        <x-primary-alert statusText="{{ session()->get('edit') }}"></x-primary-alert>
                    @endif
                    @if (session()->has('delete'))
                        <x-danger-alert statusText="{{ session()->get('delete') }}"></x-danger-alert>
                    @endif
                </div>

            </div>

            <div class="row my-2 gap-2 justify-content-center">
                @foreach ($notes as $note)
                    <div class="card col-5 p-0 ">
                        <img src="{{ asset('storage/' . $note->image) }}" class="card-img-top object-fit-cover"
                            alt="photo" style="height: 250px">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title m-0">{{ $note->title }}</h5>
                                <span class="badge text-bg-primary">{{ $note->category->name }}</span>
                            </div>
                            <p class="card-text">{{ $note->content }}</p>

                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('note.edit', $note->id) }}" class="w-100 btn btn-primary">Edit</a>
                                <form action="{{ route('note.destroy', $note->id) }}" method="post" class="w-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-100 btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app-layout>
