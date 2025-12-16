@extends('layouts.app')
@section('title','My Profile')
@section('content')
@section('content')
<style>
    .profile-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .profile-header {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .profile-header i {
        font-size: 60px;
        margin-bottom: 10px;
    }

    .profile-body {
        padding: 25px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="profile-card">

                <!-- Header -->
                <div class="profile-header">
                    <i class="fas fa-user-circle"></i>
                    <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                    <small>{{ auth()->user()->email }}</small>
                </div>

                <!-- Body -->
                <div class="profile-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="/profile/update">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ auth()->user()->name }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email"
                                   class="form-control"
                                   value="{{ auth()->user()->email }}"
                                   disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Joined On</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ auth()->user()->created_at->format('d M Y') }}"
                                   disabled>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-save"></i> Update Profile
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
