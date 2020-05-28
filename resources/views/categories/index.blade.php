@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="modal" tabindex="-1" role="dialog" id="editCategoryModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="" placeholder="Category Name"
                                       required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3>Categories</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    {{ $category->name }}

                                    <div class="button-group d-flex">
                                        <button type="button" class="btn btn-sm btn-primary mr-1 edit-category"
                                                data-toggle="modal" data-target="#editCategoryModal"
                                                data-id="{{ $category->id }}" data-name="{{ $category->name }}">Edit
                                        </button>

                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                @if ($category->children)
                                    <ul class="list-group mt-2">
                                        @foreach ($category->children as $child)
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    {{ $child->name }}

                                                    <div class="button-group d-flex">
                                                        <button type="button"
                                                                class="btn btn-sm btn-primary mr-1 edit-category"
                                                                data-toggle="modal" data-target="#editCategoryModal"
                                                                data-id="{{ $child->id }}"
                                                                data-name="{{ $child->name }}">Edit
                                                        </button>

                                                        <form action="{{ route('category.destroy', $child->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Create Category</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <select class="form-control" name="parent_id">
                                <option value="">Select Parent Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                   placeholder="Category Name" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.edit-category').on('click', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const url = "{{ url('category') }}/" + id;

            $('#editCategoryModal form').attr('action', url);
            $('#editCategoryModal form input[name="name"]').val(name);
        });
    </script>
@endsection
