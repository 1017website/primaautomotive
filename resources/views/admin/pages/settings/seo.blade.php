@extends('admin.layouts.app')
@section('title', 'Pengaturan: Seo')
@section('breadcrumb', 'Pengaturan → Seo')
@section('content')
<div class="card" style="padding:24px;">
    @include('admin.partials.settings-form', ['group' => 'seo'])
</div>
@endsection
