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
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{asset ('storage/foto/'.$siswa->foto)}}" alt="Profile" class="rounded-circle">
              <h2>{{$siswa->nama}}</h2>
              <h3>{{$siswa->kelas}}  {{$siswa->jurusan}} </h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

              @include('siswa.overview')
                

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{route('siswa.update', $siswa->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Pass Foto</label>
                        <div class="col-md-8 col-lg-9" id="preview1">
                            <img src="{{asset('storage/foto/'.$siswa->foto)}}" alt="foto {{$siswa->foto}}" title="foto {{$siswa->name}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 col-lg-3">
                        </div>
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
                                </div>
                            </div>
                    </div>
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
                
                @php
                  $i=0;
                @endphp
                  <div class="col-sm-12" :key="render">
                    @foreach($siswa->sosmed as $q)
                    <div class="row mb-12" id="app">
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
                        <div class="col-sm-3">
                          <input type="text" value="{{ $q->id }}">
                          <!-- <form action="{{route('sosmed.delete', ['siswa' => $siswa->id, 'sosmed' => $q->id]) }}" method="POST"> -->
                          <input type="text" value="{{ $q->id }}" name="id_sosmed">                      
                          <button type="button" @click="deleteItem('{{ $q->id }}')">Hapus</button>                              
                        </div>
                        </p>
                    </div>
                    @php
                      $i++;
                    @endphp
                    
                    @endforeach
                    
                    <!-- script hapus sosmed -->
                    <script>
                      new Vue({
                        el: '#app',
                        data: 
                        {
                          render:1
                          // id_sosmed  : ""
                        },
                        mounted() 
                          {
                            // Mengambil daftar item saat halaman dimuat
                            this.getItems();
                          },

                        methods: {
                          deleteItem(id_sosmed)  
                          {
                            // Mengirim permintaan DELETE menggunakan Axios
                            axios.delete('{{ url('sosmed') }}' +'/'+id_sosmed )
                              .then(response => {
                                // console.log(response.data);
                                // Mengupdate daftar item setelah penghapusan berhasil
                                // this.getItems();
                                location.reload();
                              })
                              .catch(error => {
                                console.error(error);
                              });
                          }
                        }
                      });
                    </script>

                    <hr>

                    <div id="container-edit" >
                    </div>
                  </div>
                  <div id="" class="row mb-12">            
                    <div class="col-sm-5">
                        <button onclick="tambahElemen()" id="add-form-button" class="btn btn-primary"><i class="bi bi-plus-circle"></i>  Tambah Kolom
                        </button>
                    </div>
                    <div class="col-sm-4">
                        <button onclick="deleteElemen()" id="tombolhapus" class="btn btn-danger" style="display: none;"><i class="fa-solid fa-circle-minus"></i> Hapus Kolom</button>
                    </div>
                  </div> 
                  
                  <hr>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    <script>
                        var elemen = document.getElementById('tombolhapus');
                        var tampilan = elemen.style.display;

                        function tambahElemen() 
                          {
                                event.preventDefault();
                                let i= 0;
                                var newDiv = document.createElement('div');
                                var container = document.getElementById('container-edit');

                                newDiv.className = "row mb-12";
                                elemen.style.display = 'block';
                                newDiv.innerHTML = `<div id="form-container" class="row mb-12">
                                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Sosmed</label>
                                                      <div class="col-sm-3">
                                                        <select id="inputState" name="tambahSosmed[${i}][nama]" class="form-select">
                                                          <option value="" disabled selected hidden>Pilih ..</option>
                                                          <option value="twiter">twiter</option>
                                                          <option value="Facebook">Facebook</option>
                                                          <option value="TikTok">TikTok</option>
                                                          <option value="Instagram">Instagram</option>
                                                        </select>
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <input type="text" name="tambahSosmed[${i}][link]" class="form-control"  placeholder="" value=""></input>
                                                      </div>
                                                    </div>
                                                  <p>`;

                                container.appendChild(newDiv);
                                i++
                          };

                          function deleteElemen() 
                          {
                                var container = document.getElementById('container-edit');
                                event.preventDefault();

                                // Menghapus elemen terakhir dalam container
                                container.removeChild(container.lastChild);
                          };
                    </script>
                  </form><!-- End Profile Edit Form -->
                                                    
                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">
                  @include('siswa.setingform')
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  @include('siswa.resetPassword')       
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection
