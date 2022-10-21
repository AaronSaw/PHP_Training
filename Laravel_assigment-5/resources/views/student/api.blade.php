@extends('template')
@section('title')
    API blade
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-11">
                <div class="card">
                    <div class="card-body bg-white p-0">
                        <div class=" m-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                create
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Student</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="createForm">
                                                <p id="error" class="tex-danger"></p>
                                                <input type="text" name="name" id="getname"
                                                    class="form-control mb-2">
                                                <input type="number" name="age" id="getage"
                                                    class="form-control mb-2">
                                                <select name="major_id" id="getmajor" class="form-select mb-3">
                                                    @foreach (\App\Models\Major::all() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->major }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="number" name="major" id="getage" --}}

                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-secondary">cancel</button>
                                                    <button type="submit" class="btn btn-primary">create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- edit form --}}
                            <!-- Modal -->

                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm">
                                            <input type="text" name="name" id="editname" class="form-control mb-2">
                                            <input type="number" name="age" id="editage" class="form-control mb-2">
                                            <input type="hidden" id="editId" name="updateId">
                                            <select name="major_id" id="editmajor" class="form-select mb-3">
                                                @foreach (\App\Models\Major::all() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->major }}</option>
                                                @endforeach
                                            </select>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary">cancel</button>
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                                                    aria-label="Close">update</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table  rounded  table-hover">
                            <thead class=" bg-warning text-danger">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Major_id</th>
                                    <th>Action</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody class="" id="tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function showList() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: 'http://127.0.0.1:8000/api/students',
                    success: function(response) {
                        $('#tbody').html('');
                        response.forEach(res => {
                            $('#tbody').append(`
            <tr>
                                    <td>${res.id}</td>
                                    <td> ${res.name}</td>
                                    <td>${res.age }</td>
                                    <td>${res.major_id}</td>
                                    <td class="">
                                        <button
                                            class=" btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#editModal" id="edit" data_id="${res.id}">edit</button>
                                            <button
                                            class=" btn btn-sm btn-outline-danger" id="delete" data_id="${res.id}">delete</button>

                                    </td>
                                    <td>${res.created_at}</td>
                                </tr>
            `);
                        });
                    },
                });
            }
            $('#createForm').submit(function(e) {
                e.preventDefault();
                let fd = $('#createForm').serialize();
                let formdata = new FormData(this);
                console.log(formdata.get('name'), formdata.get('age'), formdata.get('major'));
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: "http://127.0.0.1:8000/api/students",
                    dataType: 'json',
                    data: {
                        name: formdata.get('name'),
                        age: formdata.get('age'),
                        major_id: formdata.get('major_id'),
                        _token: _token
                    },
                    //data:fd,
                    success: function(response) {
                        showList();
                    },
                    error: function(response) {
                        alert(request.message);
                    }

                });
                $('input').val('');
            });
            $('table').on('click', '#delete', function(e) {
                e.preventDefault();
                let id = $(this).attr("data_id");
                console.log(id);
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/students/' + id,
                    method: 'delete',
                    success: function(response) {
                        showList();
                    }
                })
            });

            $('table').on('click', '#edit', function() {
                let id = $(this).attr("data_id");
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/students/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editname').val(response.name);
                        $('#editage').val(response.age);
                        $('#editmajor').val(response.major_id).change();
                        $('#editId').val(response.id);
                    }
                })
            });
            $('#editForm').submit(function(e) {
                e.preventDefault();
                let formdata = new FormData(this);
                let id = formdata.get('updateId');
                console.log(formdata.get('major_id'));
                $.ajax({
                    type: "put",
                    url: "http://127.0.0.1:8000/api/students/" + id,
                    data: {
                        name: formdata.get('name'),
                        age: formdata.get('age'),
                        major_id:formdata.get('major_id')
                    },
                    dataType: "json",
                    success: function(response) {
                        showList();
                    }
                });

            });

            showList();
        });
    </script>
@endpush
