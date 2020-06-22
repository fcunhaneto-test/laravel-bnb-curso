<template>
    <div class="section">
        <p v-if="!bookables">
            data loading ...
        </p>
        <div class="row d-flex" v-else>
            <div v-for="(bookable, index) in bookables" class="col-xl-4 col-lg-4 col-md-6 mb-3">
                <bookable-list-item :bookable="bookable"></bookable-list-item>
            </div>
        </div>
    </div>
</template>

<script>
    import BookableListItem from "./BookableListItem";

    export default {
        name: "Bookables",
        components: {
            BookableListItem
        },
        data() {
            return {
                bookables: null
            }
        },
        created() {
            axios.get('/api/bookables').then(result => {
                this.bookables = result.data.data
            })
        }

    }
</script>

<style scoped>
</style>
