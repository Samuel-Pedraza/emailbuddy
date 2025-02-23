<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                {{ $t('Dashboard') }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden border border-base-content/20 shadow-xl sm:rounded-lg p-12 text-2xl">
                    {{ $t('Welcome, :name!', { name: $page.props.auth.user.name }) }}


                    <p>To get started click these buttons:</p>
                    <div class="flex">
                        <div>
                            <a href="/google/redirect" class="btn btn-primary">Integrate Gmail Inbox</a>
                        </div>

                        <div>
                            <input type="text" placeholder="shopify URL">
                            <a href="/shopify/redirect"  class="btn btn-primary ml-5">Integrate Shopify Store</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
