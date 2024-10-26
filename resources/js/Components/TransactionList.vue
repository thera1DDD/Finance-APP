<template>
    <div class="transaction-list">
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="transaction in transactions" :key="transaction.id">
                <td>{{ transaction.date }}</td>
                <td>{{ transaction.category }}</td>
                <td>{{ transaction.amount | currency }}</td>
                <td>{{ transaction.description }}</td>
                <td>
                    <button @click="$emit('edit-transaction', transaction)">Edit</button>
                    <button @click="$emit('delete-transaction', transaction.id)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: { transactions: Array },
    filters: {
        currency(value) {
            return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
        },
    },
};
</script>

<style scoped>
.transaction-list table { width: 100%; border-collapse: collapse; }
.transaction-list th, .transaction-list td { padding: 8px; border: 1px solid #ccc; }
</style>
