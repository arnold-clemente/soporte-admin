<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout >
        <div class="">
            <div class="">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>{{ $page.props.auth.user }}</div>
                    <Welcome />
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
