@extends('admin.layouts.app')
@section('title', 'Pengaturan: Contact')
@section('breadcrumb', 'Pengaturan → Contact')
@section('content')
<div class="card p-6">
    @include('admin.partials.settings-form', ['group' => 'contact'])
</div>
@endsection
