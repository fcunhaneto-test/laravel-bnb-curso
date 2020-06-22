<template>
    <div>
        <div class="form-group">
            <label class="text-dark">Select the star value (1 - worst, 5 - excellent)</label>
            <star-rating class="fa-2x" v-model="review.rating"></star-rating>
        </div>
        <div class="form-group">
            <label for="content" class="text-dark">Describe your experience with</label>
            <textarea id="content" cols="30" rows="10" class="form-control" v-model="review.content"></textarea>
        </div>
        <button class="btn btn-primary btn-lg btn-block">Submit</button>
    </div>
</template>

<script>
    import StarRating from "../shared/components/StarRating";
    export default {
        name: "Review",
        components: {StarRating},
        data() {
            return {
                review: {
                    rating: 0,
                    content: null
                },
                full_star: 0
            }
        },
        methods: {
            onRantingChanged(value) {
                this.review.rating = rating
            }
        }
    }
</script>

<style scoped>

</style>
