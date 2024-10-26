<template>
    <div class="container mx-auto py-8">
        <h3 class="text-2xl font-bold">Редактировать транзакцию</h3>
        <form @submit.prevent="updateTransaction" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <select v-model="transaction.category" class="border border-gray-300 rounded px-4 py-2">
                <option value="income">Доход</option>
                <option value="expense">Расход</option>
            </select>
            <input type="number" v-model="transaction.amount" required class="border border-gray-300 rounded px-4 py-2" />
            <input type="text" v-model="transaction.description" class="border border-gray-300 rounded px-4 py-2" />
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2 md:col-span-1">Сохранить</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        transaction: Object,
    },
    methods: {
        updateTransaction() {
            this.$inertia.put(`/transactions/${this.transaction.id}`, this.transaction);
        },
    },
};
</script>
