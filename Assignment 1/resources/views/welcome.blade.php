@extends('template')
@section('title')
    Welcome Page
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-4 card shadow">
                <div class="card-body">
                    <h1 class="text-center mb-3 text-primary">Welcome</h1>
                    <div class=" card-img">
                        <img src="https://img.freepik.com/premium-photo/young-beautiful-asian-college-student-girls-holding-book_102814-1426.jpg?w=2000"
                            alt="" class="w-100 rounded-circle">
                    </div>
                    <div class=" d-flex justify-content-between mt-3">
                        <a href="{{ route('major.index') }}" class=" btn btn-primary px-4 py-1">Major</a>
                        <a href="{{ route('student.index') }}" class=" btn btn-primary py-1 px-4">Student</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
