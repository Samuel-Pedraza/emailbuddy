<script setup>

defineProps({activeTab: {title: String, slug: String}})

import ListItem from "@/Components/Data/ListItem.vue";

</script>

<template>
    <div class="p-8 sm:p-16">
        <div v-if="activeTab.slug === 'payments'">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start">
                <div class="basis-1/2 w-full">
                    <div class="mb-4">
                        <p class="font-bold text-lg">Payments</p>
                    </div>
                    <ul>
                        <ListItem title="Subscriptions"/>
                        <ListItem title="Product Checkouts"/>
                        <ListItem title="Customer Portal"/>
                        <ListItem title="Webhooks"/>
                        <ListItem title="Order Statistics"/>
                        <ListItem title="Subscription Statistics"/>
                    </ul>
                </div>
                <div class="basis-1/2 w-full flex flex-col items-center justify-center  mt-8 sm:mt-0">
                    <img src="https://placehold.co/400" class="shadow-xl rounded-xl border" />
                </div>
            </div>
        </div>
        <div v-if="activeTab.slug === 'auth'">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start">
                <div class="basis-1/2 w-full">
                    <div class="mb-4">
                        <p class="font-bold text-lg">Auth</p>
                    </div>
                    <ul>
                        <ListItem title="Login/Registration"/>
                        <ListItem title="User Dashboard"/>
                        <ListItem title="Social Auth"/>
                        <li class="ml-8">
                            <ul>
                                <ListItem title="Google"/>
                                <ListItem title="GitHub"/>
                                <ListItem title="Twitter"/>
                            </ul>
                        </li>
                        <ListItem title="Magic link login"/>
                        <ListItem title="Protected routes"/>
                    </ul>
                </div>
                <div class="basis-1/2 w-full flex flex-col items-center justify-center  mt-8 sm:mt-0">
                    <img src="https://placehold.co/400" class="shadow-xl rounded-xl border" />
                </div>
            </div>
            <div class="max-w-6xl mx-auto mt-4">
                <p class="text-sm">
                    *Social Auth can be easily extended by adding other providers from <a class="link" target="_blank" href="https://socialiteproviders.com/about/">Socialite Providers</a>
                </p>
            </div>
        </div>
        <div v-if="activeTab.slug === 'admin'">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start">
                <div class="basis-1/2 w-full">
                    <div class="mb-4">
                        <p class="font-bold text-lg">Admin</p>
                    </div>
                    <ul>
                        <ListItem title="Users Management"/>
                        <ListItem title="Blog"/>
                        <ListItem title="Articles"/>
                        <ListItem title="Orders"/>
                        <ListItem title="Subscriptions"/>
                        <ListItem title="Statistics"/>
                    </ul>
                </div>
                <div class="basis-1/2 w-full flex flex-col items-center justify-center  mt-8 sm:mt-0">
                    <img src="https://placehold.co/400" class="shadow-xl rounded-xl border" />
                </div>
            </div>
            <div class="max-w-6xl mx-auto mt-4">
                <p class="text-sm">
                    *Admin sections can be extended using <a class="link" target="_blank" href="https://filamentphp.com/docs/3.x/panels/getting-started">Filament Docs</a>
                </p>
            </div>
        </div>
        <div v-if="activeTab.slug === 'seo'">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start">
                <div class="basis-1/2 w-full">
                    <div class="mb-4">
                        <p class="font-bold text-lg">SEO</p>
                    </div>
                    <ul>
                        <ListItem title="SEO Meta Tags"/>
                        <ListItem title="Twitter Cards"/>
                        <ListItem title="Dynamic Open Graph Images"/>
                        <ListItem title="Open Graph tags for social media"/>
                        <ListItem title="Automatic sitemap generation"/>
                        <ListItem title="Schema.org markup"/>
                        <ListItem title="Blog and Articles with SEO"/>
                    </ul>
                </div>
                <div class="basis-1/2 w-full flex flex-col items-center justify-center  mt-8 sm:mt-0">
                    <img src="https://placehold.co/400" class="shadow-xl rounded-xl border" />
                </div>
            </div>
        </div>
        <div v-if="activeTab.slug === 'blog'">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start">
                <div class="basis-1/2 w-full">
                    <div class="mb-4">
                        <p class="font-bold text-lg">Blog</p>
                    </div>
                    <ul>
                        <ListItem title="Blog Page"/>
                        <ListItem title="Articles Page"/>
                        <ListItem title="Articles management through admin"/>
                        <ListItem title="SEO Optimized"/>
                    </ul>
                </div>
                <div class="basis-1/2 w-full flex flex-col items-center justify-center  mt-8 sm:mt-0">
                    <img src="https://placehold.co/400" class="shadow-xl rounded-xl border" />
                </div>
            </div>
            <div class="max-w-6xl mx-auto mt-4">
                <p class="text-sm">
                    *See Example - <a class="link" target="_blank" href="https://larafast.com/blog">Blog</a>
                </p>
            </div>
        </div>
        <div v-if="activeTab.slug === 'themes'">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start">
                <div class="basis-1/2 w-full">
                    <div class="mb-4">
                        <p class="font-bold text-lg">Themes</p>
                    </div>
                    <ul>
                        <ListItem title="Powered by DaisyUI"/>
                        <ListItem title="30+ Themes out of the box"/>
                        <ListItem title="Easy switching between themes"/>
                        <ListItem title="Extendable and customizable"/>
                    </ul>
                </div>
                <div class="basis-1/2 w-full flex flex-col items-center justify-center  mt-8 sm:mt-0">
                    <img src="https://placehold.co/400" class="shadow-xl rounded-xl border" />
                </div>
            </div>
            <div class="max-w-6xl mx-auto mt-4">
                <p class="text-sm">
                    *Check all themes here <a class="link" target="_blank" href="https://daisyui.com/docs/themes">Themes</a>
                </p>
            </div>
        </div>
        <div v-if="activeTab.slug === 'more'">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-start">
                <div class="basis-1/2 w-full">
                    <div class="mb-4">
                        <p class="font-bold text-lg">More</p>
                    </div>
                    <ul>
                        <ListItem title="Vue and Livewire Components"/>
                        <ListItem title="Open AI Service"/>
                        <ListItem title="LemonSqueezy Service"/>
                        <ListItem title="Coming Soon Page"/>
                        <ListItem title="Terms and Privacy Page"/>
                        <ListItem title="Detailed Documentation"/>
                    </ul>
                </div>
                <div class="basis-1/2 w-full flex flex-col items-center justify-center  mt-8 sm:mt-0">
                    <img src="https://placehold.co/400" class="shadow-xl rounded-xl border" />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
