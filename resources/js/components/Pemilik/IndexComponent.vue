<template>
    <div class="card">
        <div class="card-header">All Pemilik</div>
        <div class="card-body">
            <router-link :to="{ name: 'pemilik.create' }" class="btn btn-primary">Create new Pemilik</router-link>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Barang</th>
                        <th width="200" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(pemilik, index) in pemiliks" :key="pemilik.id">
                        <td width="50" class="text-center">{{ index + 1 }}</td>
                        <td>{{ pemilik.nama }}</td>
                        <td>{{ pemilik.alamat }}</td>
                        <td>{{ pemilik.barang.nama }}</td>
                        <td width="200" class="text-center">
                            <div class="btn-group">
                                <router-link :to="{name: 'pemilik.show', params: { id: pemilik.id }}"
                                             class="btn btn-sm btn-info">
                                    Detail
                                </router-link>
                                <router-link :to="{name: 'pemilik.edit', params: { id: pemilik.id }}"
                                             class="btn btn-sm btn-warning">
                                    Edit
                                </router-link>
                                <button class="btn btn-sm btn-danger" @click="deletePemilik(pemilik.id)">Delete</button>
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
            pemiliks: []
        }
    },
    created() {
        let uri = 'api/pemilik';
        this.axios.get(uri).then(response => {
            this.pemiliks = response.data;
        });
    },
    methods: {
        deletePemilik(id) {
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
                        text: 'Pemilik deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `/api/pemilik/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.pemiliks.splice(this.pemiliks.indexOf(id), 1);
                    });
                    console.log("Deleted article with id ..." + id);
                }
            })
        }
    }
}
</script>
