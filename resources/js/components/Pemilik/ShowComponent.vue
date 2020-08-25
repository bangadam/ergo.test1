<template>
    <div class='card'>
        <div class='card-header'>Show Pemilik</div>
        <div class='card-body'>
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
                    <label htmlFor='barang_id'>Nama barang</label>
                    <input type="text" class="form-control" v-model="pemilik.barang.nama">
                </div>
                <div class='form-group'>
                    <label htmlFor='content'>Alamat</label>
                    <textarea type="text" class="form-control" v-model="pemilik.alamat"
                              rows="5"></textarea>
                </div>

                <div class='form-group'>
                    <router-link :to="{ name: 'pemilik' }" class="btn btn-secondary">Back</router-link>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pemilik: {},
        }
    },
    created() {
        let uri = `/api/pemilik/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
            this.pemilik = response.data;
        });
    },
}
</script>
