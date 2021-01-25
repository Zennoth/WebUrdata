@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col text-left"><b>My Events</b></h1>
        </div>
        <div class="row">
            <div class="col-md-3" style="margin-left: 87%;">
                <a href="{{ route('lecturer.event.create') }}" class="btn btn-primary" role="button"
                    aria-pressed="true">Add Event</a>
            </div>
        </div>

        <div class="row" style="margin-top: 10px; width:60%; float:left; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Event Name</th>
                        <th scope="col">Country</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><a href="@auth{{ route('lecturer.event.show', $event) }}@endauth">{{ $event->event }}</td>
                            <td>{{ $event->country }}</td>                            
                            <td>{{ $event->city }}</td>
                            <td>{{ $event->event_date }}</td>

                            @if ($event->is_group == 0)
                                @if ($event->status == 0)
                                    <td>Pending</td>
                                @elseif($event->status == 1)
                                    <td>Approved</td>
                                @elseif($event->status == 2)
                                    <td>Rejected</td>
                                @else
                                    <td>Need Revision</td>
                                @endif
                            @else
                                <td>
                                    @if ($event->pivot->is_approved == 0)
                                        Pending
                                    @elseif ($event->pivot->is_approved == 1)
                                        Approved
                                    @elseif ($event->pivot->is_approved == 2)
                                        Rejected
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($pages == 'index')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-event">
                    <label>Event :</label>
                    <input type="text" class="form-control" name="event" readonly>
                </div>
                <div class="form-event">
                    <label>Date :</label>
                    <input type="text" class="form-control" name="date" readonly>
                </div>
                <div class="form-event">
                    <label>Duration :</label>
                    <input type="text" class="form-control" name="duration" readonly>
                </div>
                <div class="form-event">
                    <label>Country :</label>
                    <input type="text" class="form-control" name="country" readonly>
                </div>
                <div class="form-event">
                    <label>Location :</label>
                    <input type="text" class="form-control" name="city" readonly>
                </div>
                <div class="form-event">
                    <label>Orginizer :</label>
                    <input type="text" class="form-control" name="organizer" readonly>
                </div>
            </div>
        @elseif($pages == 'showit')
            <div
                style="width: 32%; float:left; margin-left: 90px; margin-top: 10px; padding:20px; background:rgba(255, 255, 255, 0.8); height: 450px; overflow-y: scroll;">
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Event :</label>
                    <input type="text" class="form-control" name="event" value="{{ $return->event }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Date :</label>
                    <input type="text" class="form-control" name="date" value="{{ $return->event_date }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Duration :</label>
                    <input type="text" class="form-control" name="duration" value="{{ $return->duration }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Country :</label>
                    <input type="text" class="form-control" name="country" value="{{ $return->country }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Location :</label>
                    <input type="text" class="form-control" name="city" value="{{ $return->city }}" readonly>
                </div>
                <div class="form-event" style="margin-bottom: 10px;">
                    <label>Organizer :</label>
                    <input type="text" class="form-control" name="orginizer" value="{{ $return->organizer }}" readonly>
                </div>
                @if ($event->is_group == 0)
                    <img style="width: 100%;" src="/images/event/individual/{{ $return->file }}" alt="">
                    <br><br>
                    <form action="{{ route('lecturer.event.edit', $return) }}" method="GET">
                        @csrf
                        <button class="btn btn-normal" type="submit" style="float:left; margin-right: 10px">Edit</button>
                    </form>
                    <form action="{{ route('lecturer.event.destroy', $return) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @else
                    <img style="width: 100%;" src="/images/event/group/{{ $return->file }}" alt="">
                    <br><br>
                    <form action="{{ route('lecturer.event.remove', $return) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                @endif
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
