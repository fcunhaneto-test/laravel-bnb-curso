<template>
    <div class="mt-3">
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Check Availability
            <span v-if="hasAvailability" class="text-success">(AVAILABLE)</span>
            <span v-if="noAvailability" class="text-danger">(NOT AVAILABLE)</span>
        </h6>
        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="from">From</label>
                <input
                    id="from"
                    type="date"
                    name="from"
                    v-model="from"
                    class="form-control form-control-sm"
                    placeholder="Start Date"
                    @keyup.enter="check"
                    :class="[{'is-invalid': errorFor('from')}]"
                >
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('from')" :key="'from' + index">
                    {{ error }}
                </div>
            </div>
            <div class="form-group  col-md-6">
                <label for="to">To</label>
                <input
                    id="to"
                    type="date"
                    name="to"
                    v-model="to"
                    class="form-control form-control-sm"
                    placeholder="End Date"
                    @keyup.enter="check"
                    :class="[{'is-invalid': this.errorFor('to')}]"
                >
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('to')" :key="'to' + index">
                    {{ error }}
                </div>
            </div>
        </div>
        <button class="btn btn-secondary btn-block" @click="check" :disabled="loading">Check!</button>
    </div>
</template>

<script>
    export default {
        name: "Availability",
        props: {
            bookableId: String,
        },
        data() {
            return {
                from: null,
                to: null,
                loading: false,
                status: null,
                errors: null
            }
        },
        computed: {
            hasError() {
                return 422 === this.status && this.errors != null
            },
            hasAvailability() {
                return 200 === this.status
            },
            noAvailability() {
                return 404 === this.status
            }
        },
        methods: {
            check: function () {
                this.loading = true;
                this.errors = null;
                // const id = this.$route.params.id;
                console.log(this.from, this.to)
                axios.get(`/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`)
                    .then(response => { this.status = response.status})
                    .catch(error => {
                        if(422 === error.response.status) {
                            this.errors = error.response.data.errors;
                            console.log('errors:', this.errors)
                        }
                        this.status = error.response.status
                    });
                this.loading = false
            },
            errorFor(field) {
                console.log('hasError', this.hasError)
                const result = this.hasError && this.errors[field] ? this.errors[field] : null
                console.log('hasError', this.hasError, result)
                return result
            }
        }
    }
</script>

<style scoped>
    label {
        text-transform: uppercase;
        font-size: 0.7rem;
        color: gray;
    }
    .invalid-feedback {
        color: brown;
    }
</style>
