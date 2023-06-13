@extends('layouts.master')

@section('title','Tambah Siswa')

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

@section('headtext','TAMBAH DATA')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Input Siswa</h5>

              <!-- Horizontal Form -->
              <form action="{{route('siswa.storage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <hr>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Pass Foto</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="file" name="foto" type="file" >
                    
                    @error('foto')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @enderror
                                       
                  </div>
                  <div class="col-sm-3">
                    <div id="preview"></div>
                  </div>
                </div>
                <hr>
              <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-3">
                    <select id="inputState" name="kelas" class="form-select" >
                        <option value="" disabled selected hidden>Pilih ..</option>
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
                        <option value="" disabled selected hidden>Pilih ..</option>
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
                    <input type="text" name="nama" class="form-control" id="inputText" placeholder="Masukan Nama siswa Baru ..">
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
                        <option value="" disabled selected hidden>Pilih ..</option>
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
                  <div class="col-sm-2">
                    <input type="date" name="tanggal_lahir" class="form-control">
                    @error('jurusan')
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
                    <input type="text" name="alamat" class="form-control" id="inputText" placeholder="Masukan Alamat ..">
                    @error('jurusan')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">No.HP</label>
                  <div class="col-sm-2">
                    <input type="number" name="telepon" class="form-control" id="inputEmail" placeholder="08 ..">
                    @error('jurusan')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">e-mail</label>
                  <div class="col-sm-3">
                    <input type="email" name="email" class="form-control" id="inputPassword" placeholder="@ .."> 
                    @error('jurusan')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-2">
                  <select id="inputState" name="agama" class="form-select">
                    <option value="" disabled selected hidden>Pilih ..</option>
                    <option value="Islam">islam</option>
                    <option value="Kristen Protestan">kristen-Protestan</option>
                    <option value="Kristen Katolik">Kristen-Katolik</option>
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                  </select>
                  @error('jurusan')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @enderror
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">kewarganegawaan</legend>
                  <div class="col-sm-10">
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
                    </fieldset>
                  <hr>
                  <div id="form-container" class="row mb-12">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Sosmed</label>
                        <div class="col-sm-3">
                          <select id="inputState" name="nama_sosmed[]" class="form-select">
                            <option value="" disabled selected hidden>Pilih ..</option>
                            <option value="twiter">twiter</option>
                            <option value="Facebook">Facebook</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Instagram">Instagram</option>
                          </select>
                        </div>
                      <div class="col-sm-3">
                        <input type="text" name="link[]" class="form-control"  placeholder="Masukan link ..">
                      </div>
                      <div class="col-sm-3">
                          <button onclick="tambahElemen()" id="add-form-button" class="btn btn-primary"><i class="bi bi-plus-circle"></i></button>
                          <button onclick="deleteElemen()" id="tombolhapus" class="btn btn-danger" style="display: none;"><i class="fa-solid fa-circle-minus"></i></button>
                      </div>
                    
                          
                      
                  </div>
                  <div id="container" class="row mb-12" ><p></p></div>
                  <hr>
                  <script>
                    var elemen = document.getElementById('tombolhapus');
                    var tampilan = elemen.style.display;
                    let i= 0;

                    function tambahElemen() {
                      i++
                      // alert(i);
                          event.preventDefault();
                          var newDiv = document.createElement('div');
                          
                          elemen.style.display = 'block';

                          newDiv.innerHTML = `<div id="container" class="row mb-12"><label class="col-sm-2 col-form-label">sosmed</label><div class="col-sm-3"><select name="nama_sosmed[]" class="form-select"><option value="" disabled selected hidden>Pilih ..</option><option value="twiter">twiter</option><option value="Facebook">Facebook</option><option value="TikTok">TikTok</option><option value="Instagram">Instagram</option></select></div><div class="col-sm-3"><input type="text" name="link[]" class="form-control"  placeholder="Masukan link .."></div></div><p></p>`;
                          var container = document.getElementById('container');
                          container.appendChild(newDiv);
                    };

                    function deleteElemen() {
                          var container = document.getElementById('container');
                          event.preventDefault();

                          // Menghapus elemen terakhir dalam container
                          container.removeChild(container.lastChild);
                        };
                  </script>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </div>      
              </form><!-- End Horizontal Form -->
            
</div>


@endsection