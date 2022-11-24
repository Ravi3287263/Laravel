@extends('blogForm')
@section('editId', route('blogs.update',[Crypt::encrypt($blog->id)]))

@section('editMethod')
	{{method_field('PUT')}}
	<input name="id" id="blog_id" type="hidden" value="{{ $blog->id }}">	
@endsection
