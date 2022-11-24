@extends('layout')

@section('content')
<div class="container px-5 py-5">
    <div class="card card default">
        <a href="{{ route('blogForm') }}" class="btn btn-success">Add Blog</a> 
        <table class="table table-default table-striped">
            <tr>
                <th>Id</th>
                <th>Blogger</th>
                <th>Blog</th>
                <th>Action</th>
            </tr>
            @if(count($blogs))
            @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->name }}</td>
                <td>{{ $blog->content }}</td>
                <td><a href="{{ route('blogs.edit',[Crypt::encrypt($blog->id)]) }}" class="btn btn-primary">Edit</a>
                    <a href="JavaScript:Void(0);" onclick="deleteRecord(`{{ route('blogs.destroy',[Crypt::encrypt($blog->id)]) }}`)"class="btn btn-danger">Delete</a></td>
            </tr> 
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="4">No data found</td>
            </tr> 
            @endif
        </table>
    </div>
</div>
@endsection
