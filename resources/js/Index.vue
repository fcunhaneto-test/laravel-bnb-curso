<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container-md">
                <a class="navbar-brand" href="#">Laravel BNB Curso</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <!--                        <router-link class="nav-link" :to="{ name: 'bookable' }">Bookable</router-link>-->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-md">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index"
    }
</script>

<style scoped>

</style>
