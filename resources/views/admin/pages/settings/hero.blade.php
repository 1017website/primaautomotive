@extends('admin.layouts.app')
@section('title', 'Pengaturan: Hero')
@section('breadcrumb', 'Pengaturan → Hero')
@section('content')
<div class="card p-6">
    @include('admin.partials.settings-form', ['group' => 'hero'])
</div>
@endsection
