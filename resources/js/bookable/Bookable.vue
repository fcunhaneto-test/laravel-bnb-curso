<template>
    <div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">{{ bookable.title}}</h3>
                    <div class="card-body">
                        <p>{{ bookable.description }}</p>
                    </div>
                </div>
                <review-list :bookable-id="this.$route.params.id"></review-list>
            </div>
            <div class="col-md-4">
                <availability :bookable-id="this.$route.params.id"></availability>
            </div>
        </div>
    </div>
</template>

<script>
    import Availability from "./Availability";
    import ReviewList from "./ReviewList";
    export default {
        name: "Bookable",
        components: {
            Availability,
            ReviewList
        },
        data() {
            return {
                bookable: null,
            }
        },
        created() {
            const id = this.$route.params.id;
            axios.get(`/api/bookables/${id}`).then(response => {
                this.bookable = response.data.data
            })
        }
    }
</script>

<style scoped>

</style>
