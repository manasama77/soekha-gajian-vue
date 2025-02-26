<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem, SidebarMenuSub, SidebarMenuSubItem, SidebarMenuBadge } from '@/components/ui/sidebar';
import { type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';
import { ChevronDown, Settings } from 'lucide-vue-next';


const props = defineProps<{
    items: NavItem[];
}>();

const page = usePage<SharedData>();

</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Menu</SidebarGroupLabel>

        <SidebarMenu>
            <SidebarMenuItem v-for="item in items" :key="item.title">

                <SidebarMenuButton v-if="!item.subMenu" as-child :is-active="item.href === page.url">
                    <Link :href="item.href">
                    <component :is="item.icon" />
                    <span>{{ item.title }}</span>
                    </Link>
                </SidebarMenuButton>

                <Collapsible v-else defaultOpen class="group/collapsible">
                    <SidebarMenuItem key="Setup">
                        <CollapsibleTrigger asChild :is-active="item.href === page.url">
                            <SidebarMenuButton>
                                <component :is="item.icon" />
                                <span>{{ item.title }}</span>
                                <ChevronDown
                                    class="ml-auto transition-transform group-data-[state=open]/collapsible:rotate-180" />
                            </SidebarMenuButton>
                        </CollapsibleTrigger>

                        <CollapsibleContent>
                            <SidebarMenuSub>
                                <SidebarMenuSubItem v-for="subMenu in item.subMenu" :key="subMenu.title"
                                    class="w-full min-w-full">
                                    <SidebarMenuButton as-child :is-active="subMenu.href === page.url">
                                        <Link :href="subMenu.href">
                                        <component :is="subMenu.icon" />
                                        <span>{{ subMenu.title }}</span>
                                        </Link>
                                    </SidebarMenuButton>
                                </SidebarMenuSubItem>
                            </SidebarMenuSub>
                        </CollapsibleContent>
                    </SidebarMenuItem>
                </Collapsible>

            </SidebarMenuItem>
        </SidebarMenu>

    </SidebarGroup>
</template>


<!-- <SidebarMenuItem v-for="item in items" :key="item.title">
                                    <SidebarMenuButton as-child :is-active="item.href === page.url">
                                        <Link :href="item.href">
                                        <component :is="item.icon" />
                                        <span>{{ item.title }}</span>
                                        </Link>

                                    </SidebarMenuButton>
                                </SidebarMenuItem> -->
