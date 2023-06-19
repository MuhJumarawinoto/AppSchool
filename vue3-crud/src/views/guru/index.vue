<script setup>
    import { ref, onMounted } from 'vue';
    import api from '../../api';

    const guru = ref([]);
    const keyword = ref([]);

    //method search
    const searchData = async() =>
    {
      await api.get('/api/guru',{params:{keyword: keyword.value}})
      .then(response => {
        console.log(response.data);
        guru.value = response.data.data
      })
      .catch(error => {
        console.error(error);
      });
    }

    //method delete
    const deletePost = async (id) => 
    {
      await api.delete(`/api/guru/${id}`)
      .then(() => {
          fetchDataPosts();
      })
    };

    //method tampil
    const fetchDataPosts = async () => 
    {
      await api.get('api/guru')
      .then(response => {
          guru.value = response.data.data
          console.log(response);
      });
    }

    fetchDataPosts();
</script>

<template>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Guru | <router-link :to="{ name: 'guru.create' }" class="btn btn-primary rounded-pill">Tambah Guru</router-link></h5>
          <input type="text" v-model="keyword" @keyup="searchData" placeholder="Search ...">
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr v-if="guru.length == 0">
                  <td colspan="4" class="text-center">
                      <div class="alert alert-danger mb-0">
                          Data Belum Tersedia!
                      </div>
                  </td>
              </tr>
              <tr v-else v-for="guruList in guru" :key="guruList.id">
                <th>{{ guruList.id }}</th>
                <td><img :src="guruList.foto" class="rounded-circle" width="50" height="50" /></td>
                <td>{{ guruList.nama }} </td>
                <td>{{ guruList.alamat }}</td>
                <td>{{ guruList.wali_kelas }}</td>
                <td> <router-link :to="{ name: 'guru.edit', params:{id: guruList.id} }" class="btn btn-sm btn-primary"> Edit </router-link> | 
                     <button @click.prevent="deletePost(guruList.id)" class="btn btn-sm btn-danger rounded-sm shadow border-0">DELETE</button>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</template>