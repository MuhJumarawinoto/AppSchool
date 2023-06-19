<script setup>
    //import ref
    import { ref, onMounted } from "vue";

    //import router
    import { useRouter, useRoute } from 'vue-router';

    //import api
    import api from "../../api";

    //init router
    const router = useRouter();

    //init route
    const route = useRoute();
    
    //define state
    const foto = ref("");
    const nama = ref("");
    const wali_kelas = ref("sd");
    const alamat = ref("");
    const telepon = ref("");
    const errors = ref([]);

    //onMounted
    onMounted( async () => {

        //fetch detail data post by ID
        await api.get(`/api/guru/${route.params.id}`)
        .then(response => {
            // alert(response.data.data.foto);
            //set response data to state
            foto.value = response.data.data.foto
            nama.value = response.data.data.nama
            wali_kelas.value = response.data.data.wali_kelas
            alamat.value = response.data.data.alamat
            telepon.value = response.data.data.telepon
        });
    })

    //method for handle file changes
    const handleFileChange = (e) => {
        //assign file to state
        foto.value = e.target.files[0];
    };

    //method "updatePost"
    const updatePost = async () => {
        // alert(wali_kelas.value);
        //init formData
        let formData = new FormData();

        //assign state value to formData
        formData.append("foto", foto.value);
        formData.append("nama", nama.value);
        formData.append("alamat", alamat.value);
        formData.append("wali_kelas", wali_kelas.value);
        formData.append("telepon", telepon.value);
        formData.append("_method", "PATCH");

        //store data with API
        await api.post(`/api/guru/${route.params.id}`, formData)
        .then(() => {
            //redirect
            router.push({ path: "/" });
        })
        .catch((error) => {
            //assign response error data to state "errors"
            errors.value = error.response.data;
        });
    };
</script>

<template>
    <div>
        ini file edit 
    </div><div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Tambah Guru</h5>

          
          <form @submit.prevent="updatePost()">
            
            <div class="row mb-3">
              <label for="inputEmail3"  class="col-sm-2 col-form-label">Pas Foto</label>
              <div class="col-sm-10">
                <p>
                    <img :src="foto" style="width: 200px;">
                </p>
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