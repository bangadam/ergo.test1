<template>
    <div class='card'>
        <div class='card-header'>Show Barang</div>
        <div class='card-body'>
            <div class='form-group'>
                <label htmlFor='nama'>Nama pembeli</label>
                <input type="text" class="form-control" id="title" v-model="transaksi.nama_pembeli">
            </div>
            <div class='form-group'>
                <label htmlFor='barang_id'>Nama barang</label>
                <input type="text" class="form-control" v-model="transaksi.barang.nama">
            </div>
            <div class='form-group'>
                <label htmlFor='content'>Jumlah beli</label>
                <input type="number" class="form-control" id="jumlah_beli" v-model="transaksi.jumlah_beli">
            </div>
            <div class='form-group'>
                <router-link :to="{ name: 'barang' }" class="btn btn-secondary">Back</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            transaksi: {},
        }
    },
    created() {
        let uri = `/api/transaksi/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
            console.log(response)
            this.transaksi = response.data;
        });
    },
}
</script>
