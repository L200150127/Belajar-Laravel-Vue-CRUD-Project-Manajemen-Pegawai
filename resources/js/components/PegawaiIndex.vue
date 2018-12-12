<template>
  <div>
    <h4 class="mt-2">Data Pegawai</h4>
    <hr>
    <router-link class="btn btn-success text-white" 
    :to="{name: 'pegawaitambah'}">Tambah</router-link>
    <div class="table-responsive mt-3">
    	<table class="table table-striped table-hover table-bordered">
    		<thead>
    			<tr>
            <th>No</th>
            <th>Foto</th>
    				<th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Jabatan</th>
            <th>Keterangan</th>
    				<th>Aksi</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr v-for="(data, index) in pegawai">
            <td>{{ index+1 }}</td>
            <td>
              <img v-if="data.foto != null"alt="foto_pegawai" :src="'/images/' + data.foto" width="100">
              <img v-else alt="foto_pegawai" :src="'/images/user.png'" 
              width="100">
            </td>
            <td>{{ data.nama_pegawai }}</td>
            <td>{{ data.jenis_kelamin | gender }}</td>
            <td>{{ data.tanggal_lahir | date }}</td>
            <td>{{ data.nama_jabatan | capitalize }}</td>
    				<td>{{ data.keterangan }}</td>
    				<td>
    					<router-link class="btn btn-sm btn-info"
    					:to="{name:'pegawaiedit', params: {id: data.id_pegawai}}">
    					Edit</router-link>
    					<button class="btn btn-sm btn-danger"
    					@click="hapus(index, data.id_pegawai)">
    					Hapus</button>
    				</td>
    			</tr>
    		</tbody>
    	</table>
    </div>
  </div>
</template>


<script>
  export default { 
  	data(){
  		return {
  			pegawai: []
  		}
  	},
  	mounted(){
  		this.tampil();
  	},
  	methods: {
  		tampil(){
  			let uri = '/pegawai/data';
  			this.axios.get(uri).then((response) => {
  				this.pegawai = response.data;
  			});
  		},
  		hapus(index, id){
  			let uri = '/pegawai/' + id;
  			if (confirm('Apakah yakin akan dihapus?')) {
  				this.axios.delete(uri).then((response) => {
  					this.pegawai.splice(index, 1);
  				})
  			}
  		}
  	}
  }
</script>
