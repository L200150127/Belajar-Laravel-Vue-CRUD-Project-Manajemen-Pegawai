<template>
  <div>
    <h4 class="mt-2">Tambah jabatan</h4>
    <hr>
    <form method="post" v-on:submit.prevent="simpan">
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Jabatan</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="nama" 
          v-model="jabatan.nama_jabatan">
        </div>
      </div>
      <button type="submit" class="btn btn-info">Simpan</button>
      <button type="reset" class="btn btn-warning">Batal</button>
    </form>
  </div>
</template>


<script>
  export default { 
  	data(){
  		return {
  			jabatan: {
          nama_jabatan: ''
        }
  		}
  	},
  	methods: {
  		simpan(){
  			let uri = '/jabatan';
  			this.axios.post(uri, this.jabatan).then((response) => {
  				this.$router.push({name: 'jabatan'});
  			});
  		}
  	}
  }
</script>
