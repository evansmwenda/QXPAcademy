@extends('layouts.app')

@section('content')
<div class="row">
    @include('students.header')
</div>

<div class="row">
    {{-- small left side div --}}
    {!! Form::open(['method' => 'POST', 'route' => 'admin.tests.store']) !!}
    <div class="col-md-4 exams-top" style="background: #fff">
        <h3>Create Tests</h3>
                              
        <hr>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('course_id', 'Course', ['class' => 'control-label']) !!}
                {!! Form::select('course_id', $courses, old('course_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
                @if($errors->has('course_id'))
                    <p class="help-block">
                        {{ $errors->first('course_id') }}
                    </p>
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('lesson_id', 'Lesson', ['class' => 'control-label']) !!}
                {!! Form::select('lesson_id', $lessons, old('lesson_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
                @if($errors->has('lesson_id'))
                    <p class="help-block">
                        {{ $errors->first('lesson_id') }}
                    </p>
                @endif
            </div>
        </div>
    </div>
    {{-- right div --}}
    <div class="col-md-8 exam-questions">
        <div class="row "></div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('published', 'Published', ['class' => 'control-label']) !!}
                {!! Form::hidden('published', 0) !!}
                {!! Form::checkbox('published', 1, false, []) !!}
                <p class="help-block"></p>
                @if($errors->has('published'))
                    <p class="help-block">
                        {{ $errors->first('published') }}
                    </p>
                @endif
            </div>
        </div>
        {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
   @endsection