<template>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Управление финансами</h1>

            <!-- Общие суммы -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold">Общий доход: <span class="text-green-600">{{ totalIncome.toFixed(2) }}</span></h2>
            <h2 class="text-xl font-semibold">Общий расход: <span class="text-red-600">{{ totalExpense.toFixed(2) }}</span></h2>
        </div>
        <!-- Фильтр по периоду -->
        <div class="mb-6 flex items-center">
            <form @submit.prevent="filterTransactions" class="flex space-x-4">
                <input type="date" v-model="startDate" class="border border-gray-300 rounded px-4 py-2" />
                <input type="date" v-model="endDate" class="border border-gray-300 rounded px-4 py-2" />
                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Фильтровать</button>
            </form>
        </div>
        <!-- Список транзакций -->
        <div class="mb-6">
            <h3 class="text-2xl font-bold mb-4 text-center" >Транзакции</h3>
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                <tr>
                    <th class="border px-4 py-2">Дата</th>
                    <th class="border px-4 py-2">Описание</th>
                    <th class="border px-4 py-2">Сумма</th>
                    <th class="border px-4 py-2">Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="transaction in transactions" :key="transaction.id" class="border-b">
                    <td class="border px-4 py-2"><strong>{{ formatDate(transaction.transaction_date) }}</strong></td>
                    <td class="border px-4 py-2">{{ transaction.description }}</td>
                    <td class="border px-4 py-2">
                        <strong :class="transaction.category === 'income' ? 'text-green-600' : 'text-red-600'">
                            {{ transaction.amount }}
                        </strong>
                    </td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <button @click="$inertia.visit(`/transactions/${transaction.id}/edit`)" class="bg-yellow-400 text-white rounded px-2 py-1 shadow-md hover:bg-yellow-500 transition">Редактировать</button>
                        <button @click="deleteTransaction(transaction.id)" class="bg-red-500 text-white rounded px-2 py-1 shadow-md hover:bg-red-600 transition">Удалить</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        transactions: Array,
        totalIncome: Number,
        totalExpense: Number,
    },
    data() {
        return {
            startDate: '',
            endDate: '',
        };
    },
    methods: {
        formatDate(date) {
            const options = {year: 'numeric', month: '2-digit', day: '2-digit'};
            return new Date(date).toLocaleDateString('ru-RU', options);
        },
        filterTransactions() {
            this.$inertia.get('/transactions', {start_date: this.startDate, end_date: this.endDate});
        },
        deleteTransaction(id) {
            this.$inertia.delete(`/transactions/${id}`);
        },
    },
};
</script>
