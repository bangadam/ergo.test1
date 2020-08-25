<template>
    <div class="card">
        <div class="card-header">All Transaksi</div>
        <div class="card-body">
            <router-link :to="{ name: 'transaksi.create' }" class="btn btn-primary">Create new Transaksi</router-link>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Nama pembeli</th>
                        <th>Jumlah beli</th>
                        <th>Nama barang</th>
                        <th width="200" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(transaksi, index) in transaksis" :key="transaksi.id">
                        <td width="50" class="text-center">{{ index + 1 }}</td>
                        <td>{{ transaksi.nama_pembeli }}</td>
                        <td>{{ transaksi.jumlah_beli }}</td>
                        <td>{{ transaksi.barang.nama }}</td>
                        <td width="200" class="text-center">
                            <div class="btn-group">
                                <router-link :to="{name: 'transaksi.show', params: { id: transaksi.id }}"
                                             class="btn btn-sm btn-info">
                                    Detail
                                </router-link>
                                <router-link :to="{name: 'transaksi.edit', params: { id: transaksi.id }}"
                                             class="btn btn-sm btn-warning">
                                    Edit
                                </router-link>
                                <button class="btn btn-sm btn-danger" @click="deleteBarang(transaksi.id)">Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            transaksis: []
        }
    },
    created() {
        let uri = 'api/transaksi';
        this.axios.get(uri).then(response => {
            this.transaksis = response.data;
        });
    },
    methods: {
        deleteBarang(id) {
            this.$swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    this.$swal.fire({
                        title: 'Success!',
                        text: 'Transaksi deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `api/barang/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.transaksis.splice(this.transaksis.indexOf(id), 1);
                    });
                    console.log("Deleted article with id ..." + id);
                }
            })
        }
    }
}
</script>
