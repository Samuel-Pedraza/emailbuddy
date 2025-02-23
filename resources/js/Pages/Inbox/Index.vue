<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Inbox">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                {{ $t('Inbox') }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">

                <div class="flex">
                    <aside class="w-64 bg-white shadow-md p-4 flex flex-col">
                        <h2 class="text-lg font-semibold mb-4">Sentence</h2>
                        <button class="btn btn-primary w-full mb-4">+ Send message</button>
                        <ul class="space-y-2 flex-1">
                            <li class="p-2 bg-gray-200 rounded">📩 Messages (23)</li>
                            <li class="p-2 hover:bg-gray-200 rounded cursor-pointer">👥 Social (263)</li>
                            <li class="p-2 hover:bg-gray-200 rounded cursor-pointer">🏷️ Offers (12)</li>
                            <li class="p-2 hover:bg-gray-200 rounded cursor-pointer">🔔 Notifications (100)</li>
                            <li class="p-2 hover:bg-gray-200 rounded cursor-pointer">💰 Payments</li>
                            <li class="p-2 hover:bg-gray-200 rounded cursor-pointer">📎 Attachments</li>
                            <li class="p-2 hover:bg-gray-200 rounded cursor-pointer">🗑 Deleted items (12)</li>
                        </ul>
                    </aside>

                    <!-- Main Content -->
                    <main class="flex-1 flex flex-col">
                        <!-- Search Bar -->
                        <div class="p-4 bg-white shadow-md flex items-center gap-2">
                            <input type="text" placeholder="Search on emails..." class="input input-bordered w-full" />
                        </div>

                        <!-- Email List -->
                        <section class="flex-1 overflow-y-auto bg-white p-4 shadow-md">
                            <div class="flex justify-between">
                                <h2 class="text-lg font-semibold">All messages</h2>
                                <div class="space-x-2">
                                    <button class="btn btn-sm">Unread</button>
                                    <button class="btn btn-sm">Favourites</button>
                                </div>
                            </div>
                            <ul class="divide-y mt-4">
                                <li class="p-4 cursor-pointer hover:bg-gray-100 flex justify-between">
                                    <span class="font-medium">Cocolita Shop</span>
                                    <span class="badge badge-error">New</span>
                                </li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100 flex justify-between">
                                    <span class="font-medium">Mailchimp</span>
                                    <span class="badge badge-error">New</span>
                                </li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Linkedin - 2 new job offers</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">OLX Group - Messages from Your ads</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Oracle Cloud - Confirm Oracle Account</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Binance Market - NFT and CRO Rewards</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Linkedin - 2 new job offers</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">OLX Group - Messages from Your ads</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Oracle Cloud - Confirm Oracle Account</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Binance Market - NFT and CRO Rewards</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Linkedin - 2 new job offers</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">OLX Group - Messages from Your ads</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Oracle Cloud - Confirm Oracle Account</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Binance Market - NFT and CRO Rewards</li>

                                <li class="p-4 cursor-pointer hover:bg-gray-100">Linkedin - 2 new job offers</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">OLX Group - Messages from Your ads</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Oracle Cloud - Confirm Oracle Account</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Binance Market - NFT and CRO Rewards</li>
                                <li class="p-4 cursor-pointer hover:bg-gray-100">Binance Market - NFT and CRO Rewards</li>
                            </ul>
                        </section>
                    </main>
                </div>


            </div>
        </div>
    </AppLayout>
</template>
