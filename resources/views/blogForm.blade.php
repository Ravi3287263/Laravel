@extends('layout')

@section('content')
<div class="container px-10 py-10">
    <form method="post"  action="@yield('editId',route('blogs.index'))">
        @csrf
        @section('editMethod')
        @show
        <div class="form-group">
            <label for="name">Blogger name</label>
            <input type="name" class="form-control @error('name') is-invalid  @enderror" name="name" value="@if(@$blog) {{  @$blog->name }} @endif" >
            @error('name')
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea  class="form-control @error('content') is-invalid  @enderror" name="content"  >@if(@$blog) {{  @$blog->content }} @endif</textarea>
            @error('content')
            <div class="invalid-feedback">
                <strong>{{ $errors->first('content') }}</strong>
            </div>
            @enderror
        </div>
        <button type="submit" class=" mt-3 btn btn-primary">Submit</button>
    </form>
</div>
@endsection