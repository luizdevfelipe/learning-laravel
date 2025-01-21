@extends('layout')

@section('title', 'Transactions')

@section('header-title', 'Transactions')

@section('header')
    @parent
    
    <div class="container mx-auto py-6 px-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <x-cards.stat title="Total reported income" label="Total Income" :amount="$totalIncome" />
            <x-cards.stat label="Total Expense" :amount="$totalExpense" />
            <x-cards.stat label="Net Saving" :amount="$netSaving" />
            <x-cards.stat label="Goal" :amount="$goal" />

        {{--<div class="flex items-center bg-white p-4 shadow rounded">
                <i class="fas fa-dollar-sign text-green-500"></i>
                <span class="ml-2 text-xl font-bold text-gray-900">Total Income: $1000</span>
            </div>
            <div class="flex items-center bg-white p-4 shadow rounded">
                <i class="fas fa-dollar-sign text-red-500"></i>
                <span class="ml-2 text-xl font-bold text-gray-900">Total Expense: $500</span>
            </div>
            <div class="flex items-center bg-white p-4 shadow rounded">
                <i class="fas fa-dollar-sign text-blue-500"></i>
                <span class="ml-2 text-xl font-bold text-gray-900">Net Savings: $500</span>
            </div>
            <div class="flex items-center bg-white p-4 shadow rounded">
                <i class="fas fa-dollar-sign text-yellow-500"></i>
                <span class="ml-2 text-xl font-bold text-gray-900">Goal: $2000</span>
            </div>--}}
            
        </div>
    </div>
@endsection

@section('content')
Transactions
@endsection