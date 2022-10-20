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
                        <h1 class=" text-center text-secondary">Student</h1>
                        <form action="{{ route('student.store') }}" method="POST" name="myform">
                            @csrf
                            <div class=" form-group mb-2">
                                <label for="" class=" mb-2 text-secondary h5">Name</label>
                                <input type="text" class="   form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class=" form-group mb-2">
                                <label for="" class=" mb-2 text-secondary h5">age</label>
                                <input type="number" class=" form-control @error('age') is-invalid @enderror"
                                    name="age" value="{{ old('age') }}">
                                @error('age')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class=" form-group mb-2">
                                <label for="" class=" mb-2 text-secondary h5">Major</label>
                                <select type="text" class="  form-select @error('major') is-invalid @enderror"
                                    name="major">
                                    <option value="">Select Major</option>
                                    @foreach (\App\Models\Major::all() as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == old('major') ? 'selected' : ' ' }}>{{ $item->major }}</option>
                                    @endforeach

                                </select>
                                @error('major')
                                    <div class=" invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="text" class=" form-control" class="getname" name="name">
                            <div class=" d-flex justify-content-between mt-3">
                                <button class=" btn btn-outline-info px-4  btn-sm " type="reset">cancel</button>
                                <button class=" btn btn-primary btn-sm float-end px-4 " type="submit" class="submit">create</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
