<div class="min-h-screen bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-white">Purchase Orders</h1>
                <p class="mt-2 text-gray-400">Track and manage your purchase orders</p>
            </div>
            <button wire:click="create" class="rounded-lg bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
                + New Order
            </button>
        </div>

        <div class="rounded-lg border border-gray-700 bg-gray-800 overflow-hidden">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="border-b border-gray-700 bg-gray-900">
                    <tr>
                        <th class="px-6 py-4 font-semibold">PO Number</th>
                        <th class="px-6 py-4 font-semibold">Order Date</th>
                        <th class="px-6 py-4 font-semibold">Expected Delivery</th>
                        <th class="px-6 py-4 font-semibold">Total Amount</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($purchaseOrders as $order)
                        <tr class="hover:bg-gray-750">
                            <td class="px-6 py-4 text-white">{{ $order['po_number'] ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $order['order_date'] ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $order['expected_delivery'] ?? '-' }}</td>
                            <td class="px-6 py-4">${{ number_format($order['total_amount'] ?? 0, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full px-2 py-1 text-xs font-semibold bg-blue-900 text-blue-200">
                                    {{ ucfirst($order['status'] ?? 'unknown') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button wire:click="edit(1)" class="text-blue-400 hover:underline">Edit</button>
                                <button wire:click="delete(1)" class="text-red-400 hover:underline">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                No purchase orders found. Create your first order.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
