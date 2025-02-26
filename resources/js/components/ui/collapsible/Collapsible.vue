<script setup lang="ts">
import type { CollapsibleRootEmits, CollapsibleRootProps } from 'radix-vue';
import { CollapsibleRoot, useForwardPropsEmits } from 'radix-vue';

const props = defineProps<CollapsibleRootProps & { class?: string }>();
const emits = defineEmits<CollapsibleRootEmits>();

const forwarded = useForwardPropsEmits(props, emits);

</script>

<template>
    <CollapsibleRoot v-slot="{ open }" v-bind="forwarded" :class="props.class">
        <slot :open="open" />
    </CollapsibleRoot>
</template>
