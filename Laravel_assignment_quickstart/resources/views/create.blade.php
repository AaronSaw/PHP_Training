@extends("master")
@section("tittle") Blog Create @endsection
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <form action="{{ route('blog.store') }}" method="post" class=" bg-white  shadow-lg p-3 rounded">
                    <h1 class=" text-center text-primary">Create Blog</h1>
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Title</label>
                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Description</label>
                        <textarea type="text" class="form-control form-control-lg @error('description') is-invalid @enderror" rows="7" name="description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn  py-1 px-4  rounded-pill btn-primary">Create</button>
                        <a href="{{ $_SERVER['PHP_SELF']; }}" class="btn  py-1 px-4  rounded-pill btn-outline-primary" >cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
