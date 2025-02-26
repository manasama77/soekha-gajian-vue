<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Eye } from 'lucide-vue-next';
import { ref, computed } from 'vue';
import {
    Card,
    CardDescription,
    CardTitle,
} from '@/components/ui/card'
import { Button } from '@/components/ui/button';
import { usePage } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('dashboard'),
    },
];

let props = defineProps<{
    total_gaji_show: string;
    total_gaji_hide: string;
    lembur_show: string;
    lembur_hide: string;
    potongan_absen_show: string;
    potongan_absen_hide: string;
    potongan_keterlambatan_show: string;
    potongan_keterlambatan_hide: string;
    potongan_ijin_show: string;
    potongan_ijin_hide: string;
    proyeksi_pengeluaran_show: string;
    proyeksi_pengeluaran_hide: string;
    auth: {
        user: {
            name: string;
            roles: {
                name: string;
            }[];
        };
    };
}>();

const toggleFullSummaryGaji = ref(false);
const toggleLembur = ref(false);
const toggleAbsen = ref(false);
const toggleKeterlambatan = ref(false);
const toggleIjin = ref(false);
const toggleProyeksiPengeluaran = ref(false);
const roles = props.auth.user.roles[0].name;
const textProyeksi = computed(() => {
    if (roles === 'admin') {
        return 'Proyeksi Pengeluaran';
    } else {
        return 'Proyeksi Pendapatan';
    }
});
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="w-full mx-auto p-4">
            <div class="md:grid-cols-2 grid grid-cols-1 gap-3">
                <Card @click.prevent="toggleFullSummaryGaji = !toggleFullSummaryGaji">
                    <CardTitle class="p-6">
                        <div class="flex justify-between">
                            <div class="flex flex-col space-y-3">
                                <CardTitle v-if="toggleFullSummaryGaji" class="tracking-widest">Rp.{{ total_gaji_show }}
                                </CardTitle>
                                <CardTitle v-else="!toggleFullSummaryGaji" class="tracking-widest">Rp.{{ total_gaji_hide
                                    }}
                                </CardTitle>
                                <div>
                                    <CardDescription class="text-base dark:text-foreground text-background">Total Gaji
                                        Karyawan
                                    </CardDescription>
                                    <CardDescription>Biweekly</CardDescription>
                                </div>

                            </div>
                            <Button variant="secondary" size="dashboardIcon" as="button" class="cursor-pointer">
                                <Eye class="!size-6" />
                            </Button>
                        </div>
                    </CardTitle>
                </Card>

                <Card id="lembur" @click.prevent="toggleLembur = !toggleLembur">
                    <CardTitle class="p-6">
                        <div class="flex justify-between">
                            <div class="flex flex-col space-y-3">
                                <CardTitle v-if="toggleLembur" class="tracking-widest text-green-500">
                                    Rp.{{ lembur_show }}
                                </CardTitle>
                                <CardTitle v-else="!toggleFullSummaryGaji" class="tracking-widest">
                                    Rp.{{ lembur_hide }}
                                </CardTitle>
                                <div>
                                    <CardDescription class="text-base dark:text-foreground text-background">
                                        Lembur
                                    </CardDescription>
                                    <CardDescription>Biweekly</CardDescription>
                                </div>

                            </div>
                            <Button variant="secondary" size="dashboardIcon" as="button" class="cursor-pointer">
                                <Eye class="!size-6" />
                            </Button>
                        </div>
                    </CardTitle>
                </Card>

                <Card id="potongan_absen" @click.prevent="toggleAbsen = !toggleAbsen">
                    <CardTitle class="p-6">
                        <div class="flex justify-between">
                            <div class="flex flex-col space-y-3">
                                <CardTitle v-if="toggleAbsen" class="tracking-widest text-red-500">
                                    Rp.{{ potongan_absen_show }}
                                </CardTitle>
                                <CardTitle v-else="!toggleFullSummaryGaji" class="tracking-widest">
                                    Rp.{{ potongan_absen_hide }}
                                </CardTitle>
                                <div>
                                    <CardDescription class="text-base dark:text-foreground text-background">
                                        Potongan Absen
                                    </CardDescription>
                                    <CardDescription>Biweekly</CardDescription>
                                </div>

                            </div>
                            <Button variant="secondary" size="dashboardIcon" as="button" class="cursor-pointer">
                                <Eye class="!size-6" />
                            </Button>
                        </div>
                    </CardTitle>
                </Card>

                <Card id="potongan_keterlambatan" @click.prevent="toggleKeterlambatan = !toggleKeterlambatan">
                    <CardTitle class="p-6">
                        <div class="flex justify-between">
                            <div class="flex flex-col space-y-3">
                                <CardTitle v-if="toggleKeterlambatan" class="tracking-widest text-red-500">
                                    Rp.{{ potongan_keterlambatan_show }}
                                </CardTitle>
                                <CardTitle v-else="!toggleFullSummaryGaji" class="tracking-widest">
                                    Rp.{{ potongan_keterlambatan_hide }}
                                </CardTitle>
                                <div>
                                    <CardDescription class="text-base dark:text-foreground text-background">
                                        Potongan Keterlambatan
                                    </CardDescription>
                                    <CardDescription>Biweekly</CardDescription>
                                </div>

                            </div>
                            <Button variant="secondary" size="dashboardIcon" as="button" class="cursor-pointer">
                                <Eye class="!size-6" />
                            </Button>
                        </div>
                    </CardTitle>
                </Card>

                <Card id="potongan_ijin" @click.prevent="toggleIjin = !toggleIjin">
                    <CardTitle class="p-6">
                        <div class="flex justify-between">
                            <div class="flex flex-col space-y-3">
                                <CardTitle v-if="toggleIjin" class="tracking-widest text-red-500">
                                    Rp.{{ potongan_ijin_show }}
                                </CardTitle>
                                <CardTitle v-else="!toggleFullSummaryGaji" class="tracking-widest">
                                    Rp.{{ potongan_ijin_hide }}
                                </CardTitle>
                                <div>
                                    <CardDescription class="text-base dark:text-foreground text-background">
                                        Potongan Ijin
                                    </CardDescription>
                                    <CardDescription>Biweekly</CardDescription>
                                </div>

                            </div>
                            <Button variant="secondary" size="dashboardIcon" as="button" class="cursor-pointer">
                                <Eye class="!size-6" />
                            </Button>
                        </div>
                    </CardTitle>
                </Card>

                <Card id="proyeksi_pengeluaran" @click.prevent="toggleProyeksiPengeluaran = !toggleProyeksiPengeluaran">
                    <CardTitle class="p-6">
                        <div class="flex justify-between">
                            <div class="flex flex-col space-y-3">
                                <CardTitle v-if="toggleProyeksiPengeluaran" class="tracking-widest text-cyan-500">
                                    Rp.{{ proyeksi_pengeluaran_show }}
                                </CardTitle>
                                <CardTitle v-else="!toggleFullSummaryGaji" class="tracking-widest">
                                    Rp.{{ proyeksi_pengeluaran_hide }}
                                </CardTitle>
                                <div>
                                    <CardDescription class="text-base dark:text-foreground text-background">
                                        {{ textProyeksi }}
                                    </CardDescription>
                                    <CardDescription>Biweekly</CardDescription>
                                </div>

                            </div>
                            <Button variant="secondary" size="dashboardIcon" as="button" class="cursor-pointer">
                                <Eye class="!size-6" />
                            </Button>
                        </div>
                    </CardTitle>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
