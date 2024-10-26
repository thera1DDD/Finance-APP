<template>
    <div class="date-filter">
        <label for="from">From:</label>
        <input type="date" v-model="from" @change="emitDateRange" />

        <label for="to">To:</label>
        <input type="date" v-model="to" @change="emitDateRange" />
    </div>
</template>

<script>
export default {
    data() {
        return { from: null, to: null };
    },
    methods: {
        emitDateRange() {
            this.$emit('update-date-range', { from: this.from, to: this.to });
        },
    },
};
</script>

<style scoped>
.date-filter { display: flex; gap: 10px; }
</style>
