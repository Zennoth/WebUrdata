@extends('layouts.layout')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Event</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('lecturer.event.update', $event)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="nama">Event:</label>
                        <input type="text" class="form-control" id="event" name="event" value="{{ $event->event }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Date:</label>
                        <input type="date" class="form-control" id="date" name="event_date" value="{{ $event->event_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="barcode">Duration:</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $event->duration }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Country:</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ $event->country }}" required>
                    </div>
                    <div class="form-group">
                        <label for="barcode">City:</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $event->city }}" required>
                    </div>
                    <div class="form-group">
                        <label for="barcode">Organizer:</label>
                        <input type="text" class="form-control" id="organizer" name="organizer" value="{{ $event->organizer }}">
                    </div>
                    <img style="height: 200px" src="/images/event/individual/{{ $event->file }}" alt="">
                    <div class="form-group">
                        <label for="barcode">Change Photo</label>
                        <br>
                        <input type="file" id="file" name="file">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
