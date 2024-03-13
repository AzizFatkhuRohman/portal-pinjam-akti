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
    @if(session('edit'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good...',
            text: '{{ session('edit') }}'
        });
    </script>
    @endif
    <div class="d-flex justify-content-between mt-2">
        <div>
            <h4>{{$title}}</h4>
        </div>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah barang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama peminjam</label>
                                    <input type="text" name="nama_peminjam" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">NIM/NOREG</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="nim_noreg">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama barang</label>
                                    <select class="form-select" name="id_barang" aria-label="Default select example">
                                        @foreach ($n_b as $item)
                                        <option value="{{$item->id}}">{{$item->nama_barang}}/{{$item->no_asset}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Waktu peminjaman</label>
                                    <input type="datetime-local" class="form-control" id="exampleFormControlInput1"
                                        name="start">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="keterangan">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn app-btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-bordered border-success table-striped" id="table">
                <thead class="table-success">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">NIM/NOREG</th>
                        <th scope="col">Waktu Pinjam</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($collection as $item)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$item->nama_peminjam}}</td>
                        <td>{{$item->nim_noreg}}</td>
                        <td>{{$item->start}}</td>
                        <td>
                            @if ($item->status == 'belum')
                            <span class="text-danger">Belum kembali</span>
                            @else
                            <span class="text-info">Sudah kembali</span>
                            <br>
                            <span><small>{{$item->end}}</small></span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{$item->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('data-pinjaman/edit/'.$item->id)}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nama
                                                            peminjam</label>
                                                        <input type="text" name="nama_peminjam" class="form-control"
                                                            id="exampleFormControlInput1"
                                                            value="{{$item->nama_peminjam}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">NIM/NOREG</label>
                                                        <input type="text" name="nim_noreg" class="form-control"
                                                            id="exampleFormControlInput1" value="{{$item->nim_noreg}}"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nama
                                                            barang</label>
                                                        <select class="form-select" name="id_barang"
                                                            aria-label="Default select example">
                                                            <option value="{{$item->id_barang}}">
                                                                {{$item->barang->nama_barang}}/{{$item->barang->no_asset}}
                                                            </option>
                                                            @foreach ($n_b as $item)
                                                            <option value="{{$item->id}}">
                                                                {{$item->nama_barang}}/{{$item->no_asset}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Waktu
                                                            Peminjaman</label>
                                                        <input type="datetime-local" class="form-control"
                                                            id="exampleFormControlInput1" name="start"
                                                            value="{{$item->start}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Waktu
                                                            Pengembalian</label>
                                                        <input type="datetime-local" class="form-control"
                                                            id="exampleFormControlInput1" name="end"
                                                            value="{{$item->end}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleFormControlInput1" name="keterangan"
                                                            value="{{$item->keterangan}}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn app-btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    new DataTable('#table');
</script>
@endsection