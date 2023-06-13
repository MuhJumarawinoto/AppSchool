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

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Sales <span>| Today</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6>145</h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Revenue <span>| This Month</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>$3,264</h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">
          <div class="card info-card customers-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Customers <span>| This Year</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>1244</h6>
                  <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Customers Card -->

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
                    <div class="col-sm-11">
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
                    <div class="col-sm-1 float-right">
                      <a href="{{route('siswa.create')}}">
                        <button  class="btn btn-primary" ><i class="bi bi-person-plus-fill"> </i></button>
                      </a>
                    </div>
                  </div>
                  <hr>
          <!-- end Per Page -->
                       
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="row">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon </th>
                    <th scope="col">email</th>
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
                        <td>{{ $a->alamat }}</td>
                        <td>{{ $a->telepon }}</td>
                        <td>{{ $a->kelas }}</td>
                        <td>{{ $a->jurusan }}</td>
                        <td>
                          <a href="{{route('siswa.profile', $a->id) }}">
                            <button type="button" class="btn btn-info" title="Lihat {{$a->nama}} bio">
                              <i class="fa-solid fa-eye"></i>
                            </button>
                          </a>
                        </td>
                        <td>
                          <a href="{{route('siswa.profile' , $a->id)}}" id="link-aktif">
                            <button type="button" class="btn btn-warning" title="edit {{$a->nama}} bio">
                              <i class="fa-regular fa-pen-to-square" ></i>
                            </button>
                          </a>
                        </td>
                        <td>
                          <form action="{{route('siswa.delete',$a->id) }}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger" title="hapus {{$a->id}} bio">
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
<script>
  window.addEventListener('DOMContentLoaded', (event) => 
  {
   // Otomatis melakukan klik pada elemen tertentu
   const element = document.getElementById('editclick');
   if (element) {
     element.click();
   }
  });
</script>
@endsection