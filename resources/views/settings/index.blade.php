@extends('layouts.app')
@section('title','Settings')

@section('content')

<style>
    .settings-card {
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card settings-card">
                <div class="card-header bg-dark text-white">
                    ⚙️ Account Settings
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="/settings/update">
                        @csrf

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">
                                Email Notifications
                            </label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                SMS Alerts
                            </label>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">
                                Order Updates
                            </label>
                        </div>

                        <button class="btn btn-primary w-100">
                            <i class="fas fa-save"></i> Save Settings
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
