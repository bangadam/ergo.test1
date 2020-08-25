<template>
    <div class='card'>
        <div class='card-header'>Create Barang</div>
        <div class='card-body'>
            <div class="alert alert-danger" v-if="errors.length">
                <b>Terdapat kesalahan dalam input data:</b>
                <ul>
                    <li v-for="error in errors" :key="error">{{ error }}</li>
                </ul>
            </div>

            <form @submit.prevent="createBarang">
                <div class='form-group'>
                    <label htmlFor='nama'>Nama</label>
                    <input type="text" class="form-control" id="title" v-model="barang.nama">
                </div>
                <div class='form-group'>
                    <label htmlFor='content'>Deskripsi</label>
                    <textarea type="text" class="form-control" id="content" v-model="barang.deskripsi"
                              rows="5"></textarea>
                </div>
                <div class='form-group'>
                    <router-link :to="{ name: 'barang' }" class="btn btn-secondary">Back</router-link>
                    &nbsp;
                    &nbsp;
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
            barang: {},
            errors: [],
            nama: null,
            deskripsi: null,
        }
    },
    methods: {
        createBarang(e) {

            if (this.$data.barang.nama != null && this.$data.barang.deskripsi != null) {
                this.$swal.fire({
                    title: 'Success',
                    text: "Barang created successfully",
                    icon: 'success',
                    timer: 1000
                })
                let uri = '/api/barang';
                this.axios.post(uri, this.barang).then((response) => {
                    this.$router.push({name: 'barang'});
                });
                return true;
            }

            this.errors = [];

            if (!this.nama) {
                this.errors.push('Nama wajib diisi !');
            }
            if (!this.deskripsi) {
                this.errors.push('Deskripsi wajib diisi !');
            }

            e.preventDefault();
        }
    }
}
</script>
