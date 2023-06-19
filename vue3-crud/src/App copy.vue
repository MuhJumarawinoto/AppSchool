<template>

<div class="row">
  <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <h1>HELLo</h1>
        <ul>
          <li v-for="guruList in guru" :key="guru.id">
            {{ guruList.nama }}
            <br>
            {{ guruList.alamat }}
          </li>
        </ul>


        <router-view></router-view>
        
      </div>
    </div>
  </div>
  <!-- End Recent Sales -->


</template>

<script>

import axios from 'axios';

  export default {
    
    data(){
      return{
        guru:[]
      }
    },

    async mounted(){
      const response = await axios.get('http://localhost:8000/api/guru')
      this.guru = response.data.data
    }
  }
</script>