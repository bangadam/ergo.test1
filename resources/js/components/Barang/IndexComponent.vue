<template>
    <div class="card">
        <div class="card-header">All Barang</div>
        <div class="card-body">
            <router-link :to="{ name: 'barang.create' }" class="btn btn-primary">Create new Barang</router-link>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th width="200" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(barang, index) in barangs" :key="barang.id">
                        <td width="50" class="text-center">{{ index + 1 }}</td>
                        <td>{{ barang.nama }}</td>
                        <td>{{ barang.deskripsi }}</td>
                        <td width="200" class="text-center">
                            <div class="btn-group">
                                <router-link :to="{name: 'barang.show', params: { id: barang.id }}"
                                             class="btn btn-sm btn-info">
                                    Detail
                                </router-link>
                                <router-link :to="{name: 'barang.edit', params: { id: barang.id }}"
                                             class="btn btn-sm btn-warning">
                                    Edit
                                </router-link>
                                <button class="btn btn-sm btn-danger" @click="deleteBarang(barang.id)">Delete</button>
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
            barangs: []
        }
    },
    created() {
        let uri = 'api/barang';
        this.axios.get(uri).then(response => {
            this.barangs = response.data;
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
                        text: 'Barang deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `api/barang/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.barangs.splice(this.barangs.indexOf(id), 1);
                    });
                    console.log("Deleted article with id ..." + id);
                }
            })
        }
    }
}
</script>
