<template>
  <div>
    <h4 class="mt-2">Edit Pegawai</h4>
    <hr>
    <form method="post" v-on:submit.prevent="simpan">
      <div class="form-group row">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-4">
          <div class="custom-file">
            <label for="foto" class="custom-file-label">{{ namaFile }}</label>
            <input type="file" class="custom-file-input" accept="image/*" 
            @change="ubahFoto($event)"></div>
            <img v-if="foto != '/images/null'" alt="foto_pegawai" 
            :src="foto" width="150" class="img-thumbnail img-fluid mt-2">
            <img v-else alt="foto_pegawai" :src="'/images/user.png'" 
            width="150" class="img-thumbnail img-fluid mt-2">
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="nama" 
          v-model="pegawai.nama_pegawai">
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-4">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="jkl" v-model="pegawai.jenis_kelamin" value="L">
            <label for="jkl" class="custom-control-label">Laki-laki</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="jkp" v-model="pegawai.jenis_kelamin" value="P">
            <label for="jkp" class="custom-control-label">Perempuan</label>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="tanggal" class="col-sm-2 col-form-label">
        Tanggal Lahir</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tanggal" 
          v-model="pegawai.tanggal_lahir">
        </div>
      </div>
      <div class="form-group row">
        <label for="jabatan" class="col-sm-2 col-form-label">
        Jabatan</label>
        <div class="col-sm-4">
          <select name="" id="jabatan" class="custom-select" v-model="pegawai.id_jabatan">
            <option value="">-Pilih Jabatan-</option>
            <option v-for="data in jabatan" :value="data.id_jabatan">
            {{ data.nama_jabatan | capitalize }}</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="keterangan" class="col-sm-2 col-form-label">
        Keterangan</label>
        <div class="col-sm-4">
          <textarea name="" id="keterangan" class="form-control" 
          v-model="pegawai.keterangan"></textarea>
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
        pegawai: {},
        jabatan: {},
        foto: '',
        namaFile: 'Pilih Foto...'
      }
    },
    mounted(){
      this.tampil();
    },
    methods: {
      ubahFoto(e){
        this.namaFile = e.target.files[0].name;
        this.pegawai.foto = e.target.files[0];
      },
      tampil(){
        let uri = '/pegawai/' + this.$route.params.id + '/edit';
        this.axios.get(uri).then((response) => {
          this.pegawai = response.data.pegawai;
          this.jabatan = response.data.jabatan;
          this.foto = '/images/' + this.pegawai.foto;
          this.pegawai.foto = null;
        });
      },
      simpan(){
        let uri = '/pegawai/' + this.$route.params.id;
        let formData = new FormData();

        formData.append('foto', this.pegawai.foto);
        formData.append('nama_pegawai', this.pegawai.nama_pegawai);
        formData.append('jenis_kelamin', this.pegawai.jenis_kelamin);
        formData.append('tanggal_lahir', this.pegawai.tanggal_lahir);
        formData.append('id_jabatan', this.pegawai.id_jabatan);
        formData.append('keterangan', this.pegawai.keterangan);
        formData.append('_method', 'patch');
        
        let config = {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        };

        this.axios.post(uri, formData, config).then((response) => {
          this.$router.push({name: 'pegawai'});
        });
      }
    }
  }
</script>
