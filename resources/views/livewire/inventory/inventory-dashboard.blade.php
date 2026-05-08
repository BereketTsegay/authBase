<div class="min-h-screen bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-white">Inventory Management</h1>
            <p class="mt-2 text-gray-400">Manage your products, warehouses, suppliers, and orders</p>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Products Card -->
            <a href="{{ route('inventory.products.index') }}" class="rounded-lg border border-gray-700 bg-gray-800 p-6 hover:border-blue-500 hover:bg-gray-750 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Products</h3>
                        <p class="mt-1 text-sm text-gray-400">Manage product inventory</p>
                    </div>
                    <div class="text-3xl text-blue-400">📦</div>
                </div>
            </a>

            <!-- Warehouses Card -->
            <a href="{{ route('inventory.warehouses.index') }}" class="rounded-lg border border-gray-700 bg-gray-800 p-6 hover:border-blue-500 hover:bg-gray-750 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Warehouses</h3>
                        <p class="mt-1 text-sm text-gray-400">Manage storage locations</p>
                    </div>
                    <div class="text-3xl text-orange-400">🏭</div>
                </div>
            </a>

            <!-- Suppliers Card -->
            <a href="{{ route('inventory.suppliers.index') }}" class="rounded-lg border border-gray-700 bg-gray-800 p-6 hover:border-blue-500 hover:bg-gray-750 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Suppliers</h3>
                        <p class="mt-1 text-sm text-gray-400">Manage supplier details</p>
                    </div>
                    <div class="text-3xl text-green-400">🤝</div>
                </div>
            </a>

            <!-- Purchase Orders Card -->
            <a href="{{ route('inventory.purchases.index') }}" class="rounded-lg border border-gray-700 bg-gray-800 p-6 hover:border-blue-500 hover:bg-gray-750 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Purchase Orders</h3>
                        <p class="mt-1 text-sm text-gray-400">Track incoming orders</p>
                    </div>
                    <div class="text-3xl text-purple-400">📥</div>
                </div>
            </a>

            <!-- Sales Orders Card -->
            <a href="{{ route('inventory.sales.index') }}" class="rounded-lg border border-gray-700 bg-gray-800 p-6 hover:border-blue-500 hover:bg-gray-750 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Sales Orders</h3>
                        <p class="mt-1 text-sm text-gray-400">Manage customer orders</p>
                    </div>
                    <div class="text-3xl text-pink-400">📤</div>
                </div>
            </a>

            <!-- Reports Card -->
            <a href="{{ route('inventory.reports.index') }}" class="rounded-lg border border-gray-700 bg-gray-800 p-6 hover:border-blue-500 hover:bg-gray-750 transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Reports</h3>
                        <p class="mt-1 text-sm text-gray-400">View inventory reports</p>
                    </div>
                    <div class="text-3xl text-indigo-400">📊</div>
                </div>
            </a>
        </div>
    </div>
</div>
