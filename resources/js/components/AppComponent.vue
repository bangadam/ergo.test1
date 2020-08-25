<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Menu Ergo test 1</h4>
                        <div class="list-group">
                            <router-link :to="{name: 'barang'}" class="list-group-item list-group-item-action">Barang
                            </router-link>
                            <router-link :to="{name: 'pemilik'}" class="list-group-item list-group-item-action">Pemilik
                            </router-link>
                            <router-link :to="{name: 'transaksi'}"
                                         class="list-group-item list-group-item-action">Transaksi
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
