<template>
    <div class="container">
        <div id="row mt-4">
            <div class="col-6 offset-3">
                <form action="#" @submit.prevent="handleLogin">
                    <h3>sign in</h3>
                    <div class="form-row">
                        <input type="email" name="email" class="form-control" v-model="formData.email" placeholder="email adress">
                    </div>
                    <div class="form-row">
                        <input type="password" name="password" class="form-control" v-model="formData.password" placeholder="password">
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                secrets: [],
                formData: {
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            handleLogin() {
                axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/login', this.formData).then(response => {
                        this.getSecrets()
                    })
                })
                .catch(response => console.log(response))
            },
            getSecrets() {
                axios.get('api/secrets').then(response => {
                    console.log(response);
                    this.secrets = response.data
                })
            }
        }
    }
</script>