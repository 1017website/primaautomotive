@extends('layouts.app')

@section('title', 'Prima Automotive - Bengkel Cat & Perbaikan Body Mobil Surabaya')
@section('meta_description', 'Bengkel cat mobil dan perbaikan body profesional di Surabaya. Garansi 6-24 bulan, teknisi berpengalaman, hasil standar pabrik. Hubungi kami sekarang!')

@section('content')

    @include('home.partials.hero')

    @include('home.partials.reviews')

    @include('home.partials.services')

    @include('home.partials.process')

    @include('home.partials.about')

    @include('home.partials.location-footer')

@endsection
