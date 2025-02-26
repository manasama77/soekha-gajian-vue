<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import SoekhaLogo from '@images/soekha-logo.svg';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <img :src="SoekhaLogo" :class="className" v-bind="$attrs" />
</template>
