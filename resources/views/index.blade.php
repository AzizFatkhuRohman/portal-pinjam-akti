@extends('layouts.app')
@section('main')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@if(session('create'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good...',
            text: '{{ session('create') }}'
        });
    </script>
@endif
<div class="app-content pt-3 p-md-3 p-lg-4">
  <div class="container-xl">
    
    <h1 class="app-page-title">Overview</h1>
    
    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
      <div class="inner">
        <div class="app-card-body p-3 p-lg-4">
          <h3 class="mb-3">Selamat datang, {{Auth::user()->nama}}!</h3>
          <div class="row gx-5 gy-3">
              <div class="col-12 col-lg-9">
                
                <div>Ini adalah sistem informasi manajemen pinjaman</div>
            </div>
          </div><!--//row-->
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div><!--//app-card-body-->
        
      </div><!--//inner-->
    </div><!--//app-card-->
      
    <div class="row g-4 mb-4">
      <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
          <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Total Barang</h4>
            <div class="stats-figure">{{$j_b}}</div>
          </div><!--//app-card-body-->
          <a class="app-card-link-mask" href="{{url('data-barang')}}"></a>
        </div><!--//app-card-->
      </div><!--//col-->
      
      <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
          <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Total Pinjaman hari ini</h4>
            <div class="stats-figure">{{$t_p}}</div>
          </div><!--//app-card-body-->
          <a class="app-card-link-mask" href="{{url('data-pinjaman')}}"></a>
        </div><!--//app-card-->
      </div><!--//col-->
      <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
          <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Belum kembali</h4>
            <div class="stats-figure">{{$b}}</div>
          </div><!--//app-card-body-->
          <a class="app-card-link-mask" href="{{url('data-pinjaman')}}"></a>
        </div><!--//app-card-->
      </div><!--//col-->
      <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
          <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Sudah kembali</h4>
            <div class="stats-figure">{{$k}}</div>
          </div><!--//app-card-body-->
          <a class="app-card-link-mask" href="{{url('data-pinjaman')}}"></a>
        </div><!--//app-card-->
      </div><!--//col-->
    </div>
    
  </div><!--//container-fluid-->
</div>
@endsection