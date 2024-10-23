@extends('layouts.app')

@section('title', 'Welcome to Partner Management System')
@section('header-title', 'Welcome to Partner Management System')
@section('header-subtitle', 'Manage your business partnerships with ease')

@section('content')
    <div class="row">
        <!-- Card 1: Manage Partners -->
        <div class="col-md-6 mb-4">
            <div class="card card-custom shadow-lg">
                <img src="https://via.placeholder.com/600x300" class="card-img-top" alt="Partners">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Manage Partners</h5>
                    <p class="card-text">Access and manage all your company's partners. Add, edit, view details, and track partner relationships.</p>
                    <a href="/partners" class="btn btn-custom">Go to Partners</a>
                </div>
            </div>
        </div>
        <!-- Card 2: Manage Contracts -->
        <div class="col-md-6 mb-4">
            <div class="card card-custom shadow-lg">
                <img src="https://via.placeholder.com/600x300" class="card-img-top" alt="Contracts">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Manage Contracts</h5>
                    <p class="card-text">Easily manage contracts with your partners. Create, track, and maintain all contractual details in one place.</p>
                    <a href="/contracts" class="btn btn-custom">Go to Contracts</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Authentication Links -->
    <div class="text-center mt-5">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-custom">Dashboard</a>
                
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-3">Вийти</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-custom me-3">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-custom">Register</a>
                @endif
            @endauth
        @endif
    </div>
@endsection
