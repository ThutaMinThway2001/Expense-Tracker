<x-MasterLayout>
    <x-income-main :incomes="$incomes">
        <x-edit-income-modal :payments="$payments" :categories="$income_categories" :income="$income">
        </x-edit-income-modal>
    </x-income-main>
</x-MasterLayout>