<!-- colom -->
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="{{asset('storage/foto/'.$siswa->foto)}}" alt="Profile {{$siswa->foto}}" class="rounded-circle">
              <h2>{{$siswa->nama}}</h2>
              <h3>{{$siswa->kelas}} {{$siswa->jurusan}}</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- end collom -->