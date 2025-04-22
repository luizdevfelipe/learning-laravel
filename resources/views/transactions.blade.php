<x-layout title="Transactions" headerTitle="Transactions" :extend-header="true">
    <x-slot:header>
        <div class="container mx-auto py-6 px-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <x-cards.stat color="green" title="Total reported income" class="bg-white" label="Total Income" :amount="$totalIncome" />
                <x-cards.stat color="red" class="bg-white" label="Total Expense" :amount="$totalExpense" />
                <x-cards.stat color="blue" class="bg-white" label="Net Saving" :amount="$netSaving" />
                <x-cards.stat color="yellow" class="bg-white" label="Goal" :amount="$goal" />
            </div>
        </div>
    </x-slot:header>
    <div class="flex justify-end">
        <x-btn :link="route('transactions.create')">
            Create Transaction
        </x-btn>
    </div>
    <div class="flex justify-center overflow-x-auto w-full mt-4">
        <table class="w-full table-auto border border-gray-200 rounded-lg shadow-sm" >
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left text-sm">Date</th>
                    <th class="p-2 text-left text-sm">Amount</th>
                    <th class="p-2 text-left text-sm">Description</th>
                    <th class="p-2 text-center text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($transactions as $transaction)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('m/d/Y g:i A') }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium {{ $transaction->amount < 0 ? 'text-red-600' : 'text-green-600' }}">
                        @if ($transaction->amount < 0)
                            (${{ number_format(abs($transaction->amount), 2) }})
                            @else
                            ${{ number_format($transaction->amount, 2) }}
                            @endif
                            </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $transaction->description }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium">
                        <div class="flex justify-center">
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white py-2 px-4 rounded" style="background-color: red; cursor: pointer;">
                                    Delete
                                </button>
                            </form>
                            <x-btn :link="route('transactions.edit', $transaction->id)">
                                Edit
                            </x-btn>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No transactions found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layout>