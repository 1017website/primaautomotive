@extends('admin.layouts.app')
@section('title', 'Pengaturan: Footer')
@section('breadcrumb', 'Pengaturan → Footer')
@section('content')
<div class="card p-6">
    @include('admin.partials.settings-form', ['group' => 'footer'])
</div>
@endsection
