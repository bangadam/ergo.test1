<template>
    <div class='card'>
        <div class='card-header'>Create Transaksi</div>
        <div class='card-body'>
            <div class="alert alert-danger" v-if="errors.length">
                <b>Terdapat kesalahan dalam input data:</b>
                <ul>
                    <li v-for="error in errors" :key="error">{{ error }}</li>
                </ul>
            </div>

            <form @submit.prevent="createTransaksi">
                <div class='form-group'>
                    <label htmlFor='nama'>Nama pembeli</label>
                    <input type="text" class="form-control" id="title" v-model="transaksi.nama_pembeli">
                </div>
                <div class='form-group'>
                    <label htmlFor='barang_id'>Pilih barang</label>
                    <select name="" class="form-control" v-model="transaksi.barang_id">
                        <option v-for="barang in barangs" v-bind:value="barang.id">
                            {{ barang.nama }}
                        </option>
                    </select>
                </div>
                <div class='form-group'>
                    <label htmlFor='content'>Jumlah beli</label>
                    <input type="number" class="form-control" id="jumlah_beli" v-model="transaksi.jumlah_beli">
                </div>
                <div class='form-group'>
                    <router-link :to="{ name: 'transaksi' }" class="btn btn-secondary">Back</router-link>
                    <button class='btn btn-primary'>Create</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            transaksi: {},
            barangs: {},
            errors: [],
            nama_pembeli: null,
            jumlah_beli: null,
        }
    },
    created() {
      let uri = '/api/barang';
      this.axios.get(uri).then(response => {
          this.barangs = response.data
      })
    },
    methods: {
        createTransaksi(e) {
            if (this.$data.transaksi.nama_pembeli != null && this.$data.transaksi.jumlah_beli != null) {
                this.$swal.fire({
                    title: 'Success',
                    text: "Barang created successfully",
                    icon: 'success',
                    timer: 1000
                })
                let uri = '/api/transaksi';
                this.axios.post(uri, this.transaksi).then((response) => {
                    this.$router.push({name: 'transaksi'});
                });
                return true;
            }

            this.errors = [];

            if (!this.nama_pembeli) {
                this.errors.push('Nama wajib diisi !');
            }
            if (!this.jumlah_beli) {
                this.errors.push('Jumlah beli wajib diisi !');
            }

            e.preventDefault();
        }
    }
}
</script>
