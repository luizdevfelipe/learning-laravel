<x-layout title="Transactions" headerTitle="Transactions" :extend-header="true">
    <x-slot:header>
        <div class="container mx-auto py-6 px-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <x-cards.stat color="green" title="Total reported income" class="bg-gray-500" label="Total Income" :amount="$totalIncome" />
                <x-cards.stat color="red" label="Total Expense" :amount="$totalExpense" />
                <x-cards.stat color="blue" label="Net Saving" :amount="$netSaving" />
                <x-cards.stat color="yellow" label="Goal" :amount="$goal" />
            </div>
        </div>
    </x-slot:header>
    <div class="flex justify-end">
        <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-900">
            Create Transaction
        </a>
    </div>
</x-layout>