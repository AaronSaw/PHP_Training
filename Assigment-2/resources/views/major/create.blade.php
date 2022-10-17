@extends('template')
@section('title')
    Major
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class=" text-center text-secondary mb-4">Create Major</h2>
                        <form action="{{ route('major.store') }}" method="post">
                            @csrf
                            <label for="" class=" mb-2 h4  text-secondary">Major Name</label>
                            <input type="text" class=" form-control  @error('major')   is-invalid @enderror"
                                value="{{ old('major') }}" name="major">
                            @error('major')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class=" d-flex justify-content-between mt-3">
                                <button class=" btn btn-outline-info px-3 btn-sm py-1" type="reset">cancel</button>
                                <button class="btn btn-primary btn-sm px-3 rounded ">create</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
