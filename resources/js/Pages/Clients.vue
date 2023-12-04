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
    },
    methods : {
        show_clients_data(id){
                window.location = window.location.origin + "/clients/" + String(id)
        },
        delete_clients_car(id){
            let data = {
                '_method': 'DELETE',
                'id': String(id),
                '_token': this.$inertia.page.props.csrf_token,
            }
            let url =  'http://localhost/clients/delete_client_cars/' + String(id)
            axios.post(
                url,
                data

            ).then(res => {

                this.cars_list = this.cars_list.filter((car) => car.id !== id)
            })

        },

        change_status_client_cars(id){


            let data = {
                '_method': 'PUT',
                'id': String(id),
                '_token': this.$inertia.page.props.csrf_token,
            }
            let url =  'http://localhost/clients/change_status_client_cars/' + String(id)
            axios.post(
                url,
                data

            ).then(res => {

                // this.cars_list.forEach(car => car.id === String(id) ?
                //     car.is_parked = true : car.is_parked = false)

            })


        },



    }
}
</script>



<template>
    {{ this.$inertia.page.props.cars.data[0].clients}}
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
                                <th className="px-4 py-2">Status</th>
                                <th className="px-4 py-2"></th>
                                <th className="px-4 py-2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="car in cars_list" :key="car.license_plate">
<!--                                <th className="px-4 py-2 w-20">{{ car.clients.full_name}}</th>-->
                                <th className="px-4 py-2">{{ car.clients.full_name }}</th>
                                <th className="px-4 py-2">{{ car.model }}</th>
                                <th className="px-4 py-2">{{ car.license_plate }}</th>
                                <th className="px-4 py-2">

                                    <button
                                        :class="[ car.is_parked ?
                    'mb-3 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-red-800'
                    :
                    'mb-3 text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-red-800'
                    ]"
                                        @click="change_status_client_cars(car.id);
                                        car.is_parked === true ?
                                        car.is_parked=false : car.is_parked=true"
                                        type="button"
                                        class="mr-10"
                                    >


                                        {{ car.is_parked === true ? 'Parked' : 'Not parked'}}
                                    </button>

                                    </th>
                                <th className="px-4 py-2">
                                    <button class="bg-blue-300"
                                    @click="show_clients_data(car.client_id)">
                                        more info
                                    </button>
                                </th>
                                <th className="px-4 py-2">
                                    <button
                                        @click="delete_clients_car(car.id)"
                                        class="bg-red-300">
                                        delete

                                    </button>
                                </th>
                            </tr>
                            </tbody>
                        </table>

                        <Pagination class="mt-6" :links="this.pagination_links"></Pagination>

                        <form method="get" action="http://localhost/clients/create">
                            <button

                                type="submit"
                                class="p-8 text-white  bg-green-700 hover:bg-green-800   font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"


                            >
                                Add client
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>

</template>
