@extends('admin.layouts.app')
@section('title', 'Pengaturan: General')
@section('breadcrumb', 'Pengaturan → General')
@section('content')
<div class="card" style="padding:24px;">
    @include('admin.partials.settings-form', ['group' => 'general'])
</div>
@endsection
