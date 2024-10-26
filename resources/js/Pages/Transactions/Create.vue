<template>
    <div class="container mx-auto py-8">
        <h3 class="text-2xl font-bold">Добавить транзакцию</h3>
        <form @submit.prevent="addTransaction" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <select v-model="newTransaction.category" class="border border-gray-300 rounded px-4 py-2">
                <option value="income">Доход</option>
                <option value="expense">Расход</option>
            </select>
            <input type="number" v-model="newTransaction.amount" placeholder="Сумма" required class="border border-gray-300 rounded px-4 py-2" />
            <input type="text" v-model="newTransaction.description" placeholder="Описание" class="border border-gray-300 rounded px-4 py-2" />
            <button type="submit" class="bg-green-500 text-white rounded px-4 py-2 md:col-span-1">Добавить</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            newTransaction: {
                category: 'income',
                amount: '',
                description: '',
            },
        };
    },
    methods: {
        addTransaction() {
            this.$inertia.post('/transactions', this.newTransaction);
        },
    },
};
</script>
