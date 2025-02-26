<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Departement',
        href: route('setup.departements.index'),
    },
];
</script>

<template>

    <Head title="Departements" />

    <AppLayout :breadcrumbs="breadcrumbs">

        <div class="w-full mx-auto p-4">
            <h1>Departement</h1>
        </div>

    </AppLayout>
</template>
