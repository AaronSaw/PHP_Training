@extends('template')
@section('title')
    student
@endsection

@section('content')
    <div class="container">
        <div class="row  justify-content-center  ">
            <div class="col-12">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <div class=" d-flex  justify-content-between mb-3">
                    <a href="{{ route('student.create') }}" class=" btn btn-warning shadow">Create Student</a>
                    <a href="{{ route('welcome') }}" class=" btn btn-success shadow">welcome</a>
                </div>
                {{-- search function --}}
                <div class="col-11">
                    <form action="{{ route('student.index') }}" method="get">
                        <div class="d-flex  mb-3">
                            <input type="text" class="form-control " value="{{ request('name') }}"
                                placeholder="Search name" name="name">
                            <input type="number" class="form-control ml-2 " value="{{ request('age') }}"
                                placeholder="Search age" name="age">
                            <input type="text" class="form-control " value="{{ request('major') }}"
                                placeholder="Search major" name="major">
                            <input type="text" class="form-control " value="{{ request('sdate') }}"
                                placeholder="Start date" onfocus="(this.type='date')" name="sdate">
                            <input type="text" class="form-control " value="{{ request('edate') }}"
                                placeholder="End date" onfocus="(this.type='date')" name="edate">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                            <a href="{{ route('student.index') }}" class="btn btn-outline-danger" type=""> cancel</a>
                        </div>
                    </form>
                </div>

                <div class="card border-0">
                    <div class="card-body">
                        <div class=" d-flex justify-content-between align-items-center">
                            <a href="{{ route('student.export') }}" class=" btn btn-sm btn-primary">export</a>
                            <div class="">
                                <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data"
                                    class=" ">
                                    @csrf
                                    <div class=" d-flex align-items-center">
                                        <input type="file" class="form-control form-control-sm" name="student_file"
                                            accept="" required>
                                        <button class="btn btn-primary m-1 btn-sm ">upload</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <table class="table border-0">
                            <thead>
                                <th>#</th>
                                <th>Student</th>
                                <th>Age</th>
                                <th>Major</th>
                                <th>Action</th>
                                <th>Created</th>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($students as $student)
                                    <tr>
                                       <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td> {{ $student->age }}</td>
                                        <td>{{ $student->major }}</td>
                                        <td class="">
                                            <a href="{{  route('student.edit',$student->id ) }}"
                                                class=" btn btn-sm btn-outline-success">edit</a>
                                            <form action="{{ route('student.destroy',$student->id) }}"
                                                class=" d-inline-block" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class=" btn  btn-sm btn-outline-danger">del</button>
                                            </form>
                                        </td>
                                        <td>{{ $student->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-danger">
                                            <h1>Empty data,Please search again!</h1>
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>

                        </table>
                        <div class="">
                            {{ $students->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


