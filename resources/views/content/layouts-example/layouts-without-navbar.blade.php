@php
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Without navbar - Layouts')

@section('content')
<!-- Assurez-vous que jQuery est inclus avant Select2 -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Layout Demo -->
<div class="layout-demo-wrapper">
  <div class="layout-demo-placeholder">
    <img src="{{asset('assets/img/layouts/layout-without-navbar-light.png')}}" class="img-fluid" alt="Layout without navbar">
  </div>
  <div class="layout-demo-info">
    <h4>Layout without Navbar</h4>
    <p>Layout does not contain Navbar component.</p>
  </div>
</div>
<!--/ Layout Demo -->

@endsection
