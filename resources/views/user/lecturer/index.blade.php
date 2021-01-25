@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-left"><b>Lecturer List</b></h1>
        </div>
        <div class="row offset-md11">
            <div>
            </div>
            <div class="col-md-10 offset-md-9">
                <a href="{{ route('admin.lecturer.create') }}" class="btn btn-primary" role="button"
                    aria-pressed="true">Add Lecturer</a>
            </div>
        </div>

        <div class="row"
            style="margin-top: 10px; width:60%; float:left; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Title</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lecturers as $lecturer)
                        <tr>
                            <td>{{ $lecturer->lecturer_id }}</td>
                            <td><a href="{{ route('admin.lecturer.show', $lecturer) }}">{{ $lecturer->lecturer_name }}</a></td>
                            <td>{{ $lecturer->department->department_name }}</td>
                            <td>{{ $lecturer->title->title_name }}</td>
                            <?php
                            if ($lecturer->lecturer_gender == 0) {
                                $gender = 'Male';
                            } else {
                                $gender = 'Female';
                            }
                            ?>
                            <td>{{ $gender }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($pages == 'index')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-group">
                    <label>NIP:</label>
                    <input type="text" class="form-control" name="nip" readonly>
                </div>
                <div class="form-group">
                    <label>NIDN:</label>
                    <input type="text" class="form-control" name="nidn" readonly>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="lecturer_name" readonly>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="description" readonly>
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="text" class="form-control" name="lecturer_gender" readonly>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="lecturer_phone" readonly>
                </div>
                <div class="form-group">
                    <label>Line Account:</label>
                    <input type="text" class="form-control" name="lecturer_line_account" readonly>
                </div>
                <div class="form-group">
                    <label>Admin:</label>
                    <input type="number" class="form-control" name="is_admin" readonly>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="number" class="form-control" name="department_id" readonly>
                </div>
                <div class="form-group">
                    <label>Title:</label>
                    <input type="year" class="form-control" name="title_id" readonly>
                </div>
                <div class="form-group">
                    <label>Jaka:</label>
                    <input type="year" class="form-control" name="jaka_id" readonly>
                </div>
            </div>
        @elseif($pages == 'showit')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-group">
                    <label>NIP:</label>
                    <input type="text" class="form-control" name="email" value="{{ $return->nip }}" readonly>
                </div>
                <div class="form-group">
                    <label>NIDN:</label>
                    <input type="text" class="form-control" name="email" value="{{ $return->nidn }}" readonly>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="lecturer_name" value="{{ $return->lecturer_name }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="description" value="{{ $return->description }}" readonly>
                </div>
                <?php
                if ($return->lecturer_gender == 0) {
                    $gender = 'Male';
                } else {
                    $gender = 'Female';
                }
                ?>
                <div class="form-group">
                    <label>Gender:</label>
                    <input type="text" class="form-control" name="lecturer_gender" value="{{ $gender }}" readonly>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" name="lecturer_phone" value="{{ $return->lecturer_phone }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Line Account:</label>
                    <input type="text" class="form-control" name="lecturer_line_account"
                        value="{{ $return->lecturer_line_account }}" readonly>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <input type="text" class="form-control" name="department_id" value="{{ $return->department->department_name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title_id" value="{{ $return->title->title_name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Jaka:</label>
                    <input type="text" class="form-control" name="jaka_id" value="{{ $return->jaka->jaka_name }}" readonly>
                </div>
                <img style="height: 200px" src="/images/profile_picture/lecturer/{{ $return->lecturer_photo }}" alt="">
                <br><br>
                <form action="{{ route('admin.lecturer.edit', $return) }}" method="GET">
                    @csrf
                    <button class="btn btn-normal" type="submit" style="float: left; margin-right: 10px">Edit</button>
                </form>
                <form action="{{ route('admin.lecturer.destroy', $return) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endif
    </div>
    <script>
        function myFunction() {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
    </script>
@endsection
