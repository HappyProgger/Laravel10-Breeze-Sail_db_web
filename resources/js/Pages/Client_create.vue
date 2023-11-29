<script>
export default {
    name: "Client_create",
    data(){
        return{
            client_form : {
                full_name : '',
                gender : '',
                phone : '',
                address : '',
            },
            client_car : {
                'brand'  : '',
                'model' : '',
                'body_color' : '',
                'license_plate' : '',
                'is_parked' : '',
            },
            client_cars : [],
            ifs : {
                is_add_car : false,
            }
        }
    },
    methods : {
        is_add_car_on(){
            if(this.ifs.is_add_car === true){
                this.ifs.is_add_car = false
            }else{
                this.ifs.is_add_car = true
            }
        },
        add_car_in_arr_clients_cars(){
            this.client_cars.push(this.client_car)
            this.client_car = {}
            this.ifs.is_add_car = false

        }
    }
}
</script>

<template>
    {{ typeof client_cars}}
    <div class="m-10">
    <h1 class="text-3xl ml-10 ">Client</h1>
    <form class="p-8" @submit.prevent="submit_client">
        <div class="mb-6">
            <label
                for="full_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >Full name</label
            >
            <input
                type="text"
                v-model="client_form.full_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder=""

            />
            <div v-if="client_form.errors?.full_name" class="text-red-600 text-sm">{{ client_form?.errors.full_name }}</div>
        </div>
        <div class="mb-6">
            <label
                for="gender"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >Gender</label>
            <input
                type="text"
                v-model="client_form.gender"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

            />
            <div v-if="client_form.errors?.gender" class="text-red-600 text-sm">{{ client_form.errors?.gender }}</div>
        </div>
        <div class="mb-6">
            <label
                for="phone"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >Phone</label>
            <input
                type="text"
                v-model="client_form.phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

            />
            <div v-if="client_form.errors?.phone" class="text-red-600 text-sm">{{ client_form.errors?.phone }}</div>
        </div>
        <div class="mb-6">
            <label
                for="address"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >Gender</label>
            <input
                type="text"
                v-model="client_form.address"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

            />
            <div v-if="client_form.errors?.address" class="text-red-600 text-sm">{{ client_form.errors?.address }}</div>
        </div>



        <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            :disabled="client_form.processing"
            :class="{ 'opacity-25': client_form.processing }"
        >
            Submit
        </button>

    </form>

        <h1 class="text-3xl ml-10 mb-10  ">Cars</h1>


        <div
         v-for="car in client_cars" :key="car.license_plate"

            class="cars ml-10 mb-5 ">
            <h1 class="text-xl mb-2">Car with license plate "{{ car.license_plate}}"</h1>
            <div class="car">
                <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Brand: {{ car.brand}} </label
                >
                <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Model: {{ car.model}}</label
                >
                <label

                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Body color: {{ car.body_color}}</label
                >
                <label

                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >License plate: {{ car.license_plate}}</label
                >
                <label

                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Parked: {{ car.is_parked}}</label
                >
            </div>
        </div>
        <button
            @click="is_add_car_on()"
            type="button"
            class="p-8 text-white  bg-green-700 hover:bg-green-800   font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            :disabled="client_form.processing"

        >
            Add cars
        </button>

<!--        изменить форму !!!!!!!!!!!!!!!-->




        <form v-if="ifs.is_add_car" class="p-8" @submit.prevent="submit_car">
            <div class="mb-6">
                <label
                    for="brand"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Brand</label
                >
                <input
                    type="text"
                    v-model="client_car.brand"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""

                />
                <div v-if="client_car.errors?.brand" class="text-red-600 text-sm">{{ client_car?.errors.brand }}</div>
            </div>
            <div class="mb-6">
                <label
                    for="model"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Car model</label>
                <input
                    type="text"
                    v-model="client_car.model"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div v-if="client_car.errors?.model" class="text-red-600 text-sm">{{ client_car.errors?.model }}</div>
            </div>
            <div class="mb-6">
                <label
                    for="body_color"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Car body_color</label>
                <input
                    type="text"
                    v-model="client_car.body_color"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div v-if="client_car.errors?.body_color" class="text-red-600 text-sm">{{ client_car.errors?.body_color }}</div>
            </div>
            <div class="mb-6">
                <label
                    for="license_plate"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >License plate</label>
                <input
                    type="text"
                    v-model="client_car.license_plate"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div v-if="client_car.errors?.license_plate" class="text-red-600 text-sm">{{ client_car.errors?.license_plate }}</div>
            </div>
            <div class="mb-6">
                <label
                    for="is_parked"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Parcked</label>
<!--                <input-->
<!--                    type="text"-->
<!--                    v-model="client_car.is_parked"-->
<!--                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"-->

<!--                />-->

                <select v-model="client_car.is_parked" id="is_parked" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a state of machine</option>
                    <option value=true>Parked</option>
                    <option value=false>Not parked</option>
                </select>


                <div v-if="client_car.errors?.is_parked" class="text-red-600 text-sm">{{ client_car.errors?.is_parked }}</div>
            </div>



            <button
                @click="add_car_in_arr_clients_cars()"
                type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Add car to client
            </button>

        </form>
    </div>


</template>

<style scoped>

</style>
