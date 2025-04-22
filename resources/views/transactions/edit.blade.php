<x-layout title="Edit Transactions" headerTitle="Edit Transactions" :extend-header="true">
    
    <form action="{{ route('transactions.update', $transactionId) }}" method="post" style="max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="transaction_date" style="display: block; font-weight: bold; margin-bottom: 5px;">Transactions Date:</label>
            <input type="datetime-local" name="transaction_date" id="transaction_date" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="{{ $date }}">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="transaction_amount" style="display: block; font-weight: bold; margin-bottom: 5px;">Transaction Amount:</label>
            <input type="number" name="transaction_amount" id="transaction_amount" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="{{ $amount }}">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="transaction_description" style="display: block; font-weight: bold; margin-bottom: 5px;">Transaction Description:</label>
            <textarea name="transaction_description" id="transaction_description" placeholder="Optional details about the transaction" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $description }}</textarea>
        </div>
        <div style="text-align: center;">
            <input type="reset" value="Cancel" style="padding: 8px 16px; margin-right: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #f5f5f5; cursor: pointer;">
            <input type="submit" value="Save Transaction" style="padding: 8px 16px; border: 1px solid #ccc; border-radius: 4px; background-color: #007bff; color: white; cursor: pointer;">
        </div>
    </form>
    
</x-layout>