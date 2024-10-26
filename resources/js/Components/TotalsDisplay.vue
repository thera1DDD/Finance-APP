<template>
    <div class="totals-display">
        <div class="total-item income">
            <p>Income</p>
            <p>{{ income | currency }}</p>
        </div>
        <div class="total-item expense">
            <p>Expense</p>
            <p>{{ expense | currency }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        income: Number,
        expense: Number,
    },
    filters: {
        currency(value) {
            return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
        },
    },
};
</script>

<style scoped>
.totals-display { display: flex; justify-content: space-around; }
.total-item { text-align: center; }
.income { color: green; }
.expense { color: red; }
</style>
