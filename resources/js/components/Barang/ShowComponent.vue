<template>
    <div class='card'>
        <div class='card-header'>Show Barang</div>
        <div class='card-body'>
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
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            barang: {},
        }
    },
    created() {
        let uri = `/api/barang/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
            this.barang = response.data;
        });
    },
}
</script>
