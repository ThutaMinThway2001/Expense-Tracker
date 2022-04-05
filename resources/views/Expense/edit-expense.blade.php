<x-MasterLayout>
    <x-expense-header />
    <x-expense-main :expenses="$expenses">
        <x-edit-expense-modal :payments="$payments" :expense="$expense" :categories="$expense_categories">
        </x-edit-expense-modal>
    </x-expense-main>
</x-MasterLayout>