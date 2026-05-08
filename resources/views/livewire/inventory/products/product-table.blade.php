<div class="min-h-screen bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-white">Products</h1>
                <p class="mt-2 text-gray-400">Manage your product inventory</p>
            </div>
            <button wire:click="create" class="rounded-lg bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
                + New Product
            </button>
        </div>

        <div class="rounded-lg border border-gray-700 bg-gray-800 overflow-hidden">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="border-b border-gray-700 bg-gray-900">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Name</th>
                        <th class="px-6 py-4 font-semibold">SKU</th>
                        <th class="px-6 py-4 font-semibold">Category</th>
                        <th class="px-6 py-4 font-semibold">Price</th>
                        <th class="px-6 py-4 font-semibold">Quantity</th>
                        <th class="px-6 py-4 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-750">
                            <td class="px-6 py-4">{{ $product['name'] ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $product['sku'] ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $product['category'] ?? '-' }}</td>
                            <td class="px-6 py-4">${{ number_format($product['price'] ?? 0, 2) }}</td>
                            <td class="px-6 py-4">{{ $product['quantity'] ?? 0 }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <button wire:click="edit(1)" class="text-blue-400 hover:underline">Edit</button>
                                <button wire:click="delete(1)" class="text-red-400 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                No products found. Create your first product.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
