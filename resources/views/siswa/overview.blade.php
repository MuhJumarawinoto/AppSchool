<div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->nama}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->jenis_kelamin}} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->tanggal_lahir}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->alamat}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telepon</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->telepon}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Agama</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->agama}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kewarganegaraan</div>
                    <div class="col-lg-9 col-md-8">{{$siswa->kewarganegaraan}} </div>
                  </div>

                  <h5 class="card-title">Sosial Media Details</h5>
                
                  @foreach($siswa->sosmed as $i)
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">{{ $i->nama }}</div>
                    <div class="col-lg-9 col-md-8">{{ $i->link }}</div>
                  </div>
                  @endforeach

                </div>