@extends('layouts.master')

@section('title','Index Siswa')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<section class="section dashboard">
  <div class="row">

  <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        @include('siswa.card')

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
          </div>
        </div>
          <!-- end Recent Sales -->
 
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
              <div class="card-body ">
                <h5 class="card-title">Data Siswa <span>| Kelas </span></h5>

          <!-- Per Page -->
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <form action="{{ route('siswa') }}" method="get">
                        <label for="per_page" class="col-form-label">Batasan:</label>
                        <select name="per_page" class="col-form-label" id="per_page" onchange="this.form.submit()">
                            @foreach ([5, 10, 15, 20, 25] as $perPage)
                                <option value="{{ $perPage }}" {{ ($perPage == $siswa->perPage()) ? 'selected' : '' }}>
                                    {{ $perPage }}
                                </option>
                            @endforeach
                        </select>
                        <br>
                      </form>
                    </div>
                    
                    <div class="col-sm-4 float-right">
                    <!-- Search bar table -->
                      <div class="search-bar col-md-12">
                          <form class="search-form d-flex align-items-center" method="GET" action="{{route('siswa')}}">
                            <input type="text" name="keyword" class="form-control" placeholder="Search" title="Enter search keyword" value="{{$keyword}}">
                            <button type="submit" class="btn btn-outline-info" title="Search"><i class="bi bi-search"></i></button>
                          </form>
                        </div>
                    <!-- End Search Bar -->
                    </div>
                    <div class="col-sm-2 float-right">
                      <div class="search-bar col-md-12">
                        <a href="{{route('siswa.create')}}">
                            <button  class="btn btn-primary" ><i class="bi bi-person-plus-fill"></i> Tambah</button>
                        </a>
                      </div>
                    </div>
                  </div>
                  <hr>
          <!-- end Per Page -->
                       
              <table class="table table-striped">
                <thead>
                  <tr class="table-primary">
                    <th scope="col">Id</th>
                    <th scope="row">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Telepon </th>
                    <th scope="col">Kelas </th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                
                <!-- index untuk per_page -->
                @php
                    $index = 1;
                @endphp
                <!-- end index untuk per_page -->

                @foreach($siswa as $a)
                    <tr>
                        <th scope="row"><a href="#">{{ $a->id }}</a></th>
                        <td><img style="width: 50px; height:auto;" src="{{asset('storage/foto/'.$a->foto)}}" alt=""></td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->jenis_kelamin }}</td>
                        <td>{{ $a->tanggal_lahir }}</td>
                        <td>{{ $a->telepon }}</td>
                        <td>{{ $a->kelas }}</td>
                        <td>{{ $a->jurusan }}</td>
                        <td>
                          <a href="{{route('siswa.profile', $a->id) }}">
                            <button type="button" class="btn btn-info btn-sm" title="Lihat {{$a->nama}} bio">
                              <i class="fa-solid fa-eye"></i>
                            </button>
                          </a>
                        
                        
                          <a href="{{route('siswa.profile' , $a->id)}}" id="link-aktif">
                            <button type="button" class="btn btn-warning btn-sm" title="edit {{$a->nama}} bio">
                              <i class="fa-regular fa-pen-to-square" ></i>
                            </button>
                          </a>
                        
                          <form id="deleteForm" action="{{route('siswa.delete',$a->id) }}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <button onclick="confirmDelete()" class="btn btn-danger btn-sm" title="hapus {{$a->id}} bio">
                              <i class="fa-solid fa-trash" >
                              </i>
                            </button> 
                          </form>
                        </td>
                    </tr>

                    @php
                        $index++;
                    @endphp

                @endforeach
                </tbody>
                <script>
                  function confirmDelete() {
                      // Tampilkan prompt konfirmasi
                      var confirmation = confirm("yakin untuk menhapus data ini ?");

                      // Periksa jawaban dari prompt
                      if (!confirmation) 
                      {
                          event.preventDefault(); // Mencegah pembebanan halaman jika konfirmasi dibatalkan
                      }
                  }
                </script>
              </table>

              <div class="row mb-3">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">{{ $siswa->onEachSide(2)->links('vendor.pagination.custom') }}</div>
                <div class="col-sm-4"></div>
              </div>       
              <hr>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Recent Sales -->
</section>
<!-- end section -->
@endsection