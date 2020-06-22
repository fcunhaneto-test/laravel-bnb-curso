<template>
    <div>
        <div v-if="loading">
            Loading ...
        </div>
        <div v-else>
            <h4 class="review-list d-none d-md-block">Review List</h4>
            <div class="review-list d-none d-md-block" v-for="(review, index) in reviews" :key="index">
                <div class="row">
                    <div class="col-md-6">Francisco Cunha</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <star-rating :value="review.rating"></star-rating>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">{{ review.created_at | fromNow }}</div>
                </div>
                <div class="row pt-2 pb-1">
                    <div class="col-md-12">{{ review.content }}</div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    // import moment from 'moment'
    // import router from "../routes";
    import StarRating from "../shared/components/StarRating";
    export default {
        name: "ReviewList",
        components: {StarRating},
        props: {
            bookableId: String,
        },
        data() {
            return {
                loading: true,
                reviews: null
            }
        },
        created() {
            // const id = this.$route.params.id;
            // console.log('id', id)
            axios.get(`/api/bookables/${this.bookableId}/reviews`).then(response => {
                this.reviews = response.data.data;
                this.loading = false
            })
        },
        // filters: {
        //     fromNow(value) {
        //         return moment(value).fromNow()
        //     }
        // }
    }

</script>

<style scoped>
    .review-list {
        padding: 1rem 1.25rem;
        border-bottom: solid 1px #BDBDBD;
    }
</style>
