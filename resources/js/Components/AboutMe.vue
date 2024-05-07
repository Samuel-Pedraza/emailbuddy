<script setup>

import Avatar from "@/Components/Data/Avatar.vue";
import Paragraph from "@/Components/Data/Paragraph.vue";
</script>

<template>
<div id="about" class="max-w-2xl mx-auto my-16 px-8">
    <div class="flex items-start">
        <Avatar class="flex-shrink-0" src="https://placehold.co/100"/>
        <div class="flex-shrink ml-4">
            <p class="font-bold text-lg">Hey, I am Web Developer</p>
            <Paragraph>
                My name is John Doe and I am the creator of This Project.
            </Paragraph>
        </div>
    </div>
    <div class="mt-4">
        <Paragraph>
            My story began in 2010 when I started learning web development. I was fascinated by the idea of creating something that can be accessed by anyone in the world. I started learning HTML, CSS, and JavaScript. I was amazed by the power of these technologies and how they can be used to create beautiful and interactive websites.
        </Paragraph>
    </div>
</div>
</template>

<style scoped>

</style>
