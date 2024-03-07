<x-admin-layout>
    <div class="card container">
        <div class="card-heade">
            <div class="d-flex justify-content-between">
                <h2>Product List</h2>
                <a href="" class="btn btn-info">Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="" placeholder="" />
                </div>
                @error('category_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select class="form-select form-select-lg" name="status" id="">
                       @foreach (App\Enums\Status::cases() as $status)
                        <option value="{{ $status->value }}">
                        {{ $status->name }}
                        </option>
                       @endforeach
                    </select>
                </div>
                @error('status')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>


            </form>
        </div>
    </div>
</x-admin-layout>
