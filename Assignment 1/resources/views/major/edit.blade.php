@extends('template')
@section('title')
    Major
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class=" text-center text-secondary mb-4">Create Major</h2>
                        <form action="{{ route('major.update', $major->id) }}" method="post">
                            @csrf
                            @method('put')
                            <label for="" class=" mb-2 h4  text-secondary">Major Name</label>
                            <input type="text" class=" form-control  @error('major')   is-invalid @enderror"
                                value="{{ old('major', $major->major) }}" name="major">
                            @error('major')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary mt-2 rounded float-end">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
