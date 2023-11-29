<script>
// import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue'
export default {
    name: "cars_list",
    components : {
        Pagination
    },
    data(){
        return {
            cars_list :  this.$inertia.page.props.cars.data,
            pagination_current_page: this.$inertia.page.props.current_page,
            pagination_links : this.$inertia.page.props.cars.links

        }
    }
}
</script>



<template>
    {{ this.$inertia.page.props.cars.data[0].clients
    }}
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Laravel 9 Vue 3 Pagination Example with Vite - NiceSnippets.com
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <table className="table-fixed w-full">
                            <thead>
                            <tr className="bg-gray-100">
                                <th className="px-4 py-2">FIO</th>
                                <th className="px-4 py-2">Auto</th>
                                <th className="px-4 py-2">license_plate</th>
                                <th className="px-4 py-2"></th>
                                <th className="px-4 py-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="car in cars_list" :key="car.license_plate">

                                <th className="px-4 py-2 w-20">{{ car.clients.full_name}}</th>
                                <th className="px-4 py-2">{{ car.model }}</th>
                                <th className="px-4 py-2">{{ car.license_plate }}</th>
                                <th className="px-4 py-2"><button class="bg-blue-300">more info</button></th>
                                <th className="px-4 py-2"><button class="bg-red-300">delete</button></th>
                            </tr>
                            </tbody>
                        </table>

                        <Pagination class="mt-6" :links="this.pagination_links"></Pagination>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
