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

    <section class="section profile">

      <div class="row">

        @include('siswa.card_profile')

   <div class="col-xl-8">
    <div class="card">
      <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" id="link-aktif" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>

              <div class="tab-content pt-2">

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

                
                  <hr>
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Sosial media</div>
                    <div class="col-lg-9 col-md-8">
                    <ul>
                       <!--  -->
                       @foreach($siswa->sosmed as $i)
                       <div class="row mb-3">
                          <label for="inputEmail3" class="col-sm-3 ">{{ $i->nama }}</label>
                          <div class="col-sm-6">{{ $i->link }}</div>
                        </div>
                       <!--  -->
                       @endforeach    
                    </ul>
                    </div>
                  </div>
              </div>
              </div>
           
      

        <div class="tab-pane fade profile-edit pt-3" id="profile-edit"> 
              <!-- Profile Edit Form -->
          <form action="{{route('siswa.update',$siswa->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Pass Foto</label>
                    <div class="col-md-8 col-lg-9" id="preview1">
                          <img src="{{asset('storage/foto/'.$siswa->foto)}}" alt="foto {{$siswa->foto}}" title="foto {{$siswa->name}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-4 col-lg-3"></div>
                    <div class="col-md-8 col-lg-9">
                      <div class="pt-2">
                        <a href="#" id="browseButton"class="btn btn-primary btn-sm" title="Upload new profile image">Upload <i class="bi bi-upload"></i></a>
                        <input type="file" name="foto" id="fileInput" style="display: none;"></input>
                          @error('foto')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @enderror
                          <script>
                              // alert('hhh');
                              document.getElementById('browseButton').addEventListener('click', function() 
                                {
                                  document.getElementById('fileInput').click();
                                });

                              $('#fileInput').on('change', function(e) 
                                {
                                  var file = e.target.files[0];
                                  var reader = new FileReader();
                                  reader.onload = function(e) 
                                    {
                                      $('#preview1').html('<img src="' + e.target.result + '" style="width: 100px; height:auto; background-color: #f1f1f1;">');
                                    }
                                  reader.readAsDataURL(file);
                                });
                          </script>
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                      </div>
                    </div>
                  </div>
              </div>  


              <hr>

              <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-3">
                    <select id="inputState" name="kelas" class="form-select" >
                        <option value="{{$siswa->kelas}}" >{{$siswa->kelas}}</option>
                        <option>I</option>
                        <option>II</option>
                        <option>III</option>
                    </select>
                    
                    @error('kelas')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{$message}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                  </div>
                  
                  <div class="col-sm-1">
                    <label for="inputEmail3" class="col-sm-12 col-form-label">Jurusan</label>
                  </div>

                  <div class="col-md-3">
                    <select id="inputState" name="jurusan" class="form-select">
                        <option value="{{$siswa->jurusan}}" >{{$siswa->jurusan}}</option>
                        <option>IPA</option>
                        <option>IPS</option>
                        <option>Ekonomi</option>
                    </select>
                    @error('jurusan')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                  </div>
              </div>
              <hr>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" value="{{$siswa->nama}}" name="nama" class="form-control" id="inputText" placeholder="Masukan Nama siswa Baru ..">
                      @error('nama')
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" name="jenis_kelamin"class="col-sm-2 col-form-label">jenis Kelamin</label>
                  <div class="col-sm-3">
                    <select id="inputState" name="jenis_kelamin" class="form-select" >
                        <option value="{{$siswa->jenis_kelamin}}">{{$siswa->jenis_kelamin}}</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-3">
                    <input type="date"value="{{$siswa->tanggal_lahir}}" name="tanggal_lahir" class="form-control">
                    @error('tanggal_lahir')
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-6">
                    <input type="text" name="alamat" value="{{$siswa->alamat}}" class="form-control" id="inputText" placeholder="Masukan Alamat ..">
                    @error('alamat')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">No.HP</label>
                  <div class="col-sm-6">
                    <input type="text" name="telepon" value="{{$siswa->telepon}}" class="form-control" id="inputEmail" placeholder="08 .."></input>
                    @error('telepon')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">e-mail</label>
                  <div class="col-sm-5">
                    <input type="email" name="email" value="{{$siswa->email}}" class="form-control"  placeholder="{{$siswa->email}}"> 
                      @error('email')
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-5">
                      <select id="inputState" name="agama" class="form-select">
                        <option value="{{$siswa->agama}}">{{$siswa->agama}}</option>
                        <option value="Islam">islam</option>
                        <option value="Kristen Protestan">kristen-Protestan</option>
                        <option value="Kristen Katolik">Kristen-Katolik</option>
                        <option value="Budha">Budha</option>
                        <option value="Hindu">Hindu</option>
                      </select>
                      @error('jurusan')
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><button>
                      </div>
                      @enderror
                    </div>
                </div>

                <fieldset class="row mb-4">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">kewarganegawaan</label>
                  <div class="col-sm-8">

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kewarganegaraan" id="gridRadios1" value="Indonesia" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Indonesia
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Asing">
                      <label class="form-check-label" for="gridRadios2">
                        Asing
                      </label>
                    </div>

                  </div>
                </fieldset>

                <hr>
                @php
                  $i=0;
                @endphp
                  <div class="col-sm-12">
                    @foreach($siswa->sosmed as $q)
                    <div id="form-container" class="row mb-12">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Sosmed</label>
                        <div class="col-sm-3">
                          <select id="inputState" name="linkSosmed[{{ $i }}][nama]" class="form-select">
                            <option value="{{$q->nama}}" >{{$q->nama}}</option>
                            <option value="twiter">twiter</option>
                            <option value="Facebook">Facebook</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Instagram">Instagram</option>
                          </select>
                        </div>
                        <div class="col-sm-3">
                          <input type="text" name="linkSosmed[{{ $i }}][id]" style="display: none;" value="{{$q->id}}">
                          <input type="text" name="linkSosmed[{{ $i }}][link]" class="form-control"  placeholder="" value="{{$q->link}}"></input>
                        </div> 
                        </p>
                    </div>
                    @php
                      $i++;
                    @endphp
                    
                    @endforeach
                  </div>

                  <div id="form-container" class="row mb-12">            
                    <div class="col-sm-2">
                      <button onclick="tambahElemen1()" id="add-form-button" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                      </button>
                    </div>
                  </div>              
                      <div id="container-edit" class="row mb-12" ><p></p> 
                        <!-- ISI UNTUK TAMBAH DIV SOSMED -->
                      </div>

                      <script>
                        var elemen = document.getElementById('tombolhapus');
                        var tampilan = elemen.style.display;

                        function tambahElemen1() 
                        {
                              event.preventDefault();
                              let i= 0;
                              var newDiv = document.createElement('div');
                              alert(i);
                              elemen.style.display = 'block';
                        
                              newDiv.innerHTML = `<div id="container" class="row mb-12">
                                                    <label class="col-sm-2 col-form-label">sosmed</label>
                                                      <div class="col-sm-3">
                                                        <select name="tambahData[${i}] [nama]" class="form-select">
                                                          <option value="" disabled selected hidden>Pilih ..</option>
                                                          <option value="twiter">twiter</option>
                                                          <option value="Facebook">Facebook</option>
                                                          <option value="TikTok">TikTok</option>
                                                          <option value="Instagram">Instagram</option>
                                                        </select>
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <input type="text" name="tambahData[${i}] [link]" class="form-control"  placeholder="Masukan link ..">
                                                      </div>
                                                  </div>
                                                  <p></p>`;
                              var container = document.getElementById('container-edit');
                              container.appendChild(newDiv);
                              i++
                        };

                        function deleteElemen() 
                        {
                              var container = document.getElementById('container');
                              event.preventDefault();

                              // Menghapus elemen terakhir dalam container
                              container.removeChild(container.lastChild);
                        };
                      </script>

                    </div>
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>

                </form><!-- End Profile Edit Form -->

                

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-4">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div>              
            </div>
          </div><!-- End Bordered Tabs -->
        </div> 
      </div>                    
    </div> 
  </div>


      <script>

                    // window.addEventListener('DOMContentLoaded', (event) => {
                    //     const linkAktif = document.getElementById('link-aktif');
                    //     if (linkAktif) {
                    //         linkAktif.click();
                    //     }
                    // });

                  </script>
    </section>
@endsection