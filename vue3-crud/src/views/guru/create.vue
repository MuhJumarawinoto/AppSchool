<script>
import { ref } from "vue";
import { useRouter } from 'vue-router';
import api from "../../api";
import axios from "axios";

const FormComponent = {
  setup() {
    const router = useRouter();

    // Define state using ref
    const foto = ref("");
    let nama = ref("");
    const wali_kelas = ref("");
    const alamat = ref("");
    const telepon = ref("");
    const errors = ref([]);

    // Method for handling file changes
    const handleFileChange = (e) => {
      // Assign file to state
      foto.value = e.target.files[0];
    };

    
    // Method for storing data
    const storePost = async () => {
      // alert('dfd');
      // console.log('fsd');
      try {
        // Init formData
        let formData = new FormData();
       
        // Assign value to formData
        formData.append("foto", foto.value);
        formData.append("nama", nama.value);
        formData.append("wali_kelas", wali_kelas.value);
        formData.append("alamat", alamat.value);
        formData.append("telepon", telepon.value);
        // alert(wali_kelas.value);
        // Store data with API
        await axios.post('http://127.0.0.1:8000/api/guru', formData);
        // console.log(response.data);
        // Redirect
        // router.push('home');
        // alert('disini');    
        router.push({ name: 'guru.index' });
      } catch (error) {
        // throw 
        // Assign response error data to variable "errors"
        errors.value = error.response;
      }
    };

    return {
      foto,
      nama,
      wali_kelas,
      alamat,
      telepon,
      errors,
      handleFileChange,
      storePost
    };
  }
};

export default FormComponent;

</script>
<template>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Tambah Guru</h5>

          
          <form @submit.prevent="storePost()">

            <div class="row mb-3">
              <label for="inputEmail3"  class="col-sm-2 col-form-label">Pas Foto</label>
              <div class="col-sm-10">
                <input class="form-control" @change="handleFileChange" type="file" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" v-model="nama" id="inputEmail">
                
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Wali Kelas</label>
              <div class="col-sm-10">
                <!-- <input type="text" class="form-control" v-model="wali_kelas"> -->
                <select id="inputState" v-model="wali_kelas" class="form-select" >
                    <option value="" disabled selected hidden>Choose...</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                </select>
                
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input  type="text" class="form-control" v-model="alamat" >
                
              </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                  <input v-model="telepon" type="text" class="form-control" >
                </div>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset"  class="btn btn-secondary">Reset</button>
            </div>
          </form>

        </div>
      </div>   
</template>

