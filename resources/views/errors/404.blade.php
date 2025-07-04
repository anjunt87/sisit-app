@extends('layouts.app') {{-- atau layouts.master, tergantung layout-mu --}}

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
    <div class="text-center mt-10">
        <h1 class="text-6xl font-bold text-red-600">404</h1>
        <p class="text-xl mt-4">Maaf, halaman yang Anda cari tidak ditemukan.</p>
        <a href="{{ url('/') }}"
            class="mt-6 inline-block px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
            Kembali ke Beranda
        </a>
    </div>
@endsection
