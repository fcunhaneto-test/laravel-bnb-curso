<template>
    <div class="d-flex">
        <i class="fas fa-star" v-for="star in fullStar" :key="'full' + star" @click="$emit('input', star)"></i>
        <i class="fas fa-star-half-alt" v-show="hasHalfStar()"></i>
        <i class="far fa-star" v-for="star in emptyStar" :key="'empty' + star" @click="$emit('input', fullStar + star)"></i>
    </div>
</template>

<script>
    export default {
        name: "StarRating",
        props: {
            value: Number,
        },
        computed: {
            fullStar() {
                if (this.hasHalfStar())
                    return Math.round(this.value - 1)
                return Math.round(this.value)
            },
            emptyStar() {
                return Math.abs(5 - Math.round(this.value))
            }
        },
        methods: {
            hasHalfStar() {
                const r = this.value - Math.floor(this.value)
                return r >= 0.5
            }
        },
    }
</script>

<style scoped>
</style>
