@extends('layouts.master')

@section('title','Index Siswa')

@section('content')
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
        </div><!-- End Sales Card -->

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
        </div><!-- End Revenue Card -->

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

        </div><!-- End Customers Card -->

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            
            
            
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
            </div>
<!-- pagination limit -->
                  
              <!-- end limit -->
 <!-- Recent Sales -->
 
            <div class="col-12">
            <div class="card recent-sales overflow-auto">
            
            

              <div class="card-body ">
                <h5 class="card-title">Data Siswa <span>| Kelas </span>
                <br>
                <p> 
                  
                </p></h5>
                <form action="{{ route('siswa') }}" method="get">

                      <label for="per_page">Batasan:</label>
                      
                      <select name="per_page" id="per_page" onchange="this.form.submit()">
                          @foreach ([5, 10, 15, 20, 25] as $perPage)
                              <option value="{{ $perPage }}" {{ ($perPage == $siswa->perPage()) ? 'selected' : '' }}>
                                  {{ $perPage }}
                              </option>
                          @endforeach
                      </select>
                    <br>
                  </form>
                  
                    <a href="{{route('siswa.create')}}"><button  class="btn btn-primary">TAMBAH DATA</button></a>
                  
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
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
                @php
                    $index = 1;
                @endphp

                @foreach($siswa as $a)
                    <tr>
                        <th scope="row"><a href="#">{{ $index }}</a></th>
                        <td><img style="width: 50px; height:auto;" src="{{asset('storage/foto/'.$a->foto)}}" alt=""></td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->jenis_kelamin }}</td>
                        <td>{{ $a->tanggal_lahir }}</td>
                        <td>{{ $a->alamat }}</td>
                        <td>{{ $a->telepon }}</td>
                        <td>{{ $a->kelas }}</td>
                        <td>{{ $a->jurusan }}</td>
                        <td><a href="{{route('siswa.profile', $a->id) }}"><button type="button" class="btn btn-info" title="Lihat {{$a->nama}} bio"><i class="fa-solid fa-eye"></i></button></td></a>
                        <td><a href="{{route('siswa.create')}}"><button type="button" class="btn btn-warning" title="edit {{$a->nama}} bio"><i class="fa-regular fa-pen-to-square" ></i></button></a></td>
                        <td><button type="button" class="btn btn-danger" title="hapus {{$a->nama}} bio"><a href="{{route('siswa.create')}}"><i class="fa-solid fa-trash" ></i></a></button></td>
                        
                        
                    </tr>
                    
                    @php
                        $index++;
                    @endphp
                @endforeach
                        
                </tbody>
                
               </table>        
              </div>
            </div>
            </div>
        </div>
        </div>
      

          </div>
        </div><!-- End Recent Sales -->

            

          </div><!-- End sidebar recent posts-->

        </div>
      </div><!-- End News & Updates -->

    </div><!-- End Right side columns -->

  </div>
</section>

</main><!-- End #main -->
@endsection