<template>
    <div class="card mb-3 h-100">
        <h5 class="card-header bg-primary text-white">
            <router-link class="nav-link text-white"
                         :to="{ name: 'bookable', params: { id: bookable.id } }">{{ bookable.title }}</router-link>
        </h5>
        <div class="card-body">
            <p class="card-text">{{ bookable.description }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BookableListItem",
        props: {
            'bookable': Object,
        }
    }
</script>

<style scoped>

</style>
