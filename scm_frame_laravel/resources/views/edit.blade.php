@extends("master")
@section("title") Blog Update @stop
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <form action="{{ route('blog.update',$blog->id) }}" method="post" class=" bg-white  shadow-lg p-3 rounded">
                    <h1 class=" text-center text-primary">Update Blog</h1>
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Title</label>
                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title',$blog->title) }}" name="title">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Description</label>
                        <textarea type="text" class="form-control form-control-lg @error('description') is-invalid @enderror" rows="7" name="description">{{ old('description',$blog->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn  rounded-pill py-1 px-4 btn-primary">Update</button>
                        <button class="btn btn-outline-primary px-4 py-1 rounded-pill" type="reset">cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
