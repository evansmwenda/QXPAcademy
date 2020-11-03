@extends('layouts.app')

@section('content')
  <div class="row">
      @include('students.header')
  </div>
<div class="row">
    @if(Session::has("flash_message_error")) 
    <div class="alert progress-bar-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{!! session('flash_message_error') !!}</strong>
    </div> 
  @endif 

@if(Session::has("flash_message_success")) 
<div class="alert progress-bar-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{!! session('flash_message_success') !!}</strong>
</div> 
@endif
    <div class="row exam-top">
        <div class="live-overlay">
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
            <h2>Live Classes</h2>
            <p>Education is your power. So learn more and more</p>
            <div class="col-md-3 live-button">
                <button data-toggle="modal" data-target="#modalCreateOptions"><i class="fa fa-plus"></i> Create</button>
            </div>
        </div>
      </div>
</div>
{{-- end of main row --}}
<div class="col-md-5 join">
   <h3>Join Meeting</h3>
   <input type="text" placeholder="Enter Meeting ID to Join" class="form-control">
   <button>Join Live Meeting</button>
</div>
    
@endsection 
<div class="modal fade" id="modalCreateOptions" role="dialog">
		    <div class="modal-dialog modal-sm">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-body">
                    <div class="row meeting">
                    <h3>Create Meeting</h3>
                    <div class="row col-md-6 instant">
                        <a href="/admin/live-classes/create"><button>Instant</button></a>
                    </div>
                    <div class="row col-md-5 later">
                        <a href="/admin/live-classes/schedule"><button>Scheduled</button></a>
                    </div>
                    </div>
		        	{{-- <a href="/admin/live-classes/create">
			        	<div class="text-center" style="display:flex;justify-content: center;align-items:center;height: 30px;">
			        		<h5>Start an Instant Meeting</h5>
			        	</div>
		        	</a>
		        	<hr>
		        	<a href="/admin/live-classes/schedule">
			        	<div class="text-center" style="display:flex;justify-content: center;align-items: center;height: 30px;">
			        		<h5>Schedule Meeting for Later</h5>
			        	</div>
		        	</a> --}}
		        	
		        </div>
		      </div>
		      
		    </div>
		  </div>
@section('javascript')
    @parent
<script type="text/javascript">
    function toggleJoin() {
        var x = document.getElementById("toggle-join");
        var y = document.getElementById("toggle-create");

        //check if create element is showing->if yes hide it
        if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
            }
    }
    function toggleCreate() {
        var x = document.getElementById("toggle-join");
        var y = document.getElementById("toggle-create");

        if (y.style.display === "none") {
                y.style.display = "block";
                x.style.display = "none";
            } 
    }

</script>
<script>
$(function() {
  $('.daterange').daterangepicker({
  	opens: 'auto',
  	// singleDatePicker:true,
  	drops:'auto',
  	opens:'center',
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