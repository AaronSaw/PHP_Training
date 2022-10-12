@extends('master')
@section("title")
Blog Create
 @endsection
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('blog.create') }}" class=" mb-3 btn btn-primary ">Create Blog</a>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table bg-white shadow border">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Post</th>
                         <th>action</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($blogs as $blog)
                        <tr>
                            <td class=" border text-center">{{ $blog->id }}</td>
                            <td class="border">
                                <span class="fw-bold">{{ Str::words($blog->title,7) }}</span>
                                <br>
                               <span > {{ Str::words($blog->description,6) }}</span>
                            </td>
                            <td class="border text-center">
                                <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                <form action="{{ route('blog.destroy',$blog->id) }}"  method="post" class="d-inline-block" >
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger">Del</button>
                                </form>
                            </td>
                            <td class="border">{{ $blog->created_at->format("d/m/y ") }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


