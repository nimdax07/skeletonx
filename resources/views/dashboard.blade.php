@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <p>Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

        @if(Auth::user()->role == 'admin')
            <a href="{{ route('users.index') }}" class="btn btn-primary">Kelola User</a>
            <a href="{{ route('sales.index') }}" class="btn btn-success">Lihat Data Penjualan</a>
        @endif

        @if(Auth::user()->role == 'marketing')
            <a href="{{ route('sales.index') }}" class="btn btn-success">Lihat Data Penjualan</a>
        @endif
    </div>
@endsection
