@extends('admin.layouts.app')
@section('title', 'Pengaturan: About')
@section('breadcrumb', 'Pengaturan → About')
@section('content')
<div class="card p-6">
    @include('admin.partials.settings-form', ['group' => 'about'])
</div>
@endsection
