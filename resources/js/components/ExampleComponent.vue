<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tes Api</div>

                    <div
                        v-if="loading === false"
                        class="card-body">
                        Contoh hasil pemanggilan endpoint api

                            <p>Response:</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>Dibuat Pada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- php: foreach(item as data) -->
                                <tr v-for="item in data":key="item.id">
                                    <td> {{item.nama}}</td>
                                    <td> {{item.jk}}</td>
                                    <td> {{item.created_at}}</td>
                                </tr>
                                </tbody>
                                </tr>
                            </table>
                                 {{ error }}
                    </div>
                    <div
                        v-else
                        class="card-body">
                        Loading....                        
                    </div>
                </div>
            </div>
        </div>
        <!-- VueProgressBar -->
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>
                                              
<script>
    export default {
        data(){
            return{
                data: [],
                error: null,
                loading: false
            }
        },

        mounted() {
            this.getData()
        },
        
        methods: {
            getData() {
                this.loading = true
                this.$Progress.start()
                axios.get('/testapi') 
                .then((res) => { 
                    this .data = res.data.data
                    this.loading = false
                    this.$Progress.finish()
                })
                .catch((error) => { 
                    this.error = error.message
                    this.loading = false
                    this.$Progress.fail()
                })
            }
        }
    }
</script>
