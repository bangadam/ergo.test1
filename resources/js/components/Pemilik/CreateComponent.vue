<template>
    <div class='card'>
        <div class='card-header'>Create Pemilik</div>
        <div class='card-body'>
            <div class="alert alert-danger" v-if="errors.length">
                <b>Terdapat kesalahan dalam input data:</b>
                <ul>
                    <li v-for="error in errors" :key="error">{{ error }}</li>
                </ul>
            </div>

            <form @submit.prevent="createPemilik">
                <div class='form-group'>
                    <label htmlFor='nama'>Nama</label>
                    <input type="text" class="form-control" v-model="pemilik.nama">
                </div>
                <div class='form-group'>
                    <label htmlFor='tempat_lahir'>Tempat lahir</label>
                    <input type="text" class="form-control" v-model="pemilik.tempat_lahir">
                </div>
                <div class='form-group'>
                    <label htmlFor='tanggal_lahir'>Tanggal lahir</label>
                    <input type="date" class="form-control" v-model="pemilik.tanggal_lahir">
                </div>
                <div class='form-group'>
                    <label htmlFor='barang_id'>pilih barang</label>
                    <select name="" class="form-control" v-model="pemilik.barang_id">
                        <option v-for="barang in barangs" v-bind:value="barang.id">
                            {{ barang.nama }}
                        </option>
                    </select>
                </div>
                <div class='form-group'>
                    <label htmlFor='content'>Alamat</label>
                    <textarea type="text" class="form-control" v-model="pemilik.alamat"
                              rows="5"></textarea>
                </div>

                <div class='form-group'>
                    <router-link :to="{ name: 'pemilik' }" class="btn btn-secondary">Back</router-link>
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
            pemilik: {},
            barangs: {},
            errors: [],
            nama: null,
            tempat_lahir: null,
            alamat: null,
            tanggal_lahir: null,
        }
    },
    created() {
        let uri = `/api/barang`;
        this.axios.get(uri).then(response => {
            this.barangs = response.data;
        });
    },
    methods: {
        createPemilik(e) {
            console.log(this.$data.pemilik)
            if (
                this.$data.pemilik.nama != null &&
                this.$data.pemilik.alamat != null &&
                this.$data.pemilik.tempat_lahir != null &&
                this.$data.pemilik.tanggal_lahir != null
            ) {
                this.$swal.fire({
                    title: 'Success',
                    text: "Pemilik created successfully",
                    icon: 'success',
                    timer: 1000
                })
                let uri = '/api/pemilik';
                this.axios.post(uri, this.pemilik).then((response) => {
                    this.$router.push({name: 'pemilik'});
                });
                return true;
            }

            this.errors = [];

            if (!this.nama) {
                this.errors.push('Nama wajib diisi !');
            }
            if (!this.alamat) {
                this.errors.push('Alamat wajib diisi !');
            }
            if (!this.tempat_lahir) {
                this.errors.push('Tempat Lahir wajib diisi !');
            }
            if (!this.tanggal_lahir) {
                this.errors.push('Tanggal lahir wajib diisi !');
            }

            e.preventDefault();
        }
    }
}
</script>
