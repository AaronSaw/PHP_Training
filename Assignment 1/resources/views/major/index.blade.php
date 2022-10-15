@extends('template')
@section('title')
    Major
@endsection

@section('content')
    <div class="container">
        <div class="row  justify-content-center  ">
            <div class="col-7">
                <div class=" d-flex  justify-content-between mb-3">
                    <a href="{{ route('major.create') }}" class=" btn btn-warning shadow">Create Major</a>
                    <a href="{{ route('welcome') }}" class=" btn btn-success shadow">welcome</a>
                </div>
                <div class="card border-0">
                    <div class="card-body">
                        <table class="table border-0">
                            <thead>
                                <th>#</th>
                                <th>Major</th>
                                <th>Action</th>
                                <th>Created</th>
                            </thead>
                            <tbody>

                                @foreach ($majors as $major)
                                    <tr>
                                        <td>{{ $major->id }}</td>
                                        <td>{{ $major->major }}</td>
                                        <td class="">
                                            <a href="{{ route('major.edit', $major->id) }}"
                                                class=" btn btn-sm btn-outline-success">edit</a>
                                            <form action="{{ route('major.destroy', $major->id) }}" class=" d-inline-block"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class=" btn  btn-sm btn-outline-danger">del</button>
                                            </form>
                                        </td>
                                        <td>{{ $major->created_at->format('d-M-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
