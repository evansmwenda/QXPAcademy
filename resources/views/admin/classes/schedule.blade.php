@extends('layouts.app')

@section('content')
<div class="row">
    @include('students.header')
</div>
{{-- content section --}}
<div class="row" style="background: #fff">
    <div class="row exam-top">
        <div class="live-overlay">

            <h2>Schedule Meeting</h2>
            <p>Create and Connect later</p>
        </div>
      </div>
      <div class="col-md-5 instant-meeting">
        @if(Session::has("flash_message_error")) 
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div> 
        @endif 

        @if(Session::has("flash_message_success")) 
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div> 
        @endif
        <form method="post" action="/admin/live-classes/schedule">{{ csrf_field() }}
            <div class="col-xs-12 form-group">
                <div class="form-group">
                    <label>Select Course</label>
                    <select class="form-control" name="course_id" required>
                        <option>Select Course</option>
                        @foreach($my_courses as $course)
                            <option value="{{ $course->course_id}}">{{ $course->course->title}}</option>
                        @endforeach
                    </select>
                </div> 
            </div>
            <div class="col-xs-12 form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" required>
            </div>

            <!-- <div class="col-xs-12 form-group">
                    <label for="endDate">Start/End Time</label>
                <input type="text" id="endDate"   />
            </div> -->

            <div class="col-xs-12 form-group">
                <label for="mydate">Start/End Time</label>
                <input type="text" id="mydate" class="daterange" name="event_start_end" style="width: 100%;padding: 6px" required />
            </div>
<!--                     <div class="col-xs-12 form-group">
                <label for="mydate">Class Start Time/Date</label>
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <input type="date" style="width: 100%;" name="start_class_date"  required />
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <input type="time" style="width: 100%;" name="start_class_time" required />
                    </div>
                </div>
            </div>

            <div class="col-xs-12 form-group">
                <label for="mydate">Class End Time/Date</label>
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <input type="date" style="width: 100%;" name="end_class_date"  required />
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <input type="time" style="width: 100%;" name="end_class_time" required />
                    </div>
                </div>
            </div> -->

            <div class="col-xs-12 form-group">
                <label for="favcolor">Select color:</label>
                <input type="color" id="favcolor" name="favcolor" value="#00c0ef" >
            </div>

            <div class="row col-xs-12 form-group">
                <button type="submit"> Schedule Class</button>
                <a href="{{ url('/admin/live-classes') }}" class="btn btn-primary">Back to list</a>
            </div>
        </form>
      </div>
</div>

@endsection
@section('javascript')
    @parent
<!-- <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            timePicker: true,
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').daterangepicker({
      timePicker: true,
      timePickerIncrement: 5,
      locale: {
        format: 'YYYY-MM-DD HH:mm:ss'
      }
    });
    </script> -->
<script>
$(function() {
  $('.daterange').daterangepicker({
    timePicker: true,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'Y/M/DD HH:mm:ss'
    }
  });
});
</script>

@stop

