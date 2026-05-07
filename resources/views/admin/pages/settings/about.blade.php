@extends('admin.layouts.app')
@section('title', 'Pengaturan: About')
@section('breadcrumb', 'Pengaturan → About')
@section('content')
<div class="card" style="padding:24px;">
    @include('admin.partials.settings-form-bilingual', ['group' => 'about'])
</div>
@endsection
