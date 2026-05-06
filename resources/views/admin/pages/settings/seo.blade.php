@extends('admin.layouts.app')
@section('title', 'Pengaturan: Seo')
@section('breadcrumb', 'Pengaturan → Seo')
@section('content')
<div class="card p-6">
    @include('admin.partials.settings-form', ['group' => 'seo'])
</div>
@endsection
