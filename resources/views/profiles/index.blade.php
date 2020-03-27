@extends('layouts.app')

@section('content')
<div class="container px-5">
    <div class="row py-3 px-5 d-flex align-items-center">
        <div class="col-3 pr-3">
            <img src="https://images.pexels.com/photos/18978/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" width='180px' height="180px" class="rounded-circle">
        </div>
        <div class="col-9 px-5">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="pt-2">{{ $user->username }}</h2>
                @if( $user->id != auth()->user()->id )
                <button class="btn btn-primary py-1 font-weight-bold">Follow</button>
                @else
                <a href="/p/create">Add New Post</a>
                @endif
            </div>
            <div class="py-2">
                <ul class="list-unstyled d-flex">
                    <li class="pr-3"><strong>{{ $user->profiledetails->posts ?? 'N/A' }}</strong> posts</li>
                    <li class="px-3"><strong>{{ $user->profiledetails->followers ?? 'N/A' }}</strong> followers</li>
                    <li class="px-3"><strong>{{ $user->profiledetails->followings ?? 'N/A' }}</strong> followings</li>
                </ul>
            </div>
            <div class="font-weight-bold">{{ $user->profile->title ?? 'N/A' }}</div>
            <div>{{ $user->profile->description ?? 'N/A' }}</div>
            <div>
                <a class="py-0" href="#"> {{ $user->profile->url ?? 'N/A' }} </a>
            </div>
        </div>
    </div>

    <div class="row pt-5">

        @foreach ($user->posts as $post)
        <div class="col-4 ">
            <div class="view-overlay">
                <img src={{ 'http://127.0.0.1:8000/storage/'.$post->image }} class="w-100 img-fluid" alt="image">
            </div>
            <p>{{ $post->caption }}</p>

        </div>
        @endforeach

    </div>
</div>
@endsection